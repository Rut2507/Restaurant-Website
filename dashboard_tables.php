<?php
session_start();
include 'db_connection.php';
include "./dashboard_navigationBar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];

    if ($action == 'delete') {
            // Store the deleted message in table_deleted table before deleting it from tables_reserved
        $storeDeletedQuery = "INSERT INTO `restaurant_website`.`table_deleted` (id, date, fname, phone, people) SELECT id, date, fname, phone, people FROM `restaurant_website`.`tables_reserved` WHERE id='$id'";
        mysqli_query($con, $storeDeletedQuery);

        // Delete the message from tables_reserved table
        $deleteQuery = "DELETE FROM `restaurant_website`.`tables_reserved` WHERE id='$id'";
        mysqli_query($con, $deleteQuery);
        
    } elseif ($action == 'update_status') {
        $status = $_POST['status'];
        $updateStatusQuery = "UPDATE `restaurant_website`.`tables_reserved` SET status='$status' WHERE id='$id'";
        mysqli_query($con, $updateStatusQuery);
        echo json_encode(['status' => 'success']);
        exit;
    }
}
$tablesQuery = "SELECT * FROM `restaurant_website`.`tables_reserved`";
$tablesResult = mysqli_query($con, $tablesQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tables Reserved</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS\admin_dashboard.css">
    <script src="https://kit.fontawesome.com/3d2fe1d22b.js" crossorigin="anonymous"></script>
    <script>
        function changeStatus(id, status) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'dashboard_tables.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var row = document.getElementById('row' + id);
                    if (status === 'reserved') {
                        row.classList.add('reserved');
                        row.classList.remove('unreserved');
                    } else if (status === 'unreserved') {
                        row.classList.add('unreserved');
                        row.classList.remove('reserved');
                    }
                }
            };
            xhr.send('action=update_status&id=' + id + '&status=' + status);
        }

        function deleteTable(id) {
            if (confirm('Are you sure you want to delete this table?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
</head>

<body>

    <div class="main">
        <h2>Tables Reserved</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>People</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($tablesResult)): ?>
            <tr id="row<?php echo $row['id']; ?>" class="<?php echo $row['status']; ?>">
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
                    <form id="deleteForm<?php echo $row['id']; ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="button" class="deletebtn" onclick="deleteTable(<?php echo $row['id']; ?>)"><i
                                class="fa-regular fa-trash-can"></i> Delete</button>
                    </form>
                    <button type="button" class="restorebtn"
                        onclick="changeStatus(<?php echo $row['id']; ?>, 'reserved')"><i
                            class="fa-regular fa-circle-check"></i> Reserved</button>
                    <button type="button" class="notreplybtn"
                        onclick="changeStatus(<?php echo $row['id']; ?>, 'unreserved')"> <i
                            class="fa-regular fa-circle-xmark"></i> Unreserved</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>