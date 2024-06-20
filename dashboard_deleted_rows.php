<?php
session_start();
include 'db_connection.php';
include "./dashboard_navigationBar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'message_restore') {
        // Restore the deleted message from message_deleted table to messages_received table
        $restoreQuery = "INSERT INTO `restaurant_website`.`messages_received` (id, first_name, last_name, email, mobile_number, messages)
                         SELECT id, first_name, last_name, email, mobile_number, messages
                         FROM `restaurant_website`.`message_deleted` WHERE id='$id'";
        mysqli_query($con, $restoreQuery);

        // Delete the message from message_deleted table
        $deleteQuery = "DELETE FROM `restaurant_website`.`message_deleted` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
    }
    elseif ($action == 'table_restore') {
        // Restore the deleted message from table_deleted table to tables_reserved table
        $restoreQuery = "INSERT INTO `restaurant_website`.`tables_reserved` (id, date, fname, phone, people)
                         SELECT id, date, fname, phone, people
                         FROM `restaurant_website`.`table_deleted` WHERE id='$id'";
        mysqli_query($con, $restoreQuery);

        // Delete the message from table_deleted table
        $deleteQuery = "DELETE FROM `restaurant_website`.`table_deleted` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
    }
    elseif ($action == 'payment_restore') {
        // Restore the deleted payment from payment_deleted table to payment_received table
        $restoreQuery = "INSERT INTO `restaurant_website`.`payment_received` (id, name, mobile_number, amnt, card_holder_name)
                         SELECT id,  name, mobile_number, amnt, card_holder_name
                         FROM `restaurant_website`.`payment_deleted` WHERE id='$id'";
        mysqli_query($con, $restoreQuery);

        // Delete the message from payment_deleted table
        $deleteQuery = "DELETE FROM `restaurant_website`.`payment_deleted` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
    }
}

$deletedRowsQuery = "SELECT * FROM `restaurant_website`.`message_deleted`";
$deletedRowsResult = mysqli_query($con, $deletedRowsQuery);

$deletedRowsQuery1 = "SELECT * FROM `restaurant_website`.`table_deleted`";
$deletedRowsResult1 = mysqli_query($con, $deletedRowsQuery1);

$deletedRowsQuery2 = "SELECT * FROM `restaurant_website`.`payment_deleted`";
$deletedRowsResult2 = mysqli_query($con, $deletedRowsQuery2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Deleted Rows</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>

    <script>
        function restoreMessage(id) {
            if (confirm('Are you sure you want to restore this message?')) {
                document.getElementById('restoreForm' + id).submit();
            }
        }
        function restoreTable(id) {
            if (confirm('Are you sure you want to restore this table?')) {
                document.getElementById('restoreForm' + id).submit();
            }
        }
        function restorePayment(id) {
            if (confirm('Are you sure you want to restore this payment?')) {
                document.getElementById('restoreForm' + id).submit();
            }
        }
    </script>
</head>

<body>
    <div class="main">
        <h2>Deleted Messages</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Messages</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($deletedRowsResult)): ?>
            <tr>
                <td>
                    <?php echo $row['first_name']; ?>
                </td>
                <td>
                    <?php echo $row['last_name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['mobile_number']; ?>
                </td>
                <td>
                    <?php echo $row['messages']; ?>
                </td>
                <td>
                    <form id="restoreForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="message_restore">
                        <button type="button" class="restorebtn" onclick="restoreMessage(<?php echo $row['id']; ?>)"><i
                                class="fa-solid fa-retweet"></i> Restore</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br />
        <h2>Deleted Tables</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>People</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($deletedRowsResult1)): ?>
            <tr>
                <td>
                    <?php echo $row['date']; ?>
                </td>
                <td>
                    <?php echo $row['fname']; ?>
                </td>
                <td>
                    <?php echo $row['phone']; ?>
                </td>
                <td>
                    <?php echo $row['people']; ?>
                </td>
                <td>
                    <form id="restoreForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="table_restore">
                        <button type="button" class="restorebtn" onclick="restoreTable(<?php echo $row['id']; ?>)"><i
                                class="fa-solid fa-retweet"></i> Restore</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <br />
        <h2>Deleted Payments</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Card Holder Name</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($deletedRowsResult2)): ?>
            <tr>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['mobile_number']; ?>
                </td>
                <td>
                    <?php echo $row['card_holder_name']; ?>
                </td>
                <td>
                    <?php echo $row['amnt']; ?>
                </td>
                <td>
                    <form id="restoreForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="payment_restore">
                        <button type="button" class="restorebtn" onclick="restorePayment(<?php echo $row['id']; ?>)"><i
                                class="fa-solid fa-retweet"></i> Restore</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>