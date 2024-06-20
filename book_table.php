<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS\book_table.css">
  <link rel="stylesheet" href="CSS\navigation-bar.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Book Your Table Now</title>
</head>

<body
  style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('image/3tabBook-back.jpg') center/cover no-repeat;"">
  <div class=" menu-wrap">
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
  <div class="title">
    <p>Table Reservation</p>
  </div>
  <section class="backgr">
    <div class="table_booking">
      <div class="table_img" style="background: url('image/3table.jpg') no-repeat top center / cover;">
      </div>

      <div class="Reservation">
        <h3><b>Reserve Your Table</b></h3>
        <form action="book_table.php" method="POST">
          <div class="selection">
            <input type="date" name="date" required>
            Select Your Preferred Date
            </input>
          </div>

          <div class="selection">
            <input type="text" placeholder="Full Name" name="fname" required>
            <input type="tel" title="Enter 10 digit mob number" minlength="10" maxlength="10" pattern="[1-9]{1}[0-9]{9}"
              placeholder="Phone Number" name="phone" required>
          </div>

          <div class="selection">
            <input type="number" placeholder="Number of Persons" min="1" name="people" required>
            <input type="submit" value="BOOK MY TABLE" name="submit">
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
    $date=$_POST['date'];
    $fname=$_POST['fname'];
    $phone=$_POST['phone'];
    $people=$_POST['people'];
    $sql="INSERT INTO `restaurant_website`.`tables_reserved` (`date`, `fname`, `phone`, `people`) VALUES ('$date', '$fname', '$phone', '$people')";
    
    if($con->query($sql)==false){
      echo "ERROR: <br> $con->error";
    }
    else{
      ?>
<script>
  swal({
    title: "Thank You!",
    text: "Your reservation has been made!",
    icon: "success",
  });
</script>
<?php
    }
  }
?>