<?php
class Latihan_soal extends Controller
 {
   function __construct()
   {
     parent::Controller();
	 $this->load->model('model_quiz','',TRUE);
   }

   function login()
   {
        $this->load->view("login");
   }
   
    function pilihan_ganda()
    {
        $this->form_validation->set_rules('vnama','nama','required');
        if ($this->form_validation->run()==true)
           {
            	$cek_id="Select * from user_quiz where id_ambil_soal in (select max(id_ambil_soal) from soal)";
                $hasil_cek_id=$this->db->query("$cek_id");
       
               if ($hasil_cek_id->num_rows()>0)
                 { $hasilnya=$hasil_cek_id->row();
                    $hasil_cek=$hasilnya->id_ambil_soal;
                    $xnilai_id_max=$hasil_cek+1;
                  }
              else
                 {  $xnilai_id_max=1;  }
        
               $xnama=$this->input->post('vnama');
               $ynama=array('namanya'=>$xnama);
               $this->session->set_userdata($ynama);

               $waktu_mulai=time();
               $simpan_waktu_mulai=array('waktu_start'=>$waktu_mulai);
               $this->session->set_userdata($simpan_waktu_mulai);

               $query="insert into user_quiz (nama,id_ambil_soal) values ('$xnama','$xnilai_id_max')";
               $run_query=$this->db->query("$query");
               $data['znama']=$xnama;
               $data['select'] = $this->model_quiz->getSoal();
               $this->load->view('list_soal',$data);
           }
        else
           {
               $this->load->view('quiz');
           }
    }

   function mulaiQuiz()
   {
   	   $data['select'] = $this->model_quiz->getTop();	
       $this->load->view('quiz', $data);
   }

   function proses()
 	{
 		 $query="select * from soal order by no";
         $hasil=$this->db->query($query);
         $jumlah=$hasil->num_rows();
         for ($i=1;$i<=$jumlah;$i++)
         { $jawaban[$i]=$this->input->post($i);
            if($jawaban[$i]=='a' || $jawaban[$i]=='b' || $jawaban[$i]=='c' || $jawaban[$i]=='d' || $jawaban[$i]=='e')
               { $data['hasil'][$i]=$jawaban[$i]; }
            else
               { $data['hasil'][$i]="x"; }
         }        
 		 $this->load->view('hasil_quiz',$data);
 	}

      
 }