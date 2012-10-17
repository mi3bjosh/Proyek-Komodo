<?php
//phpinfo();
Class arsipmateri extends Controller{
	/*
	fungsi yang dipanggil untuk mengecek login
	*/
	function cek_login(){
		if ( !$this->session->userdata('is_logged_in') || $this->session->userdata('status') != 'admin')
		{
			redirect('elearning');
			exit;
		}
	}
	
	/*ini adalah konstruktor. yang digunakan untuk memberikan nilai awal pada variabel atau untuk melakukan proses saat sebuah kelas di load. konstraktor tidak dapat mengembalikan nilai	tapi dapat mengerjakan suatu proses
	*/
	function arsipmateri(){
		parent::Controller();
		$this->cek_login();
		$this->load->model('arsip_model','',TRUE);
	}
	
	/*
	fungsi index sebagai fungsi default yang akan selalu dipanggil jika pada URL tidak didefinisikan segment fungsinya
	*/
	function index(){
		//memanggil data mata kuliah untuk ditampilkan di dropdown.
	    //$data['data_mk']=$this->arsip_model->tampil_mk();
		//$data['content'] = 'mk_arsip';
		//$this->load->view('admin/layout.php', $data);
		redirect('admin/arsipmateri/tampilmateri');
	}
	
	function tampilmateri()
	{
		$this->load->model('arsip_model');
		$level = $this->session->userdata('status');
		$data['status'] = 1;
		$data['data_arsip']=$this->arsip_model->tampil_all();
		$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/admin/arsipmateri/tampilmateri';
			$config['total_rows'] = $this->db->count_all('materi');
			$config['per_page'] = 5;
			$config['num_links'] = 20;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['content'] = 'all_arsip';
			$data['hasil'] = $this->db->get('materi', $config['per_page'], $this->uri->segment(4));
		$this->load->view('admin/layout.php', $data);
	}
	
	function tampilMk(){
		//memanggil data mata kuliah untuk ditampilkan di dropdown.
	    $data['data_mk']=$this->arsip_model->tampil_mk();
		$data['content'] = 'mk_arsip';
		$this->load->view('admin/layout.php', $data);;
	}
	
	/*
	fungsi untuk tampil kategori
	*/
	function tampilKategori()
	{
		if (($this->input->post('mymk')) || ($this->session->userdata['idmk'] !=""))
		{
			if ($this->input->post('mymk'))
			{
				$id['idmk'] = $this->input->post('mk');
				$this->session->set_userdata($id);
			}
			//echo $this->session->userdata['idmk'];
			$data['data_kategori']=$this->arsip_model->tampil_kategori($this->session->userdata['idmk']);
			$data['content'] = 'cat_arsip';
			$this->load->view('admin/layout.php', $data);
		}else
		{
			redirect('admin/arsipmateri');
		}
	}
	
	function noKategori()
	{
		if (($this->input->post('mymk')) || ($this->session->userdata['idmk'] !=""))
		{
			if ($this->input->post('mymk'))
			{
				$id['idmk'] = $this->input->post('mk');
				$this->session->set_userdata($id);
			}
			//echo $this->session->userdata['idmk'];
			$data['data_kategori']=$this->arsip_model->tampil_kategori($this->session->userdata['idmk']);
			$data['warn'] = "error";
			$data['content'] = 'cat_arsip';
			$this->load->view('admin/layout.php', $data);
		}else
		{
			redirect('admin/arsipmateri');
		}
	}
	
	/*
	fungsi untuk tampil data
	*/
	function tampildata()
	{
		if (($this->input->post('mycat')) || ($this->session->userdata['idcat'] !=""))
		{
			if ($this->input->post('mycat'))
			{
				$id['idcat'] = $this->input->post('cat');
				if ($id['idcat'] == 0)
				{
					redirect('admin/arsipmateri/noKategori');
					//$data['content'] = "cat_arsip";
					//$this->load->view('admin/layout', $data);
					//echo "Tidak ada Kategori yang dipilih.";
					//echo "<br>";
					//echo anchor("admin/arsipmateri/tampilKategori","Back");
					//exit;
				}
				$this->session->set_userdata($id);
			}
						
			$mkid = $this->session->userdata('idmk');
			$mk = $this->arsip_model->cari_mk($mkid);
			$data['mata_kuliah'] = $mk->mkname;
		
			$cid = $this->session->userdata('idcat');
			$cat = $this->arsip_model->cari_kat($cid);
			$data['kategori'] = $cat->catname;
		
			$data['uid'] = $this->session->userdata('id');
			$level = $this->session->userdata('status');
			if (($level == 'dosen')||($level == 'admin'))
			{
				$data['status'] = 1;
				$data['data_arsip']=$this->arsip_model->tampil_data($cid);
			}else
			{
				$data['status'] = 0;
				$data['data_arsip']=$this->arsip_model->tampil_data_m($cid);
			}		
			$data['content'] = 'view_arsip';
			$this->load->view('admin/layout.php', $data);
		}else
		{
			redirect ('admin/arsipmateri');
		}
	}
	
	/*
	fungsi untuk melihat data yang terhapus
	*/
	function trash(){
		if (($this->session->userdata('status') == 'admin')&&(($this->input->post('mycat')) || ($this->session->userdata['idcat'] !="")))
		{
			if ($this->input->post('mycat'))
			{
				$id['idcat'] = $this->input->post('cat');
				if ($id['idcat'] == 0)
				{
					echo "Tidak ada Kategori yang dipilih.";
					echo "<br>";
					echo anchor("admin/arsipmateri/tampilKategori","Back");
					exit;
				}
				$this->session->set_userdata($id);
			}
						
			$mkid = $this->session->userdata('idmk');
			$mk = $this->arsip_model->cari_mk($mkid);
			$data['mata_kuliah'] = $mk->mkname;
		
			$cid = $this->session->userdata('idcat');
			$cat = $this->arsip_model->cari_kat($cid);
			$data['kategori'] = $cat->catname;
		
			$data['uid'] = $this->session->userdata('id');
			$level = $this->session->userdata('status');
			$data['data_arsip']=$this->arsip_model->trash_data($cid);
			
			//echo "<br>".anchor("admin/arsipmateri","Lihat Data")."<br>";
			$data['content'] = 'trash_arsip';
			$this->load->view('admin/layout.php', $data);
		}else
		{
			echo "Maaf, Anda tidak bisa mengakses menu ini.";
			//echo "<br>".anchor("admin/arsipmateri/tampildata","Lihat Data")."<br>";
		}
	}
	
	/*
	fungsi yang dipanggil untuk menampilkan form input
	*/
	function tambah(){
		$data['data_tipe']=$this->arsip_model->tampil_tipe();
		$data['content'] = 'tambah_arsip';
		$this->load->view('admin/layout.php', $data);
	}
	
	/*
	fungsi untuk menyimpan data 
	*/
	function simpan(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|rar|zip|docx|doc|ppt|pps|pptx|ppsx';
		$config['max_size']	= '2048';
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('mpath'))
		{
			print $this->upload->display_errors();
			$data['content'] = 'tambah_arsip';
			$this->load->view('admin/layout.php', $data);
		}
		else
		{
			$upload_data = $this->upload->data();
			$filedok = $config['upload_path'].$upload_data["file_name"];
		}
		
		
		
		//user level
		$level = $this->session->userdata('status');
		if (($level == 'dosen')||($level == 'admin'))
		{
			$status = 1;
		}else
		{
			$status = 0;
		}
		
		//timestamp
		$now = time();
		$timezone = 'UP7';
		$daylight_saving = false;
		$now = gmt_to_local($now, $timezone, $daylight_saving);
		$now = unix_to_human($now, TRUE, 'eu');
		
		$data=array(
		    'mjudul'	=>$this->input->post('mjudul'),
			'mdesc' 	=>$this->input->post('mdesc'),
			'tipe' 		=>$this->input->post('tipe'),
			'mpath' 	=>$filedok,
			'mcatid' 	=>$this->session->userdata('idcat'),
			'mdate' 	=>$now,
			'mauthor' 	=>$this->session->userdata('id'),
			'm_isdel' 	=>0,
			'm_ispub' 	=>$status
		);
		
		$this->arsip_model->simpan_arsip($data);	
		$this->session->set_flashdata('message','data berhasil disimpan');
		redirect('admin/arsipmateri/tampildata');	
	}
	
	/*
	fungsi untuk menghapus data
	*/
	function hapus($id_gb){
		$data = array('m_isdel'=>1, 'm_ispub'=>0);
		$this->arsip_model->simpan_update($id_gb,$data);
		$this->session->set_flashdata('message','data berhasil dihapus');
		redirect('admin/arsipmateri/tampildata');
	}
	
	/*
	fungsi untuk mengedit data
	*/
	function edit($id_gb){
		$arsip = $this->arsip_model->cari_data($id_gb);
		$data['ar']['mid'] 		= $arsip->mid;
		$data['ar']['mjudul']	= $arsip->mjudul;
		$data['ar']['mdesc']	= $arsip->mdesc;
		$data['ar']['mpath']	= $arsip->mpath;
		$data['ar']['mcatid']	= $arsip->mcatid;
		$data['ar']['mdate']	= $arsip->mdate;
		$data['ar']['mauthor']	= $arsip->mauthor;
		$data['ar']['m_isdel']	= $arsip->m_isdel;
		$data['ar']['m_ispub']	= $arsip->m_ispub;

		$data['content'] = 'edit_arsip';
		$this->load->view('admin/layout.php', $data);
	}
	
	/*
	fungsi untuk mengupdate data
	*/
	function update(){
		$id_gb=$this->input->post('id_gb');
		
		$data=array(
			'mjudul'  =>$this->input->post('mjudul'),
			'mdesc' =>$this->input->post('mdesc'),
			'mpath' =>$this->input->post('mpath'),
			'mcatid' =>$this->input->post('mcatid'),
			'mdate' =>$this->input->post('mdate'),
			'mauthor' =>$this->input->post('mauthor'),
			'm_isdel' =>$this->input->post('m_isdel'),
			'm_ispub' =>$this->input->post('m_ispub')
		);
		
		$this->arsip_model->simpan_update($id_gb,$data);	
		$this->session->set_flashdata('message','data berhasil diubah');
		redirect('admin/arsipmateri/tampildata');	
	}
	
	/*
	fungsi untuk menyembunyikan/menampilkan data
	*/
	function publish($id_gb){
		$arsip = $this->arsip_model->cari_data($id_gb);
		$status	= $arsip->m_ispub;
		if ($status == 1)
		{
			$status	= 0;
			$message = "Tidak Dipublikasikan.";
		}
		else 
		{
			$status	= 1;
			$message = "Dipublikasikan.";
		}
		$data = array('m_ispub' =>$status);
		$this->arsip_model->simpan_update($id_gb,$data);	
		$this->session->set_flashdata('message','Data Berhasil '.$message);
		redirect('admin/arsipmateri/tampildata');
	}	
	
	/*
	fungsi untuk mengembalika data yang terhapus
	*/
	function untrash($id_gb){
		$data = array('m_isdel' =>0);
		$this->arsip_model->simpan_update($id_gb,$data);
		$this->session->set_flashdata('message','data berhasil dikembalikan');
		redirect('admin/arsipmateri/tampildata');
	}
}
?>