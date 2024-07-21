<?php
// Include the database connection file
include 'includes/db_connect.php';

// Fetch accounts from the database
$sql = "SELECT * FROM accounts";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Accounts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list_accounts.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="sidebar">
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="content">
        <h1>Accounts</h1>
        <button class="btn btn-success" onclick="window.location.href='add_account.php'">+ Add new</button>
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Search" id="search">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="orderBy">
                            <option value="Name">Name</option>
                            <option value="Section">Section</option>
                            <option value="Email">Email</option>
                            <option value="Password">Password</option>
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
                            <th>Name</th>
                            <th>Section</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['section']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>********</td>";
                                echo "<td>";
                                echo "<button class='btn btn-info'><i class='glyphicon glyphicon-edit'></i></button>";
                                echo "<button class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No accounts found.</td></tr>";
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
// Close connection
mysqli_close($conn);
?>
