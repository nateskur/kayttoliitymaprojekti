<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><<?php echo $threadID ?></title>
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
	<script type="text/javascript" src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-modal.js"></script>
 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/blitzer/jquery-ui.css" type="text/css" />
</head>
<body>
<div>
  

  <!-- Post a comment to the thread -->
  <div class="modal fade" id="mymodalPost">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
          <?php

          	echo form_open_multipart('Upload_controller/do_upload');
			echo "<form><input type='file' id='uploadBox' name='image' size='20' class=''/>"; 
			echo '<br>';
			echo form_open('sivu/koulutukset_lisaus');
			echo '<h5 style="font-weight:bold;">Alkoi</h5>';
			echo form_input($name);
			echo "<br>";
			echo '<h5 style="font-weight:bold;">Loppui</h5>';
			echo form_input($comment);
			echo "<br>";
			echo "<br>";
			echo form_submit('submit', 'Lisää koulutus', 'id="nappi"');
			echo '</form></div>';

          
         
          ?>
      </div>
     </div>
    </div>
  </div>


  <!-- Load thread -->
  <div class="modal fade" id="mymodalThread">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        

        <?php
          echo '<div class="row">';
          echo '<div class="col-md-6 col-xs-8">';
          echo '<div id="threads">'; 
          $threadview = "";
          $threadview .= '<table class="table" border="1">';
          $threadview .= '<thead><tr><th>ID</th><th>Name</th><th>Comment</th><th style="width:30px"></th></tr></thead>';
          $query = $this->db->query("SELECT ID, name, comment, threadID  FROM bboard WHERE threadID = threadID");
           
           if(isset($query))
           {
            foreach ($query->result() as $row)
            {
             $id        = "$row->ID";
             $name      = "$row->name";
             $comment   = "$row->comment";
  
                $threadview .= '<tr>';
                $threadview .= '<td>'.$id.'</td>';
                $threadview .= '<td>'.$name.'</td>';
                $threadview .= '<td>'.$comment.'</td>';
                $threadview .= '</tr>';
                
            }
           }

           else
           {
            echo "aw fuck";
           }
              echo $threadview;
              echo '</table>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          ?>
      </div>
     </div>
    </div>
  </div>
</div>
</body>
</html>