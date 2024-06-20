<?php
session_start();
include 'db_connection.php';
include "./dashboard_navigationBar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'delete') {
            // Store the deleted message in payment_deleted table before deleting it from payment_received
        $storeDeletedQuery = "INSERT INTO `restaurant_website`.`payment_deleted` (id, name, mobile_number, amnt, card_holder_name) SELECT id, name, mobile_number, amnt, card_holder_name FROM `restaurant_website`.`payment_received` WHERE id='$id'";
        mysqli_query($con, $storeDeletedQuery);

        // Delete the message from payment_received table
        $deleteQuery = "DELETE FROM `restaurant_website`.`payment_received` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
        
    } elseif ($action == 'update_status') {
        $status = $_POST['status'];
        $updateStatusQuery = "UPDATE `restaurant_website`.`payment_received` SET status='$status' WHERE id='$id'";
        mysqli_query($con, $updateStatusQuery);
        echo json_encode(['status' => 'success']);
        exit;
    }
}
$paymentsQuery = "SELECT * FROM `payment_received`";
$paymentsResult = mysqli_query($con, $paymentsQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments Received</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>
    <script>
        function changeStatus(id, status) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'dashboard_payments.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var row = document.getElementById('row' + id);
                    if (status === 'successful') {
                        row.classList.add('successful');
                        row.classList.remove('unsuccessful');
                    } else if (status === 'unsuccessful') {
                        row.classList.add('unsuccessful');
                        row.classList.remove('successful');
                    }
                }
            };
            xhr.send('action=update_status&id=' + id + '&status=' + status);
        }

        function deletePayment(id) {
            if (confirm('Are you sure you want to delete this payment?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
</head>

<body>


    <div class="main">
        <h2>Payments Received</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Card Holder Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($paymentsResult)): ?>
                <tr id="row<?php echo $row['id']; ?>" class="<?php echo $row['status']; ?>">
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
                        <form id="deleteForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="button" class="deletebtn"
                                onclick="deletePayment(<?php echo $row['id']; ?>)"><i
                                    class="fa-regular fa-trash-can"></i> Delete</button>
                        </form>
                        <button type="button" class="restorebtn"
                            onclick="changeStatus(<?php echo $row['id']; ?>, 'successful')"><i
                                class="fa-regular fa-circle-check"></i> Successful</button>
                        <button type="button" class="notreplybtn"
                            onclick="changeStatus(<?php echo $row['id']; ?>, 'unsuccessful')"> <i
                                class="fa-regular fa-circle-xmark"></i> Unsuccessful</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>