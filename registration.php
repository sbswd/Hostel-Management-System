<?php 
session_start();
require 'include/dbcon.php';

function getRegisterNum($conn)
{
  
$sql="SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
  return $row['regnum'];
}else {
  return 2;
}
}

if (isset($_POST['rbtn'])) {
  $rgno=$fname=$mname=$lname=$phno=$email=$pwd=$cpwd=$gender="";
  $rgno=$_POST['regno'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $phno=$_POST['phno'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $cpwd=$_POST['cpwd'];
  $gender=$_POST['gender'];
if($pwd==$cpwd)
{
  $hashedpass="";
  $hashedpass=password_hash($pwd,PASSWORD_DEFAULT);
  print($hashedpass); 
 $sql="INSERT INTO `users`(`regnum`, `fname`, `mname`, `lname`, `gender`, `phno`, `email`, `pwd`) 
 VALUES ($rgno,'$fname','$mname','$lname','$gender',$phno,'$email','$hashedpass')";
 if ($conn->query($sql) === TRUE) {
  $sql="SELECT * FROM `users` WHERE `email`='$email'";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $_SESSION['userid']=$row['id'];
    $_SESSION['usertype']=$row['utype'];
    $_SESSION['userreg'] = $row['regnum'];
    if (isset($_SESSION["userid"])) {
      header('Location:index.php');
    }else {
      echo"<script>alert('user id not set')</script>";
    }
  }
}else {
  echo"<script>alert('there is an error! please check later')</script>";
}
}
else
{
  echo"<script>alert('password not matched')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HmS</title>
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="css/common/bootstrap.min.css">
    <link rel="stylesheet" href="css/registration.css">
  </head>



  <body>
    <section id="home">
        <div class="formcontainer">
            <div class="logo">HmS</div>
            <div class="heading">Register Form</div>
            <br>
            <form
            method="post"
            action=""
            name="registration"
            class="form-horizontal"
          >
            <div class="form-group">
              <label class="col-sm-2 control-label"> Registration No : </label>
              <div class="col-sm-9">
                <input
                  type="number"
                  name="regno"
                  id="regno"
                  class="form-control"
                  required="required"
                  value="<?php echo getRegisterNum($conn)+1;?>"
                  readonly
                />
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name : </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  name="fname"
                  id="fname"
                  class="form-control"
                  required="required"
                  pattern="[A-Za-z]+" title="Numbers not Allowed"
                />
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Middle Name : </label>
              <div class="col-sm-9">
                <input type="text" name="mname" id="mname" class="form-control"  pattern="[A-Za-z]+" title="Numbers not Allowed"/>
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label" >Last Name : </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  name="lname"
                  id="lname"
                  class="form-control"
                  required="required"
                  pattern="[A-Za-z]+" title="Numbers not Allowed"
                />
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Gender : </label>
              <div class="col-sm-9">
                <select name="gender" class="form-control" required="required">
                  <option value="" disabled>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="others">Others</option>
                </select>
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Contact No : </label>
              <div class="col-sm-9">
                <input
                  type="text"
                  name="phno"
                  id="contact"
                  class="form-control"
                  required="required"
                  pattern="[0-9]{10}" 
                  title="Must contain Numbers"
                  maxlength="10"
                  minlength="10"
                />
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Email id: </label>
              <div class="col-sm-9">
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  onBlur="checkMail()"
                  required="required"
                />
                <span id="user-availability-status" style="font-size: 12px"></span>
              </div>
            </div>
  
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Password: </label>
              <div class="col-sm-9">
                <input
                  type="password"
                  name="pwd"
                  id="password"
                  class="form-control"
                  required="required"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                
                />
              </div>
            </div>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Password : </label>
              <div class="col-sm-9">
                <input
                  type="password"
                  name="cpwd"
                  id="cpassword"
                  class="form-control"
                  required="required"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                />
              </div>
            </div>
      
            <div class="col-sm-6 co-xs-6 col-sm-offset-6 sub_btn">
              <input
                type="submit"
                name="rbtn"
                value="Register"
                id="regbtn"
                
                class="btn btn-primary"
              />
            </div>
          </form>
        </div>
    </section>
  </body>
   
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
  <script>
    
    console.log(text);
    function checkMail() {
      
      jQuery.ajax({
        url:"include/validating.php",
        data:'emailid='+$("#email").val(),
        type:"POST",
        success:function(data){
          console.log(data)
          if (parseInt(data) == 1) {
            $("#user-availability-status").html("<span style='color:red'> Email already Registred </span>");
            document.getElementById("regbtn").disabled = true;
          }else if(parseInt(data) == 0){
            $("#user-availability-status").html("<span style='color:green'> Email available for registration .</span>");
            document.getElementById("regbtn").disabled = false;
          }else if(parseInt(data) == 2){
            $("#user-availability-status").html("<span style='color:red'> error : You did not enter a valid email.</span>");
            document.getElementById("regbtn").disabled = true;
          }
          else{
            $("#user-availability-status").html("<span style='color:red'> error : please fill field.</span>");
            document.getElementById("regbtn").disabled = true;
          }
         
        },
        error:function(){
          event.preventDefault();
          alert("error");
        }
      })
    }

     </script>
</html>
