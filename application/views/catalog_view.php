<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>shitposting threads</title>
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
  <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
</head>
<body>
<div class="container">
  <!-- Load threads -->
        <?php
          echo '<div class="row">';
          echo '<div class="col-md-6 col-xs-8">';
          echo '<div id="threads">'; 
          $threads = "";
          $threads .= '<table class="table" border="1">';
          $threads .= '<thead><tr><th>ID</th><th>Name</th><th>Comment</th></tr></thead>';
          $query = $this->db->query("SELECT ID, name, comment, threadID  FROM bboard WHERE ID = threadID");
          $threadOK = false;
           if(isset($query))
           {
            foreach ($query->result() as $row)
            {
             $id        = "$row->ID";
             $name      = "$row->name";
             $comment   = "$row->comment";
             $threadID  = "$row->threadID";
             $threadOK  = true;
                $threads .= '<tr>';
                $threads .= '<td>'.$id.'</td>';
                $threads .= '<td>'.$name.'</td>';
                $threads .= '<td>'.$comment.'</td>';
                $threads .= '<td><a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'board/thread/'.$threadID.'" >Thread</button></a></td>';
                $threads .= '</tr>';
            }
           }
           if($threadOK)
            echo $threads;
           else
           {
            echo "aw fuck";
           }
              echo '</table>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
          ?>
</div>
</body>
</html>