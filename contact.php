<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS\contact.css">
  <link rel="stylesheet" href="CSS\navigation-bar.css">
  <script src="https://kit.fontawesome.com/87aaeea3b6.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Contact Us</title>
</head>

<body>
  <div class="menu-wrap">
    <input type="checkbox" class="toggler">
    <div class="hamburger">
      <div></div>
    </div>
    <div class="menu">
      <div>
        <div>
          <ul>
            <li>
              <a href="HOME.php" target="_top">Home</a>
            </li>
            <li>
              <a href="res_menu.php" target="_top">Menu</a>
            </li>
            <li>
              <a href="book_table.php" target="_blank">Table Booking</a>
            </li>
            <li>
              <a href="Payment_and_feedback.php" target="_top">Payment & Review</a>
            </li>
            <li>
              <a href="about.php" target="_top">About</a>
            </li>
            <li>
              <a href="contact.php" target="_top">Contact Us</a>
            </li>
            <li>
              <a href="dashboard_admin_login.php" target="_blank" style="--i: 0.35s;">Admin Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section>
    <div class="container">
      <div class="contactinfo">
        <div>
          <h2>Contact Info</h2>
          <ul class="info">
            <li>
              <span><img src="image/4location_final.png" alt=""></span>
              <span>78 Inner Market Road <br>
                Sector 8/B, Opposite Civil Dispensary <br>
                Chandigarh 160009</span>

            </li>
            <li>
              <span><img src="image/4mail_final.png" alt=""></span>
              <span>yummytummy02@email.com</span>
            </li>
            <li>
              <span><img src="image/4contact_final.png" alt=""></span>
              <span>+91-987654-3210</span>
            </li>
          </ul>
          <br>
          <br>
          <br>
          <br>
          <div class="align">
            <ul class="sci">
              <li><a href="https://www.facebook.com/" target="_blank"><img src="image/4face_final.png" alt=""></a></li>
              <li><a href="#"><img src="image/4twitter.png" alt=""></a></li>
              <li><a href="https://www.instagram.com/yum_in_tum2/" target="_blank"><img src="image/4instagram_final.png"
                    alt=""></a></li>
              <li><a href="#"><img src="image/4pinterest.png" alt=""></a></li>
              <li><a href="#"><img src="image/4linkedin_final.png" alt=""></a></li>

            </ul>
          </div>
        </div>
      </div>
      <div class="contactForm">
        <h2>Send a Message</h2>
        <form action="contact.php" method="POST">
          <div class="formBox">
            <div class="inputBox w50">
              <input type="text" name="first_name" required>
              <span>First Name</span>
            </div>
            <div class="inputBox w50">
              <input type="text" name="last_name" required>
              <span>Last Name</span>
            </div>
            <div class="inputBox w50">
              <input type="email" name="email" required>
              <span>Email Address</span>
            </div>
            <div class="inputBox w50">
              <input type="tel" title="Enter 10 digit mob number" minlength="10" maxlength="10"
                pattern="[1-9]{1}[0-9]{9}" name="mobile_number" required>
              <span>Mobile Number</span>
            </div>
            <div class="inputBox w100">
              <textarea name="messages" required></textarea>
              <span>Write your message here...</span>
            </div>
            <div class="inputBox w100">
              <input type="submit" name="submit" value="Send">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>

<?php
session_start();
include 'db_connection.php';
  if(isset($_POST['submit']))
  {  
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $mobile_number=$_POST['mobile_number'];
    $messages=$_POST['messages'];
    $sql="INSERT INTO `restaurant_website`.`messages_received` (`first_name`, `last_name`, `email`, `mobile_number`,`messages`) VALUES ('$first_name', '$last_name', '$email', '$mobile_number','$messages')";
    
    if($con->query($sql)==false){
      echo "ERROR: <br> $con->error";
    }
    else{
      ?>
<script>
  swal({
    title: "Message Sent Successfully!",
  });
</script>
<?php
    }
  }
?>