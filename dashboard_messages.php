<?php
session_start();
include 'db_connection.php';
include "./dashboard_navigationBar.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'delete') {
            // Store the deleted message in message_deleted table before deleting it from messages_received
        $storeDeletedQuery = "INSERT INTO `restaurant_website`.`message_deleted` (id, first_name, last_name, email, mobile_number, messages) SELECT id, first_name, last_name, email, mobile_number, messages FROM `restaurant_website`.`messages_received` WHERE id='$id'";
        mysqli_query($con, $storeDeletedQuery);

        // Delete the message from messages_received table
        $deleteQuery = "DELETE FROM `restaurant_website`.`messages_received` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
        
    } elseif ($action == 'update_status') {
        $status = $_POST['status'];
        $updateStatusQuery = "UPDATE `restaurant_website`.`messages_received` SET status='$status' WHERE id='$id'";
        mysqli_query($con, $updateStatusQuery);
        echo json_encode(['status' => 'success']);
        exit;
    }
}

$messagesQuery = "SELECT * FROM `restaurant_website`.`messages_received`";
$messagesResult = mysqli_query($con, $messagesQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>
    <script>
        function changeStatus(id, status) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'dashboard_messages.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var row = document.getElementById('row' + id);
                    if (status === 'replied') {
                        row.classList.add('replied');
                        row.classList.remove('not-replied');
                    } else if (status === 'not-replied') {
                        row.classList.add('not-replied');
                        row.classList.remove('replied');
                    }
                }
            };
            xhr.send('action=update_status&id=' + id + '&status=' + status);
        }

        function deleteMessage(id) {
            if (confirm('Are you sure you want to delete this message?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
</head>

<body>

    <div class="main">
        <h2>Messages Received</h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Messages</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($messagesResult)): ?>
            <tr id="row<?php echo $row['id']; ?>" class="<?php echo $row['status']; ?>">
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
                    <form id="deleteForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="button" class="deletebtn" onclick="deleteMessage(<?php echo $row['id']; ?>)"><i
                                class="fa-regular fa-trash-can"></i> Delete</button>
                    </form>
                    <button type="button" class="restorebtn"
                        onclick="changeStatus(<?php echo $row['id']; ?>, 'replied')"><i
                            class="fa-regular fa-circle-check"></i> Replied</button>
                    <button type="button" class="notreplybtn"
                        onclick="changeStatus(<?php echo $row['id']; ?>, 'not-replied')"> <i
                            class="fa-regular fa-circle-xmark"></i> Not Replied</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>