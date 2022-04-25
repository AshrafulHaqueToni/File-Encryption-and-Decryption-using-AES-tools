<html>
<head>
</head>
<body>
    
<form action="" method="post">

    <div class="form-group">
        <i class="fas fa-user"></i><label for="stuname" class="p1-2 font-weight-bold">Enter The File : </label>
        <small id="statusMsg1"></small><input type="file" class="form-control" name="filename" id="infile">
        <br><br>
    </div>

    <div class="form-group">
        <i class="fas fa-envelope"></i><label for="stuemail" class="p1-2 font-weight-bold">
       Enter the key : </label>  <small id="statusMsg2"></small><input type="text" class="form-control" placeholder="key" name="secretkey" id="scekey">
       <br><br>
    </div>

    <input type="submit" name="submit" value="Submit" />

</form>

    <?php
     if (isset($_POST['submit'])) {
         $id = $_POST['filename'];
         $id1 = $_POST['secretkey'];
        
        
        function encryption($action, $input_file, $secret_key) {
            $output = false;

            $data=file_get_contents($input_file);

            $encrypt_method = "AES-256-CBC";

            $secret_iv = 'This is my secret iv';

            $key = hash('sha256', $secret_key);
            
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output = openssl_encrypt($data, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output); 

           // return file_put_contents($input_file,$output);
            return $output;
        }

        //$plain_txt = "Hello World!";
        //echo "Original Text =" .$id. "\n";
        ?><br><br><?php
            $encrypted_file = encryption('encrypt', $id, $id1);

        //echo "encrypt =" .$encrypted_file. "\n";

        $plaintext=file_put_contents("encrypt.txt",$encrypted_file);
            
         ?><br><br><?php 
          // echo '<p><a href="/examples/php/download.php?file=' . urlencode($plaintext) . '">Download</a></p>';
         //fwrite($, string);
        }
    ?>
    <a href= "home.php"> Click Here </a>


</body>
</html>