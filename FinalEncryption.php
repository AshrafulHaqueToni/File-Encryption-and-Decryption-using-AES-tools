<?php
    
     if(isset($_POST['stusignup']) && isset($filename = $_FILES['file']['name']) && isset($_POST['secretkey'])){
         $id = $_FILES['file']['name'];
         $id1 = $_POST['secretkey'];

        function encryption($input_file, $secret_key) {
            $output = false;

            $data=file_get_contents($input_file);
           // echo ".".'$input_file'."\n";

            // file_put_contents("decrypt.mp4",$data);
            // file_put_contents("decrypt.txt",$data);
            // file_put_contents("decrypt.pdf",$data);
            // file_put_contents("decrypt.jpg",$data);
            // file_put_contents("decrypt.doc",$data);

           // $data=  $input_file;

            $encrypt_method = "AES-256-CBC";

            $secret_iv = 'This is my secret iv';

            $key = hash('sha256', $secret_key);
            
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output); 

           // return file_put_contents($input_file,$output);
            return $output;
        }

        $encrypted_file = encryption($id, $id1);
        $plaintext=file_put_contents("encrypt.txt",$encrypted_file);  

        echo json_encode("OK");
      }
     else{
       echo json_encode("FALSE"); 
     }
?>
   

