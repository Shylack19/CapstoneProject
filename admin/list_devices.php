<?php
// Include the database connection file
include 'includes/db_connect.php';

// Fetch devices data from the database
$sql = "SELECT device_name, room, station_no, rfid_no FROM devices";
$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Devices</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list_devices.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="sidebar">
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="content">
        <h1>Devices</h1>
        <button class="btn btn-success" onclick="window.location.href='add_device.php'">+ Add new</button>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Search" id="search">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="orderBy">
                            <option value="device_name">Device Name</option>
                            <option value="room">Room</option>
                            <option value="station_no">Station No.</option>
                            <option value="rfid_no">RFID No.</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="orderType">
                            <option value="asc">Asc</option>
                            <option value="desc">Desc</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" id="filterBtn">Go</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Device Name</th>
                            <th>Room</th>
                            <th>Station No.</th>
                            <th>RFID No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['device_name'] . "</td>";
                                echo "<td>" . $row['room'] . "</td>";
                                echo "<td>" . $row['station_no'] . "</td>";
                                echo "<td>" . $row['rfid_no'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-info'><i class='glyphicon glyphicon-edit'></i></button>";
                                echo "<button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No devices found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary">Export to CSV</button>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
