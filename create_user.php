<?php
	
	$respond = array();

	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		require_once __DIR__ . '/db_connect.php';

		$db = new DB_CONNECT();

		$result = mysql_query("INSERT INTO products(name, email, password) VALUES('$name', '$email', '$password')");

		// check if row inserted or not
	    if ($result) {
	        // successfully inserted into database
	        $response["success"] = 1;
	        $response["message"] = "Product successfully created.";
	 
	        // echoing JSON response
	        echo json_encode($response);
	    } else {
	        // failed to insert row
	        $response["success"] = 0;
	        $response["message"] = "Oops! An error occurred.";
	 
	        // echoing JSON response
	        echo json_encode($response);
	    }else {
	    // required field is missing
	    $response["success"] = 0;
	    $response["message"] = "Required field(s) is missing";
	 
	    // echoing JSON response
	    echo json_encode($response);
	}

	}

?>