function addStu(){

  var filename= $("#filename").val();
  var secretkey= $("#secretkey").val();

  console.log(secretkey);
  console.log(filename);

  
  $.ajax({
    url:'FinalEncryption.php',
    method: 'POST',
    dataType: "json",
    data:{
      stusignup: "stu",
      filename: filename,
      secretkey: secretkey,
    },

    success: function(data){
      console.log(data);
      if( data == "OK")
      {
        $("#successMsg").html("<span class='alert alert-success'>Encrypted Successfully !</span>");
        clearStuRegField();
        setTimeout(()=>{
          window.location.href = "first.php";

         },1000);
      }
      else if(data == "Failed"){
        $("#successMsg").html("<span class='alert alert-danger'>Unable to Encrypt</span>");
      }
    },

  });
}

//Empty All Fields
function clearStuRegField(){
   $("#stuRegForm").trigger("reset");
   $("#statusMsg1").html(" ");
   $("#statusMsg2").html(" ");
}



