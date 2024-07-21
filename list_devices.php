<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Devices</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list_devices.css">
    <script src="js/script.js" defer></script>
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
                            <option value="Device Name">Device Name</option>
                            <option value="RFID No.">RFID No.</option>
                            <option value="Room">Room</option>
                            <option value="Station No.">Station No.</option>
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
                            <th>RFID No.</th>
                            <th>Room</th>
                            <th>Station No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example data, replace with actual data fetching logic -->
                        <tr>
                            <td>Device 1</td>
                            <td>123456</td>
                            <td>Room A</td>
                            <td>001</td>
                            <td>
                                <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Device 2</td>
                            <td>654321</td>
                            <td>Room B</td>
                            <td>002</td>
                            <td>
                                <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary">Export to CSV</button>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
