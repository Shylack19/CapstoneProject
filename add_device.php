<?php
// Include the database connection file
include 'includes/db_connect.php';

// Define variables and initialize with empty values
$device_name = $room = $station_no = $rfid_no = "";
$device_name_err = $room_err = $station_no_err = $rfid_no_err = "";
$success_message = "";
$error_message = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate device name
    if (empty(trim($_POST["device_name"]))) {
        $device_name_err = "Please enter a device name.";
    } else {
        $device_name = trim($_POST["device_name"]);
    }

    // Validate room
    if (empty(trim($_POST["room"]))) {
        $room_err = "Please enter a room.";
    } else {
        $room = trim($_POST["room"]);
    }

    // Validate station number
    if (empty(trim($_POST["station_no"]))) {
        $station_no_err = "Please enter a station number.";
    } else {
        $station_no = trim($_POST["station_no"]);
    }

    // Validate RFID number
    if (empty(trim($_POST["rfid_no"]))) {
        $rfid_no_err = "Please enter an RFID number.";
    } else {
        $rfid_no = trim($_POST["rfid_no"]);
    }

    // Check for duplicate RFID number
    if (empty($device_name_err) && empty($room_err) && empty($station_no_err) && empty($rfid_no_err)) {
        $sql = "SELECT id FROM devices WHERE rfid_no = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_rfid_no);
            
            $param_rfid_no = $rfid_no;
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $error_message = "The RFID number is already in use.";
                } else {
                    // Prepare an insert statement
                    $sql = "INSERT INTO devices (device_name, room, station_no, rfid_no) VALUES (?, ?, ?, ?)";
                    
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ssss", $param_device_name, $param_room, $param_station_no, $param_rfid_no);
                        
                        $param_device_name = $device_name;
                        $param_room = $room;
                        $param_station_no = $station_no;
                        $param_rfid_no = $rfid_no;
                        
                        if (mysqli_stmt_execute($stmt)) {
                            $success_message = "Device has been added successfully.";
                        } else {
                            $error_message = "Something went wrong. Please try again later.";
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Device</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_device.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="sidebar">
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="content">
        <h1>Add Device</h1>
        <?php
        if (!empty($success_message)) {
            echo '<script>alert("'.$success_message.'"); window.location.href="add_device.php";</script>';
        } elseif (!empty($error_message)) {
            echo '<script>alert("'.$error_message.'"); window.location.href="add_device.php";</script>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="device_name">Device Name:</label>
            <input type="text" id="device_name" name="device_name" placeholder="Device Name" value="<?php echo $device_name; ?>" required>
            <span class="error"><?php echo $device_name_err; ?></span>

            <label for="room">Room:</label>
            <input type="text" id="room" name="room" placeholder="Room" value="<?php echo $room; ?>" required>
            <span class="error"><?php echo $room_err; ?></span>

            <label for="station_no">Station No.:</label>
            <input type="text" id="station_no" name="station_no" placeholder="Station No." value="<?php echo $station_no; ?>" required>
            <span class="error"><?php echo $station_no_err; ?></span>

            <label for="rfid_no">RFID No.:</label>
            <input type="text" id="rfid_no" name="rfid_no" placeholder="RFID No." value="<?php echo $rfid_no; ?>" required>
            <span class="error"><?php echo $rfid_no_err; ?></span>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
