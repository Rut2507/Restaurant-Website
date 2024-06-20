<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback and Payment</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="CSS\feed.css">
  <link rel="stylesheet" href="CSS\pay.css">
  <link rel="stylesheet" href="CSS\navigation-bar.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #0d293d;
    }

    .selection_option {
      float: left;
      width: 50%;
      cursor: pointer;
    }

    .selection_option h1 {
      color: #e7ddddec;
      font-size: 30px;
      position: center;
      text-align: center;
      margin-top: 15px;
    }

    .selection_option h1:hover {
      color: #ffffffec;
    }

    #feedback {
      background-color: #0d293d;
    }

    #payment {
      background-color: #0295d9;
    }
  </style>
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
  <!--MENU SECTION-->
  <div class="menubtn">
    <div class="selection_option" id="defaultOpen" onclick="openTab('feedback');"
      style="background: #112d42; border-bottom: 45px solid #0d293d; border-left: 65px solid #123149;">
      <h1>Feedback</h1>
    </div>
    <div class="selection_option" onclick="openTab('payment');"
      style="background: #03a9f4; border-bottom: 45px solid #0295d9; border-left: 65px solid #02a3ed;">
      <h1>Payment</h1>
    </div>
  </div>

  <!--FEEDBACK SECTION-->
  <div id="feedback" class="containerTab" style="display:none;">
    <span onclick="this.parentElement.style.display='none'" class="closebtn"> &times; </span>
    <div class="row1">

      <!--REVIEW SECTION-->
      <div class="col-50">
        <div class="container">
          <form action="feedback.php" method="POST"> <!--php file connection-->

            <div class="input-container">
              <i class="fa fa-user icon fa-lg"></i>
              <input class="input-field" type="text" placeholder="Username" name="fullname" required>
            </div>
            <div class="input-container">
              <i class="fa fa-envelope icon fa-lg"></i>
              <input class="input-field" type="text" placeholder="Email" name="email">
            </div>
            </br>&emsp;<i class="fa fa-comment fa-lg"></i> &ensp;
            <label style="font-family: cursive; font-size: 19px;">Feedback Type </label>
            <pre>
            <label style="font-family: cursive; font-size: 18px; color: rgb(200, 199, 199);">
              <input type="radio" name="type" value="Comments" id="radioColor"> Comments          <input type="radio" name="type" value="Suggestions" id="radioColor">  Suggestions        <input type="radio" name="type" value="Questions" id="radioColor">  Questions 
            </label>
            </pre>
            <div class="input-container">
              <textarea class="feedback-field" type="text" placeholder="Write your feedback here.." name="feedback"
                required></textarea>
            </div> </br></br>
        </div>
      </div>

      <!--RATING SECTION-->
      <div class="col-25">
        <div class="rate" action="ratings.php" method="POST">
          <h2> Rate Us <i class="fa fa-heart"></i></h2>
          <div class="skills">
            <h3 class="name">Food Quality</h3>
            <div class="rating">
              <input type="radio" name="food_quality" value="5">
              <input type="radio" name="food_quality" value="4.5">
              <input type="radio" name="food_quality" value="4">
              <input type="radio" name="food_quality" value="3.5">
              <input type="radio" name="food_quality" value="3">
              <input type="radio" name="food_quality" value="2.5">
              <input type="radio" name="food_quality" value="2">
              <input type="radio" name="food_quality" value="1.5">
              <input type="radio" name="food_quality" value="1">
              <input type="radio" name="food_quality" value="0.5">
            </div>
          </div>
          <div class="skills">
            <h3 class="name">Staff Behavior</h3>
            <div class="rating">
              <input type="radio" name="Staff_behavior" value="5">
              <input type="radio" name="Staff_behavior" value="4.5">
              <input type="radio" name="Staff_behavior" value="4">
              <input type="radio" name="Staff_behavior" value="3.5">
              <input type="radio" name="Staff_behavior" value="3">
              <input type="radio" name="Staff_behavior" value="2.5">
              <input type="radio" name="Staff_behavior" value="2">
              <input type="radio" name="Staff_behavior" value="1.5">
              <input type="radio" name="Staff_behavior" value="1">
              <input type="radio" name="Staff_behavior" value="0.5">
            </div>
          </div>
          <div class="skills">
            <h3 class="name">Cleanliness</h3>
            <div class="rating">
              <input type="radio" name="cleanliness" value="5">
              <input type="radio" name="cleanliness" value="4.5">
              <input type="radio" name="cleanliness" value="4">
              <input type="radio" name="cleanliness" value="3.5">
              <input type="radio" name="cleanliness" value="3">
              <input type="radio" name="cleanliness" value="2.5">
              <input type="radio" name="cleanliness" value="2">
              <input type="radio" name="cleanliness" value="1.5">
              <input type="radio" name="cleanliness" value="1">
              <input type="radio" name="cleanliness" value="0.5">
            </div>
          </div>
          <div class="skills">
            <h3 class="name">Ambience</h3>
            <div class="rating">
              <input type="radio" name="ambience" value="5">
              <input type="radio" name="ambience" value="4.5">
              <input type="radio" name="ambience" value="4">
              <input type="radio" name="ambience" value="3.5">
              <input type="radio" name="ambience" value="3">
              <input type="radio" name="ambience" value="2.5">
              <input type="radio" name="ambience" value="2">
              <input type="radio" name="ambience" value="1.5">
              <input type="radio" name="ambience" value="1">
              <input type="radio" name="ambience" value="0.5">
            </div>
          </div>
          <div class="skills">
            <h3 class="name">Service</h3>
            <div class="rating">
              <input type="radio" name="Service" value="5">
              <input type="radio" name="Service" value="4.5">
              <input type="radio" name="Service" value="4">
              <input type="radio" name="Service" value="3.5">
              <input type="radio" name="Service" value="3">
              <input type="radio" name="Service" value="2.5">
              <input type="radio" name="Service" value="2">
              <input type="radio" name="Service" value="1.5">
              <input type="radio" name="Service" value="1">
              <input type="radio" name="Service" value="0.5">
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="btn" name="btn">Click to SUBMIT</button>
    </form>
  </div>

  <!--PAYMENT SECTION-->
  <div id="payment" class="containerTab" style="display:none;">
    <span onclick="this.parentElement.style.display='none'" class="closebtn"> &times; </span>
    <form action="payment.php" method="POST"> <!--php file connection-->
      <div class="row">
        <div class="col1">
          <h2 style="color: #d4cccc;">Basic Information</h2> <br>
          <div class="input-group1">
            <input type="text" id="fname" name="name" required>
            <label for="fname"> <i class="fa fa-user fa-lg"></i> Fullname</label>
          </div>
          <div class="input-group1">
            <input type="tel" id="mob" minlength="10" maxlength="10" title="Enter 10 digit mob number"
              pattern="[1-9]{1}[0-9]{9}" name="mobile_number" required>
            <label for="mob"> <i class="fa fa-mobile fa-lg"></i> Mobile No</label>
          </div>
          <div class="input-group1">
            <input type="number" min="1" id="amount" name="amnt" required>
            <label for="amount"> <i class="fa fa-inr fa-lg"></i> Amount </label>
          </div>
        </div>
        <div class="col2">
          <h2 style="color: #0295d9;">Payment Information</h2> <br>
          <div class="icon-container">
            <i class="fa fa-cc-visa fa-lg"></i>
            <i class="fa fa-paypal fa-lg"></i>
            <i class="fa fa-cc-mastercard  fa-lg"></i>
            <i class="fa fa-cc-discover fa-lg"></i>
          </div>
          <div class="input-group2">
            <input type="text" name="card_number" size="18" id="cr_no" minlength="19" maxlength="19" required />
            <label for="cr_no"> <i class="fa fa-credit-card fa-lg"></i> Card Number</label>
          </div>
          <div class="input-group2">
            <input type="text" id="cname" name="card_holder_name" required />
            <label for="cname"> <i class="fa fa-user-circle-o fa-lg"></i> Card Holder Name</label>
          </div>
          <div class="input-group2">
            <input type="text" name="exp" size="6" id="exp" minlength="5" maxlength="5" required />
            <label for="exp"> <i class="fa fa-calendar fa-lg"></i> Expiry MM/YY</label>
          </div>
          <div class="input-group2">
            <input type="password" name="cvv" size="1" minlength="3" maxlength="3" pattern="[0-9]{3}"
              title="3 digit mentioned on the back of card" required />
            <label for=""> <i class="fa fa-credit-card-alt fa-lg"></i> CVV </label>
          </div>
        </div>
      </div>
      <button class="submit" name="submit">Click to SUBMIT</button>
    </form>
  </div>

  <script>
    function openTab(tabName) {
      var i, x;
      x = document.getElementsByClassName("containerTab");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(tabName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }
    document.getElementById("defaultOpen").click();

    //For Card Number formatted input
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function (e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];

      for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
        parts.push(sanitizedValue.substring(i, i + 4));
      }

      for (var i = caretPosition - 1; i >= 0; i--) {
        var c = this.value[i];
        if (c < '0' || c > '9') {
          caretPosition--;
        }
      }
      caretPosition += Math.floor(caretPosition / 4);

      this.value = this.lastValue = parts.join(' ');
      this.selectionStart = this.selectionEnd = caretPosition;
    };

    //For Date formatted input
    var expDate = document.getElementById('exp');
    expDate.onkeyup = function (e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];

      for (var i = 0, len = sanitizedValue.length; i < len; i += 2) {
        parts.push(sanitizedValue.substring(i, i + 2));
      }

      for (var i = caretPosition - 1; i >= 0; i--) {
        var c = this.value[i];
        if (c < '0' || c > '9') {
          caretPosition--;
        }
      }
      caretPosition += Math.floor(caretPosition / 2);

      this.value = this.lastValue = parts.join('/');
      this.selectionStart = this.selectionEnd = caretPosition;
    };
  </script>

</body>

</html>
<?php
session_start();
include 'db_connection.php';
  if(isset($_POST['btn']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $feedback=$_POST['feedback'];
    $food_quality=$_POST['food_quality'];
    $Staff_behavior=$_POST['Staff_behavior'];
    $cleanliness=$_POST['cleanliness'];
    $ambience=$_POST['ambience'];
    $Service=$_POST['Service'];
    
    $sql="INSERT INTO `restaurant_website`.`feedback_received` (`fullname`,`email`, `type`,`feedback`,`food_quality`,`Staff_behavior`,`cleanliness`, `ambience`, `Service`) VALUES ('$fullname', '$email', '$type','$feedback','$food_quality','$Staff_behavior','$cleanliness','$ambience','$Service')";

    if($con->query($sql)){
      ?>
<script>
  swal({
    title: "Thank You for reviewing us!",
  });
</script>
<?php
    }
    else{
      ?>
<script>
  swal({
    text: "Some fields are missing",
  });
</script>
<?php
    }
  }
?>