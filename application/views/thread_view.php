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

          <?php

          $query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE sposti ='".$this->session->userdata('sposti'). "'");


		foreach ($query->result() as $row)
		{
			$id 	   = "$row->id";
			$harrastus = "$row->name";
			$vapaasana   = "$row->comment";
         
         }
          ?>
        <div class="modal-footer">
     
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_harrastukset/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>


  <!-- Modal TYOHISTORIA -->
  <div class="modal fade" id="myModalTyohistoria">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>

          <?php

          $query = $this->db->query("SELECT id, name, comment, image  FROM bboard WHERE threadID ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row)
		{
			$id 	   = "$row->id";
			$tyopaikka = "$row->tyopaikka";
			$tehtava   = "$row->tehtava";
			$alkoi     = "$row->alkoi";
			$loppui    = "$row->loppui";
			$kuvaus    = "$row->kuvaus";
		}
        	foreach ($query->result_array() as $row)
			{
				echo '<img src="'.base_url().'img/'.$row['image'].'" class="img-responsive img-thumbnail" style="width: 200px;">';
			}

			echo form_open_multipart('Upload_controller/do_upload');
				echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>"; 
				echo '<br>';
				echo "<input type='submit' id='nappi' name='submit'  value='Lataa' class='btn btn-success'/> ";
				echo "</form><br>";
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

  <!-- Modal KOULUTUKSET -->
  <div class="modal fade" id="myModalKoulutukset">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>
          <?php

          
        $query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row)
		{
			$id 		  = "$row->id";
			$koulutusnimi = "$row->koulutusnimi";
			$koulutusaste = "$row->koulutusaste";
			$oppilaitos   = "$row->oppilaitos";
			$alkoi2 	  = "$row->alkoi";
			$loppui2 	  = "$row->loppui";
		}
         
          ?>
        <div class="modal-footer">
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_koulutukset/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>
          <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>

  <!-- Modal KORTIT -->
  <div class="modal fade" id="myModalKortit">
   <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="font-weight:bold;" class="modal-title">Vahvista poisto</h4>
        </div>
          <?php

          
        $query = $this->db->query("SELECT id, knimi, voimassa, kommentti, sposti FROM opiskelijakortit WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row)
		{
			$id 	= "$row->id";
			$knimi 	 = "$row->knimi";
			$voimassa = "$row->voimassa";
			$kommentti = "$row->kommentti";
			
		}
         
          ?>
        <div class="modal-footer">
        <?php
         echo '<button type="button" class="btn btn-danger"><a href="'.base_url().'sivu/delete_kortit/'.$id.'" style="text-decoration:none;" id="confirm-delete" >Poista</a></button>';//Poisto nappi
         ?>
          <button type="button" class="btn btn-default" data-dismiss="modal"><a href="" style="text-decoration:none;" id="cancel">Peruuta</a></button>
        </div>
      </div>
     </div>
    </div>
  </div>


<?php
$query = $this->db->query("SELECT etunimi FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row){
		$etunimi = "$row->etunimi";
	
	}
?>

	<?php
		echo '<center>';
		echo '<div class="col-xs-4 col-md-8 col-md-offset-2">';
		//Jos nimen viimeinen kirjain on 's' printtaa ksen profiili
		if (substr($etunimi, -1) == 's')
		{																					//Poistaa nimestä s:n
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".rtrim($etunimi, "s")."</h1>";?><h1 style="display:inline;"><b>ksen profiili</b></h1><br><?php
		}
		//Jos nimen viimeinen kirjain on 'n' tai 'l' tai 'k' tai 'r' printtaa in profiili
		elseif (substr($etunimi, -1) == 'n' || 
				substr($etunimi, -1) == 'l' || 
				substr($etunimi, -1) == 'k' || 
				substr($etunimi, -1) == 'r' ||
				substr($etunimi, -1) == 'd') 
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>in profiili</b></h1><br><?php
		}
		//Jos nimen kaksi viimeistä kirjainta on 'ax'  tai 'ex' printtaa in profiili
		elseif (substr($etunimi, -2) == 'ax' || 
				substr($etunimi, -2) == 'ex' ||
				substr($etunimi, -2) == 'ng')
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>in profiili</b></h1><br><?php
		}
		//Jos nimen viimeinen kirjain on 'x' printtaa en profiili
		elseif (substr($etunimi, -1) == 'x' ||
			    substr($etunimi, -1) == 'g') 
		{
			echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>en profiili</b></h1><br><?php
		}
		
		//Jos nimi päättyy 'u'  tai 'i' tai 'e' tai 'o' tai 'u' tai 'ö' printtaa n profiili 
	 	elseif (substr($etunimi, -1) == 'u' || 
	 		substr($etunimi, -1) == 'i' || 
	 		substr($etunimi, -1) == 'e' || 
	 		substr($etunimi, -1) == 'o' || 
	 		substr($etunimi, -1) == 'u' || 
	 		substr($etunimi, -1) == 'ö' ||
	 		substr($etunimi, -1) == 'a')
	 	{
		 	echo "<h1 style='text-align:center;font-size:;font-weight:bold;display:inline;'>".$etunimi."</h1>";?><h1 style="display:inline;"><b>n profiili</b></h1><br><?php
		}
		echo '</center><br><br><br><br>';
		echo '</div><br>'

		 
?>
	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<?php

	//echo '<div class="col-xs-2 col-md-1 >';
	echo '<a role="button" id="osaamispankki"  href="'.base_url().'">Osaamispankki</a>';
	//echo '</div>';
	echo '<a href="haku" class="btn btn-success" style="text-decoration:none;font-size:1.5em;" id="confirm-delete" ><span class="glyphicon glyphicon-search">Hakuun</span></a>';
	//echo '<div class="col-sm-1 col-md-pull-3>';	
	echo '<a role="button" id="kirjauduulos" style="float:right;" href="'.base_url().'sivu/logout'.'" >Kirjaudu ulos</button></a>'; 
	//echo '</div>';
	//echo "<h3 style='font-family:Impact, Charcoal, sans-serif;font-size:1.3em;margin-left:200px;margin-top:-51px;'>Tervetuloa,</h3>"; 
	echo "</b>";

	echo '</nav>';

	
	echo '<div class="col-md-6 col-md-offset-3">';
	//Perustiedot

	$query = $this->db->query("SELECT privSposti, etunimi, sNimi, osoite, postinro, puhelinnro, lyhytKuvaus, aktiivisuus  FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result() as $row)
	{
		$privSposti = "$row->privSposti";
		$eNimi = "$row->etunimi";
		$sNimi = "$row->sNimi";
		$osoite = "$row->osoite";
		$postinro = "$row->postinro";
		$puhelinnro = "$row->puhelinnro";
		$lyhytKuvaus = "$row->lyhytKuvaus";
		$aktiivisuus = "$row->aktiivisuus";
	}


	echo '<div class="row">';
	echo '<div class="col-md-8">';
	
	
	$query = $this->db->query("SELECT etunimi, pkuva, sNimi, puhelinnro, pitkaKuvaus, spuoli, lyhytKuvaus, sposti FROM henkilotiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

	foreach ($query->result_array() as $row)
	{
		echo '<img src="'.base_url().'images/profiili/'.$row['pkuva'].'" class="img-responsive img-thumbnail" style="width: 200px;">';
	}

	echo form_open_multipart('Upload_controller/do_upload');
		echo "<input type='file' id='uploadBox' name='userfile' size='20' class=''/>"; 
		echo '<br>';
		echo "<input type='submit' id='nappi' name='submit'  value='Lataa' class='btn btn-success' disabled/> ";
		echo "</form><br>";

		echo '<div class="col-md-12 col-xs-4 col-xs-pull-1" style="position:relative;margin-left:350px;margin-top:-290px;">';
			echo '<a href="'.base_url().'sivu/members_edit" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a><br><br>';

			if ($aktiivisuus == '1'){
			echo '<p style="display:inline;margin-left:-15px;"><b style="color:green">Profiili näkyy haussa </b></p><br>';
			}else {
			echo '<p style="display:inline;margin-left:-15px;"><b style="color:red;">Profiili ei näy haussa </b></p><br>';
		}
			
		    echo '<b style="font-size:1.1em;">      Sähköposti: </b>';
		    echo $privSposti;
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">             Etunimi: </b>';
		    echo $eNimi;
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">          Sukunimi: </b>';
		    echo $sNimi;
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">               Osoite: </b>';
		    echo $osoite;
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">    Postinumero: </b>';
		    echo $postinro;
		    echo '</br>';
		    echo '<b style="font-size:1.1em;">Puhelinnumero: </b>';
	    	echo $puhelinnro;
	    	echo '</br>';
		    echo '<b style="font-size:1.1em;">   Lyhyt kuvaus: </b>';
	    	echo $lyhytKuvaus;
	    	echo '</br>';

	    	$query = $this->db->query("SELECT henkiloId, luotu FROM kirjautumistiedot WHERE sposti ='".$this->session->userdata('sposti'). "'");

		foreach ($query->result() as $row)
		{
			$id 	= "$row->henkiloId";
			$luotu 	 = "$row->luotu";				
		}

		
		echo '<div class="row">';
		echo '<div class="col-xs-1 col-xs-pull-1" ><br><br><br><br>';
		echo '<table class="table table-bordered" border="1" id="table">';
		echo '<thead>';
		echo '<tr>';
		echo '<td class="col-md-2 col-xs-8 "><p style=""><b>Rekisteröitymispäivämäärä ja aika</b></p></td>';
		echo '<td class="col-md-1 ">'.$luotu.'</td>';
		echo '<tr></tr>';
		//echo '<td class="col-md-2 "><p style=""><b>Edellinen käyntisi oli</b>  </p></td>';
		//echo '<td class="col-md-1 ">'.$lasttlogin.'</td>';
		echo '</tr>';
		echo '</thead>';
		echo '</table>';
	    echo '</div>';
	    echo '</div>';

    	echo '</div>';
    	echo '</div>';    	

	
	echo '</div>';
	echo '</div>';
	echo '</div>';

	//Harrastus
	echo '<div class="row">';
	echo '<div class="col-md-8 col-xs-8 col-md-offset-4">';
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Harrastukset</p><a href="'.base_url().'sivu/harrastukset_lisaus" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';
	
	$harrastukset = "";

	$harrastukset .= '<table class="table" border="1">';
	$harrastukset .= '<thead><tr><th>Harrastus</th><th>Vapaa sana</th><th style="width:150px;"></th></tr></thead>';

	
	$query = $this->db->query("SELECT id, harrastus, vapaasana FROM harrastukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	   = "$row->id";
		$harrastus = "$row->harrastus";
		$vapaasana   = "$row->vapaasana";
		

		if($harrastus != NULL) 
		{
			$bFound = true;
		
			$harrastukset .= '<tr>';
			$harrastukset .= '<td>'.$harrastus.'</td>';
			$harrastukset .= '<td style="max-width:500px;word-wrap: break-word;">'.$vapaasana.'</td>';
			$harrastukset .= '<td><a href="'.base_url().'sivu/edit_harrastukset/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a>';//Muokkaus nappi
			$harrastukset .= '<button type="button" style="margin-left:60px;margin-top:-50px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalHarrastukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button>';//Poisto nappi
			$harrastukset .= '</tr>';
		}
	}
		
	if($bFound)
		echo $harrastukset;
	else
		echo "<p style='color:red;font-weight:bold;'>Harrastuksia ei ole lisätty</p>";
	
	
	echo '</table>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	

	//Tyohistoria
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="tyohistoria">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Työhistoria</p><a href="'.base_url().'sivu/tyohistoria_lisaus" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.2em;line-height:22px;height:35px;" role="button"></a></li><br><br>';
	
	$tyohistoria = "";

	$tyohistoria .= '<table class="table" border="1">';
	$tyohistoria .= '<thead><tr><th>Työpaikka</th><th>Tehtävä</th><th>Alkoi</th><th>Loppui</th><th>Kuvaus</th><th style="width:140px"></th></tr></thead>';

	
	$query = $this->db->query("SELECT id, tyopaikka, tehtava, alkoi, loppui, kuvaus FROM tyo WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	   = "$row->id";
		$tyopaikka = "$row->tyopaikka";
		$tehtava   = "$row->tehtava";
		$alkoi     = "$row->alkoi";
		$loppui    = "$row->loppui";
		$kuvaus    = "$row->kuvaus";

		if($tyopaikka != NULL) 
		{
			$bFound = true;
		
			$tyohistoria .= '<tr>';
			$tyohistoria .= '<td>'.$tyopaikka.'</td>';
			$tyohistoria .= '<td>'.$tehtava.'</td>';
			$tyohistoria .= '<td>'.$alkoi.'</td>';
			$tyohistoria .= '<td>'.$loppui.'</td>';
			$tyohistoria .= '<td style="max-width:500px;word-wrap: break-word;">'.$kuvaus.'</td>';
			$tyohistoria .= '<td><a href="'.base_url().'sivu/edit_tyohistoria/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a>';//Muokkaus nappi
			$tyohistoria .= '<button type="button" style="margin-left:60px;margin-top:-50px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalTyohistoria"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$tyohistoria .= '</tr>';
			$tyohistoria .= '</tr>';
		}
	}
		
	if($bFound)
		echo $tyohistoria;
	else
		echo "<p style='color:red;font-weight:bold;'>Tyohistoriaa ei ole lisätty</p>";
	
	
	echo '</table>';
	echo '</div>';
	echo '</div>';
	echo '</div>';



	//Koulutus
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="koulutukset">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Koulutukset</p><a href="'.base_url().'sivu/koulutukset_lisaus" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';

	$koulutukset = "";

	$koulutukset .= '<table class="table" border="1">';
	$koulutukset .= '<thead><tr><th>Koulutusnimi</th><th>Koulutusaste</th><th>Oppilaitos</th><th>Alkoi</th><th>Loppui</th><th style="width:140px"></th></tr></thead>';

	$query = $this->db->query("SELECT id, koulutusnimi, koulutusaste, oppilaitos, alkoi, loppui, sposti FROM koulutukset WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 		  = "$row->id";
		$koulutusnimi = "$row->koulutusnimi";
		$koulutusaste = "$row->koulutusaste";
		$oppilaitos   = "$row->oppilaitos";
		$alkoi2 	  = "$row->alkoi";
		$loppui2 	  = "$row->loppui";
		$sposti 	  = "$row->sposti";

		if($koulutusnimi != NULL)
		{
			$bFound = true;

			$koulutukset .= '<tr>';
			$koulutukset .= '<td>'.$koulutusnimi.'</td>';
			$koulutukset .= '<td>'.$koulutusaste.'</td>';
			$koulutukset .= '<td>'.$oppilaitos.'</td>';
			$koulutukset .= '<td>'.$alkoi2.'</td>';
			$koulutukset .= '<td>'.$loppui2.'</td>';
			$koulutukset .= '<td><a href="'.base_url().'sivu/edit_koulutukset/'.$id.'" class="btn btn-primary button blue"><span style="line-height:14px;" class="glyphicon glyphicon-pencil"></span></a>';//Muokkaus nappi
			$koulutukset .= '<button type="button" style="margin-left:60px;margin-top:-50px;" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKoulutukset"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$koulutukset .= '</tr>';
		}
	}

	$koulutukset .= '</table>';

	if($bFound)
		echo $koulutukset;
	else
		echo "<p style='color:red;font-weight:bold;'>Koulutuksia ei ole lisätty</p>";

	echo '</div>';
	echo '</div>';
	echo '</div>';
	
	
	//Kortit
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-8">';
	echo '<div id="kortit">';
	echo '<p style="font-weight:Bold;margin-right:10px;font-size:2em;display:inline;">Kortit</p><a href="'.base_url().'sivu/kortit_lisaus" class="btn btn-success glyphicon glyphicon-plus button green" data-placement="top" style="font-size:1.3em;line-height:22px;height:35px;" role="button"></a></li><br><br>';
	
	$kortit = "";

	$kortit .= '<table class="table" border="1">';
	$kortit .= '<thead><tr><th>Kortti</th><th>Vanhenemispäivä</th><th>Kommentti</th><th style="width:30px"></th></tr></thead>';

	$query = $this->db->query("SELECT id, knimi, sposti, kommentti, voimassa FROM opiskelijakortit WHERE sposti ='".$this->session->userdata('sposti'). "'");

	$bFound = false;

	foreach ($query->result() as $row)
	{
		$id 	= "$row->id";
		$knimi 	 = "$row->knimi";
		$voimassa = "$row->voimassa";
		$kommentti = "$row->kommentti";

		if($kortit != NULL)
		{
			$bFound = true;

			$kortit .= '<tr>';
			$kortit .= '<td>'.$knimi.'</td>';
			$kortit .= '<td>'.$voimassa.'</td>';
			$kortit .= '<td>'.$kommentti.'</td>';
			$kortit .= '<td><button type="button" class="btn btn-danger button red" data-toggle="modal" data-target="#myModalKortit"><span style="line-height:10px;" class="glyphicon glyphicon-trash"></span></button></td>';//Poisto nappi
			$kortit .= '</tr>';
		}
	}

	$kortit .= '</table>';

	if($bFound)
		echo $kortit;
	else
		echo "<p style='color:red;font-weight:bold;'>Kortteja ei ole lisätty</p>";

	echo '<br><br><br><br></div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';
	//echo '</div>';




	?>

</div>
</body>
</html>