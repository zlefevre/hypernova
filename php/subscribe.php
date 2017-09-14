<?php

	// MailChimp
	$APIKey = '776cf1f8452bd25d61ab61709ba824b2-us16'; // change to your API key
	$listID = '3d8bc8c6e8'; // change to your list id

	$email   = $_POST['email'];

	require_once('MCAPI.class.php');

	$api = new MCAPI($APIKey);
	$list_id = $listID;

	if($api->listSubscribe($list_id, $email) === true) {
		$sendstatus = 1;
		$message = '<div class="alert alert-success subscription-success" role="alert"><strong>Success!</strong> Check your email to confirm sign up.</div>';
	} else {
		$sendstatus = 0;
		$message = '<div class="alert alert-danger subscription-error" role="alert"><strong>Error:</strong> ' . $api->errorMessage.'</div>';
	}

	$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

	echo json_encode($result);

?>