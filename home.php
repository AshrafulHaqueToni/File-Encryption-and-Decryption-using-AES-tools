<html>
<head>
</head>
<body>

<form action="" method="post">

<div class="form-group">
    <i class="fas fa-envelope"></i><label for="stuemail" class="p1-2 font-weight-bold">
   Enter the Encrypt File : </label>  <small id="statusMsg2"></small><input type="file" class="form-control" placeholder="encrypted file" name="enfile" id="enf">
   <br><br>
    <i class="fas fa-envelope"></i><label for="stuemail" class="p1-2 font-weight-bold">
   Enter the secutity key : </label>  <small id="statusMsg2"></small><input type="text" class="form-control" placeholder="key" name="secretkey" id="scekey">
   <br><br>
</div>

<input type="submit" name="submit" value="Submit" />

</form>

   <?php
   // $var = $_GET['id'];
     if (isset($_POST['submit'])) {
         $id1 = $_POST['secretkey'];
         $id2 = $_POST['enfile'];
        // $var = $_GET['id'];
    
    function encrypt_decrypt($action, $ciphertext, $secret_key) {
        $output = false;

        $string=$ciphertext;

        $encrypt_method = "AES-256-CBC";
     
        $secret_iv = 'This is my secret iv';

        $key = hash('sha256', $secret_key);
        
        $iv = substr(hash('sha256', $secret_iv), 0, 16);



        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        
        return $output;
    }

    $data=file_get_contents($id2);
    
    $decrypted_txt = encrypt_decrypt('decrypt', $data, $id1);
   // echo "Decrypted Text =" .$decrypted_txt. "\n";
    file_put_contents("decrypt.mp4",$decrypted_txt);
    file_put_contents("decrypt.txt",$decrypted_txt);
    file_put_contents("decrypt.pdf",$decrypted_txt);
    file_put_contents("decrypt.jpg",$decrypted_txt);
    file_put_contents("decrypt.doc",$decrypted_txt);

    }

    
?>

</body>
</html>