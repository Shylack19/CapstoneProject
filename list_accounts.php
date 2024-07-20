<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Accounts</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/list_accounts.css">
    <script src="js/script.js" defer></script>
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
                        <!-- Example data, replace with actual data fetching logic -->
                        <tr>
                            <td>John Doe</td>
                            <td>Section A</td>
                            <td>john@example.com</td>
                            <td>********</td>
                            <td>
                                <button class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Section B</td>
                            <td>jane@example.com</td>
                            <td>********</td>
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
