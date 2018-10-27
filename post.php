<?php
	
	header("Content-type: application/json; charset=utf-8");

	$result['success'] = false;

	if(isset($_POST['date'])){
		$result['success'] = true;
		$date = $_POST['date'];
		$heure = $_POST['heure'];

		$result['date'] = $date;
		$result['heure'] = $heure; 
		$result['msj'] = "Vous avez programmer un rendez-vous pour Le ".$date." a ".$heure;
	}

	if (isset($_POST['sendDate'])) {
		$result['success'] = true;

		$heureDispo = array("6:00 AM - 9:15 AM","10:00 AM - 12:00 PM","1:00 PM - 2:10PM","2:45 PM - 6:00PM");

		$result['hDispo'] = $heureDispo;
	}

	echo json_encode($result);
?>