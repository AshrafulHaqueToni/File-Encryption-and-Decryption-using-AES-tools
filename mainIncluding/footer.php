    <!--Start Footer-->
    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2022 || Design by  <a href="https://www.facebook.com/ashraful.cse.jnu/">Ashraful Haque</a> </small>
      
    </footer>
    <!--Footer End-->
  

  <!--Start Encryption Modal-->


      <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterLabe1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="stuRegModalCenterLabe1">File Encryption</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <!-- start encryption form -->
              <form>
              <div >
              <div class="form-group">
               <label for="filename" class="p1-2 font-weight-bold">Enter Your File : </label>
                  <small id="statusMsg1"></small><input type="file" class="form-control" name="file" id="file">
            </div>

            <div class="form-group">
               <label for="secretkey" class="p1-2 font-weight-bold">
                 Enter Your key : </label> 
                  <small id="statusMsg2"></small><input type="file" class="form-control" placeholder="key" name="file1" id="file1">
            </div>

              <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile();">
             </div>
           </form>

           <!-- end encryption form -->

              <script type="text/javascript">

              // Upload file
              function uploadFile() {

                var files1 = document.getElementById("file1").files;
                var files = document.getElementById("file").files;

                if(files1.length > 0 ){ 

                  var formData = new FormData();
                  
                  formData.append("file", files1[0]);

                  var xhttp = new XMLHttpRequest();

                  // Set POST method and ajax file path
                  xhttp.open("POST", "ajaxfilekey.php", true);

                  // call on request changes state
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          
                          var response = this.responseText;
                          if(response == 1){
                          }else{ 
                            $("#successMsg").html("<span class='alert alert-danger'>Given wrong key format</span>");
                            clearStuRegField();
                            
                          }
                      }
                  };
                  xhttp.send(formData);
                }
                else{
                  alert("Please select key file");
                }
                
                if(files.length > 0 ){ 
                  var formData = new FormData();
                  formData.append("file", files[0]);
                  var xhttp = new XMLHttpRequest();
                  // Set POST method and ajax file path
                  xhttp.open("POST", "ajaxfile.php", true);
                  // call on request changes state
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          
                          var response = this.responseText;
                          if(response == 1){
                            $("#successMsg").html("<span class='alert alert-success'>Encrypted Successfully !</span>");
                              clearStuRegField();
                              setTimeout(()=>{
                                window.location.href = "first.php";

                               },1000);

                
                          }else{ 
                            $("#successMsg").html("<span class='alert alert-danger'>Unable to Encrypt</span>");
                            clearStuRegField();
                            
                          }
                      }
                  };
                  
                  // Send request with data
                  xhttp.send(formData);

                }else{
                  alert("Please select a file");
                }
                
              }
              </script>


            </div>

            <div class="modal-footer">
              
             <!-- <button type="button" class="btn btn-primary" onclick="addStu()" id="signup">Sign Up</button> -->
             <span id="successMsg"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>

    <!--End Encryption Modal-->

    <!-- Start Decryption Modal-->


    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="stuLoginModalCenterLabel">File Decryption </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <!-- Start decryption Form-->
               <form>
              <div >
              <div class="form-group">
               <label for="filename" class="p1-2 font-weight-bold">Enter Cyphertext : </label>
                  <small id="statusMsg1"></small><input type="file" class="form-control" name="file2" id="file2">
            </div>

           <!--  <div class="form-group">
               <label for="secretkey" class="p1-2 font-weight-bold">
                 Enter The key : </label> 
                  <small id="statusMsg2"></small><input type="file" class="form-control" placeholder="key" name="file3" id="file3">
            </div> -->

              <input type="button" id="btn_uploadfile" value="Upload" onclick="uploadFile1();">
             </div>
           </form>

           <!-- END Decrption Form-->

            <script type="text/javascript">

              // Upload file
              function uploadFile1() {

               // var files2 = document.getElementById("file3").files;
                var files3 = document.getElementById("file2").files;

                // if(files2.length > 0 ){ 

                //   var formData = new FormData();
                  
                //   formData.append("file", files2[0]);

                //   var xhttp = new XMLHttpRequest();

                //   // Set POST method and ajax file path
                //   xhttp.open("POST", "ajaxfilekey1.php", true);

                //   // call on request changes state
                //   xhttp.onreadystatechange = function() {
                //       if (this.readyState == 4 && this.status == 200) {
                          
                //           var response = this.responseText;
                //           if(response == 1){
                //           }else{ 
                //             $("#successMsgg1").html("<span class='alert alert-danger'>Given wrong key format</span>");
                            
                //           }
                //       }
                //   };
                //   xhttp.send(formData);
                // }
                // else{
                //   alert("Please select key file");
                // }
                
                if(files3.length > 0 ){ 
                  var formData = new FormData();
                  formData.append("file", files3[0]);
                  var xhttp = new XMLHttpRequest();
                  // Set POST method and ajax file path
                  xhttp.open("POST", "ajaxfile1.php", true);
                  // call on request changes state
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          var response = this.responseText;
                          if(response == 1){
                            $("#successMsg1").html("<span class='alert alert-success'>Decrypted Successfully !</span>");
                              setTimeout(()=>{
                              window.location.href = "first.php";
                              },1000);

                
                          }else{ 
                            $("#successMsg1").html("<span class='alert alert-danger'>Unable to Decrypt</span>");
                            
                            
                          }
                      }
                  };
                  
                  // Send request with data
                  xhttp.send(formData);

                }else{
                  alert("Please select a file");
                }
                
              }
              </script>

            </div>
            <div class="modal-footer">
              <span id="successMsg1"></span>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              
            </div>
          </div>
        </div>
      </div>

      <!-- Ending Decryption Modal -->

  <!-- Jquery and Bootstrap Javasrcipt--> 
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>

  <!-- Fontawesome Javasrcipy-->
  
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- Student Testimonial owl Slider Js-->
  <script type="text/javascript" src="js/owl.min.js"></script>
  <script type="text/javascript" src="js/testyslider.js"></script>

  <!--Student Ajax call Javasrcipt-->
  <script type="text/javascript" src="js/ajaxrequest.js"></script>

  <!--Admin Ajax call Javasrcipt-->
  <script type="text/javascript" src="js/adminajaxrequest.js"></script>
 
</body>
</html>