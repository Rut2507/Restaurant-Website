<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YUMMY TUMMY RESTAURANT</title>
  <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
  <div class="container">
    <div class="navbar">
      <div class="menu">
        <h3 class="logo">Yummy<span>Tummy</span></h3>
        <div class="hamburger-menu">
          <div class="bar"></div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="main">
        <header style="background: url('image/0homeback.jpg') no-repeat top center / cover;">
          <div class="overlay">
            <div class="inner">
              <h2 class="title">Yummy Food is Here, Where are you</h2>
              <p>When you’re here, you’re family.</p>
              <button class="btn"><a href="res_menu.php" target="_top">OUR MENU</a></button>
            </div>
          </div>
        </header>
      </div>

      <div class="shadow one"></div>
      <div class="shadow two"></div>
    </div>

    <div class="links">
      <ul>
        <li><a href="Home.php" target="_top" style="--i: 0.05s;">Home</a></li>
        <li><a href="res_menu.php" target="_top" style="--i: 0.1s;">Menu</a></li>
        <li><a href="book_table.php" target="_blank" style="--i: 0.15s;">Table Booking</a></li>
        <li><a href="Payment_and_feedback.php" target="_top" style="--i: 0.2s;">Payment & Review</a></li>
        <li><a href="about.php" target="_top" style="--i: 0.25s;">About</a></li>
        <li><a href="contact.php" target="_top" style="--i: 0.3s;">Contact Us</a></li>
        <li><a href="dashboard_admin_login.php" target="_blank" style="--i: 0.35s;">Admin Login</a></li>
      </ul>
    </div>
  </div>

  <script>
    const hamburger_menu = document.querySelector(".hamburger-menu");
    const container = document.querySelector(".container");
    hamburger_menu.addEventListener("click", () => {
      container.classList.toggle("active");
    });
  </script>
</body>

</html>