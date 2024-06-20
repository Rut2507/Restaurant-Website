<?php
session_start();

include 'db_connection.php';
include "./dashboard_navigationBar.php";

// Fetch the count for each table
$feedbackCountResult = mysqli_query($con, "SELECT COUNT(*) as count FROM `feedback_received`");
$feedbackCount = mysqli_fetch_assoc($feedbackCountResult)['count'];

$messagesCountResult = mysqli_query($con, "SELECT COUNT(*) as count FROM `messages_received`");
$messagesCount = mysqli_fetch_assoc($messagesCountResult)['count'];

$tablesCountResult = mysqli_query($con, "SELECT COUNT(*) as count FROM `tables_reserved`");
$tablesCount = mysqli_fetch_assoc($tablesCountResult)['count'];

$paymentsCountResult = mysqli_query($con, "SELECT COUNT(*) as count FROM `payment_received`");
$paymentsCount = mysqli_fetch_assoc($paymentsCountResult)['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .box {
            background-color: #2ec0ff;
            flex-basis: 20%;
            color: white;
            margin: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .box:hover {
            background-color: #2ec0ff52;
            color: #0d293d;
        }

        .box h3 {
            margin: 0;
            font-size: 3.4em;
        }

        .box p {
            margin: 5px 0 0;
        }

        .btn {
            position: relative;
            padding: 5px 260px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            transition: all 1s;

            &:after,
            &:before {
                content: " ";
                width: 20px;
                height: 10px;
                position: absolute;
                border: 0px solid #fff;
                transition: all 1s;
            }

            &:after {
                top: 3px;
                left: -1px;
                border-top: 5px solid black;
                border-left: 5px solid black;
            }

            &:before {
                bottom: 1px;
                right: -1px;
                border-bottom: 5px solid black;
                border-right: 5px solid black;
            }

            &:hover {
                border-top-right-radius: 0px;
                border-bottom-left-radius: 0px;

                &:before,
                &:after {
                    width: 100%;
                    height: 95%;
                }
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Dashboard</h2>
        <div class="container">
            <div class="box">
                <span class="btn">
                    <h3>
                        <?php echo $feedbackCount; ?>
                    </h3>
                    <p>Feedback Received</p>
                    <span>
            </div>
            <div class="box">
                <span class="btn">
                    <h3>
                        <?php echo $messagesCount; ?>
                    </h3>
                    <p>Messages Received</p>
                </span>
            </div>
            <div class="box">
                <span class="btn">
                    <h3>
                        <?php echo $tablesCount; ?>
                    </h3>
                    <p>Tables Reserved</p>
                </span>
            </div>
            <div class="box">
                <span class="btn">
                    <h3>
                        <?php echo $paymentsCount; ?>
                    </h3>
                    <p>Payments Received</p>
                </span>
            </div>

        </div>
    </div>

</body>

</html>