<?php 

if(isset($_FILES['file']['name']) ){
	// file name
	$filename = $_FILES['file']['name'];

	// Location
	$location = 'upload/'.$filename;

	// file extension
	$file_extension = pathinfo($location, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);

	// Valid image extensions
	$valid_ext = array("pdf","doc","docx","jpg","png","jpeg","docx","txt","mp4");

	$response = 0;
	if(in_array($file_extension,$valid_ext)){
	  	// Upload file
	  	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	    	$response = 1;

		    function encryption($input_file) {
	            $output = false;
	            $data=file_get_contents("upload/$input_file");
	            $secret_key =file_get_contents("upload/key.txt");
	            $encrypt_method = "AES-256-CBC";
	            $secret_iv = 'This is my secret iv';
	            $key = hash('sha256', $secret_key);
	            $iv = substr(hash('sha256', $secret_iv), 0, 16);
	            $output = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
	            $output = base64_encode($output); 
	            return $output;
	        }

		    $encrypted_file = encryption($_FILES['file']['name']);
			$plaintext=file_put_contents("encrypt.txt",$encrypted_file);
		    
	  	}	
	}
	echo $response;


	exit;

	
}
