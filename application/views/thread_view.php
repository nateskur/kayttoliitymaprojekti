<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Oma profiili</title>
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
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>

        <?php

        $query = $this->db->query("SELECT id, name, comment, image  FROM bboard WHERE threadID ='threadID'");

		foreach ($query->result() as $row)
		{
			$id 	   = "$row->id";
			$name	   = "$row->name";
			$comment   = "$row->comment";
		}
        	foreach ($query->result_array() as $row)
			{
				echo '<img src="'.base_url().'img/'.$row['image'].'" class="img-responsive img-thumbnail" style="width: 200px;">';
			}
		    ?>
        <div class="modal-footer">
     
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_tyohistoria/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>
        <button type="button" class="btn btn-default"  data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>
</div>
</body>
</html>