<?php

	require_once "class-db.php";

	$conn = new DB_Class();

	if( isset($_POST['signup']) && isset($_FILES['imgup']) ){

		$inserts = array (
			'fname' ,
			'lname' ,
			'emailaddress' ,
			'mobilenumber',
			'nric',
			'address',
			'city',
			'state',
			'country',
			'zipcode',
			'image');

		$to_insert = array ();
		foreach ($inserts as $keys) {

			if('image' == $keys) {
				$to_insert['image'] = $_FILES['imgup']['name'];
			} else {
				$to_insert[$keys] = $_POST[$keys];
			}
		}

		$to_insert['reg_date'] = date('Y-m-d H:i:s'); //YYYY-MM-DD HH:MM:SS

		if(move_uploaded_file($_FILES['imgup']['tmp_name'], "assets/{$_FILES['imgup']['name']}")) {

			if($_FILES['imgup']['error'] > 0) {
				$result = false;
			} else {
				if ( file_exists($_FILES['imgup']['tmp_name']) && is_file($_FILES['imgup']['tmp_name']) ) {
					unlink($_FILES['imgup']['tmp_name']);
				}

				$result = $conn->insert( $to_insert );
			}
		} else {
			$result = false;
		}

		if($result) {
			header('Location: index.php?success=1');
			//echo 'success';
		} else {
			echo 'failed';
		}

	}
?>
