<?php
session_start();
require "include/dbcon.php";
require "include/phpcode.php";

if (isset($_POST['loginbtn'])){
    $uname=$_POST['username'];
    $pwd=$_POST['pwd'];
    $sql="SELECT * FROM `users` WHERE `email`='$uname'";
    $res=$conn->query($sql);
    if ($row= $res->fetch_assoc()){
        if (password_verify($pwd,$row['pwd'])) {
            $_SESSION['userid']=$row['id'];
            $_SESSION['usertype']=$row['utype'];
             $_SESSION['userreg'] = $row['regnum'];
            // $cookie_name = "user";
            // $cookie_value = "John Doe";
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            if (!isset($_SESSION['usertype'])) {
              print("<script> alert('session not set');</script>");
            }else {
              
              header('Location:index.php?logined');
              
            }
        }else {
            print("<script> alert('Password not match');</script>");
        }
    }else {
        print("<script> alert('Email id not exist');</script>");
    }

}
$admincheck="";
if (isset($_SESSION['usertype'])) {
  $admincheck=$_SESSION['usertype'];
}else {
  $admincheck="";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HmS</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://kit.fontawesome.com/3d3098ed17.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <style>
      #home {
  height: 100vh;
  min-height: 500px;
  background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
    url(images/1001.jpg);
  background-size: cover;
  background-attachment: fixed;
}
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="inner-width">
        <a href="#" class="logo">HmS</a>

        <button class="menu-toggler">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="navbar-menu">
          <a href="#home" onclick="myfun(temp=1)" id="l1" class="current"
            >Home</a
          >
          <a href="#gallery" onclick="myfun(temp=2)" id="l2">Gallery</a>
          <a href="#Contact" onclick="myfun(temp=3)" id="l3">Contact us</a>
          <?php if($admincheck== 2){
            ?>
            <a href="admin/admindash.php"  >My Dash</a>
          <?php
          }else if($admincheck== 1){
          ?>
           <a href="user/dash.php"  >My Dash</a>
          <?php
          }
          ?>
          <?php
          if ($admincheck== 2 || $admincheck == 1) {
          ?>
          <a href="include/logout.php"  >Logout</a>
          <?php 
          }else{
          ?>
            <a onclick="myFunction(temp=1)" id="drop_btn">Login</a>

          <?php
          }
          ?>
     
        </div>
      </div>
    </nav>
    <div class="artscato" id="cato">
      <div class="header">
        <div class="logtxt">
          <h3>Login</h3>
        </div>
        <div class="closebtn">
          <button type="submit" class="closedrop" onclick="myFunction(temp=2)">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
      <br />
      <form action="" method="post" class="innerform">
        <div class="form_container">
          <input type="text" name="username" id="" placeholder="Username"/><br> 

        </div>
        <div class="form_container">
          <input type="password" name="pwd" id="" placeholder="Password" />
        </div>
        <div class="form_container_btn">
          <button type="submit" name="loginbtn">Login</button>
        </div>
      </form>
      <p class="registertxt">New User?<a href="registration.php">Register</a></p>
    </div>
    <!-- Home -->
    <section id="home">
      <div class="inner-width">
        <div class="content">
          <h1></h1>
        </div>
      </div>
    </section>
    <section id="gallery" class="dark">
      <div class="inner-width">
        <h1 class="section-title">Gallery</h1>
        <div class="works">
          <?php
          $images="";
          $images=getImage();
          while($row = $images->fetch_assoc()){
           ?>
         <div class="work">
            <img src="homeimage/<?php echo $row['images']?>" alt="" />
             
            <div class="info">
              <?php 
                 if ($admincheck == 2) {
                 ?>
              <form action="" method="post">
                <input type="hidden" name="hideimgid" id="imgid" value="<?php echo $row['id']?>"/>
                <button type="button"  name="<?php echo $row['id']?>">
                  Change image
                </button>
              </form>
              <?php
                 }
              ?>
          
            </div>
          </div>

          <?php
          }
            ?>
     

     
        </div>
      </div>
      <div class="popup_image">
        <span>&times;</span>
        <div class="textdiv">
          <img src="images/works/6.jpg" alt="" class="center" />
        </div>
      </div>
      <div class="popup_changeimg" id="imgchangecon">
        <span>&times;</span>
        <div class="changeimgcon">
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="imageid" id="imgidinpop" />
            <label class="custom-file-upload">
              Click here to Choose image
              <input
                required
                id="file-upload"
                type="file"
                style="display: none"
                name="changeimg"
                onchange="getFile()"
              />
            </label>

            <div class="form_btn_div">
              <button type="submit" name="changeimgbtn">Change</button>
            </div>
          </form>
          <div class="img_div">
            <div class="imgcon">
              <img
                src="images/hostel.jpg"
                alt=""
                srcset=""
                class="center"
                id="editImage"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="Contact">
      <div class="inner-width">
        <h1 class="section-title">Contact Us</h1>
      </div>
      <div class="contact_con">
        <div class="contact_con_1">
          <?php
          $usertype="";
          $userdeatils= array("uname"=>"","uemail"=>""); 
           if (isset($_SESSION['usertype']) and $_SESSION['usertype'] == 1) {
            $userdeatils=userGetDetails();
            $usertype="readonly";
           }

          ?>
          <form action="" class="contact-form" method="post">
            <input type="text" class="nameZone" placeholder="Your Full Name" name="username" required  value="<?php echo $userdeatils['uname']; ?>" <?php echo $usertype; ?> />
            <input type="email" id="mail" class="emailZone" placeholder="Your Email" name="usermail" required value="<?php echo $userdeatils['uemail']; ?>" <?php echo $usertype; ?> />
            <label for="mail" id="errormsg" style="color: red;"></label>
            <textarea class="messageZone" placeholder="Message" name="msg" required></textarea>
            <input type="submit" value="Send Message" class="btn" name="msgbtn" />
          </form>
        </div>
        <div class="contact_con_2"> 
          <iframe
        
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6369.696814637677!2d76.24685376310264!3d10.2070714301919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b081aa9f62a485d%3A0x8d20e1dc457651f2!2sSree%20Narayana%20Guru%20Engineering%20College!5e0!3m2!1sen!2sin!4v1658702562252!5m2!1sen!2sin"
            width="100%"
            height="500px"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer>
      <div class="inner-width">
        <div class="copyright">
          &copy; 2022 | Created & Designed By <a href="#home">HmS</a>
        </div>
      </div>
    </footer>
   
    <script>
      
      document.querySelectorAll(".works .work img").forEach((image) => {
        image.onclick = () => {
          console.log("selected");
          document.querySelector(".popup_image").style.display = "block";
          document.querySelector(".popup_image img").src =
            image.getAttribute("src");
        };
      });

      document.querySelectorAll(".info form button").forEach((button) => {
        button.onclick = () => {
          
          document.getElementById("imgchangecon").style.display = "block";
          let imgid= button.getAttribute("name");
          console.log(imgid);
          document.getElementById("imgidinpop").value=imgid;
         
        };
      });

 
      document.querySelector(".popup_image span").onclick = () => {
        document.querySelector(".popup_image").style.display = "none";
      };
      document.querySelector(".popup_changeimg span").onclick = () => {
        document.querySelector(".popup_changeimg").style.display = "none";
      };

      const editImage = document.getElementById("editImage");
      const file2 = document.getElementById("file-upload");
      function getImgData() {
        const files = file2.files[0];
        if (files) {
          const fileReader = new FileReader();
          fileReader.readAsDataURL(files);
          fileReader.addEventListener("load", function () {
            editImage.setAttribute("src", this.result);
          });
        }
      }
      function getFile() {
        getImgData();
      }
    </script>
    <script>
      function myFunction(temp) {
        var cotcon = document.getElementById("cato");
        var dropbtn = document.getElementById("drop_btn");
        if (temp == 1) {
          cotcon.classList.add("text");
          dropbtn.classList.add("texclass");
        } else {
          cotcon.classList.remove("text");
          dropbtn.classList.remove("texclass");
        }
      }

    </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>
        
   
  </body>
</html>
