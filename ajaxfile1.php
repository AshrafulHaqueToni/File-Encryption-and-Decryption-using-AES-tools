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

			function encrypt_decrypt($ciphertext) {
		        $output = false;
		        $string=file_get_contents("upload/$ciphertext");
		       // $secret_key=file_get_contents("upload/key.txt");
		        $secret_key=file_get_contents('https://drive.google.com/uc?export=download&id=1smIycuPQJErvDj44HFZA-SYbamziBvfv');
		        $encrypt_method = "AES-256-CBC";
		        $secret_iv = 'This is my secret iv';
		        $key = hash('sha256', $secret_key);
		        $iv = substr(hash('sha256', $secret_iv), 0, 16);
		        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		        return $output;
		    }

		    $decrypted_txt = encrypt_decrypt($_FILES['file']['name']);

		    file_put_contents("decrypt.mp4",$decrypted_txt);
		    file_put_contents("decrypt.txt",$decrypted_txt);
		    file_put_contents("decrypt.pdf",$decrypted_txt);
		    file_put_contents("decrypt.jpg",$decrypted_txt);
		    file_put_contents("decrypt.doc",$decrypted_txt);
		    //file_put_contents("decrypt.docx",$decrypted_txt);
		    // file_put_contents("decrypt.png",$decrypted_txt);
		    // file_put_contents("decrypt.jpeg",$decrypted_txt);

		}	
	}
	echo $response;
	exit;
}
