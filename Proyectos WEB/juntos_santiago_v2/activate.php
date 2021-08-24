<?php
require('classes/config.php');

//collect values from the url
$userName = trim($_GET['x']);
$active = trim($_GET['y']);

//if id is number and the active token is not empty carry on
if(!empty($active)){

	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE usuarios SET active = 'Yes' WHERE userName = :userName AND active = :active");
	$stmt->execute(array(
		':userName' => $userName,
		':active' => $active
	));

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1){

		//redirect to login page
		header('Location: index.php?action=active');
		exit;

	} else {
		echo "Your account could not be activated."; 
	}
	
}
?>