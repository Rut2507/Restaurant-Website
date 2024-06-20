<?php
session_start();
include 'db_connection.php';
include "./dashboard_navigationBar.php";

$feedbackQuery = "SELECT * FROM `restaurant_website`.`feedback_received`";
$feedbackResult = mysqli_query($con, $feedbackQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>
    <title>Feedback</title>
</head>

<body>

    <div class="main">
        <h2>Feedback Received</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Feedback</th>
                <th>Food Quality</th>
                <th>Staff Behavior</th>
                <th>Cleanliness</th>
                <th>Ambience</th>
                <th>Service</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($feedbackResult)): ?>
            <tr>
                <td>
                    <?php echo $row['fullname']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['type']; ?>
                </td>
                <td>
                    <?php echo $row['feedback']; ?>
                </td>
                <td>
                    <?php echo $row['food_quality']; ?>
                </td>
                <td>
                    <?php echo $row['Staff_behavior']; ?>
                </td>
                <td>
                    <?php echo $row['cleanliness']; ?>
                </td>
                <td>
                    <?php echo $row['ambience']; ?>
                </td>
                <td>
                    <?php echo $row['Service']; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>