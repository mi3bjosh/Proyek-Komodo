<h1>Upload Project</h1>
<div id="carbonForm">
	<?php 
	$frm = array('id' => 'signupForm');
	echo form_open_multipart('project/uploadfile',$frm);
	?>
  	<div class="fieldContainer">
        
        <div class="formRow">
            <div class="label">
                <?php
				echo form_label('Project Title', 'name');		
				?>
            </div>
            <div class="field">
                <?php
                $jdl = array('name' => 'judul','id' => 'name');
				echo form_input($jdl);
				?>
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <?php
				echo form_label('Description', 'name');		
				?>
            </div>
            <div class="field">
                <?php
                $jdl = array('name' => 'descript','id' => 'name');
				echo form_input($jdl);
				?>
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <?php
				echo form_label('Category', 'name');		
				?>
            </div>
            <div class="field">
              	<select name="kate">
                <?php 
				foreach($kat as $k)
				{ 
					echo '<option value="'.$k->IdKatPW.'">'.$k->nmKatPW.'</option>';
				} 
				?>
                </select>
            </div>
    	</div>
        
        <div class="formRow">
            <div class="label">
                <?php
				echo form_label('Select File', 'name');		
				?>
            </div>
            <div class="field">
                <?php
				$upl = array('name' => 'userfile', 'id' => 'name');
				echo form_upload($upl);		
				?>
            </div>
    	</div>
        
    </div>
    <br>
    <div class="signupButton">
    	<?php 
		$ups = array('name' => 'submit', 'value' => 'Upload', 'id' => 'submit');
		echo form_submit($ups);
		//echo nbs(7); 
		?>
		<a href="<?php echo site_url();?>/admin/project">
		<input type="button" value="Cancel" /></a>
	</div>
    <?php echo form_close(); ?>
	<?php
		echo '<p align="center">';
		 $msg = validation_errors();
		if(empty($error))
		{}
		else
		{
			//echo validation_errors();
			//$msg= $this->form_validation->validation_errors();
			//echo $error;
			echo '<script language="javascript">alert("'.$error.'")</script>';
		}
		echo '</p>';
	?>
</div>