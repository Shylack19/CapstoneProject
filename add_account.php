<?php
// Include the database connection file
include 'includes/db_connect.php';

// Define variables and initialize with empty values
$name = $section = $email = $password = "";
$name_err = $section_err = $email_err = $password_err = "";
$success_message = "";
$error_message = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate section
    if (empty(trim($_POST["section"]))) {
        $section_err = "Please enter a section.";
    } else {
        $section = trim($_POST["section"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check for duplicate name and email
    if (empty($name_err) && empty($section_err) && empty($email_err) && empty($password_err)) {
        $sql = "SELECT id FROM accounts WHERE name = ? OR email = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_email);
            
            $param_name = $name;
            $param_email = $email;
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $error_message = "The name or email is already in use.";
                } else {
                    // Prepare an insert statement
                    $sql = "INSERT INTO accounts (name, section, email, password) VALUES (?, ?, ?, ?)";
                    
                    if ($stmt = mysqli_prepare($conn, $sql)) {
                        mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_section, $param_email, $param_password);
                        
                        $param_name = $name;
                        $param_section = $section;
                        $param_email = $email;
                        $param_password = password_hash($password, PASSWORD_DEFAULT);
                        
                        if (mysqli_stmt_execute($stmt)) {
                            $success_message = "Account has been added successfully.";
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
    <title>Add Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_account.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="sidebar">
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="content">
        <h1>Add Account</h1>
        <?php
        if (!empty($success_message)) {
            echo '<script>alert("'.$success_message.'"); window.location.href="add_account.php";</script>';
        } elseif (!empty($error_message)) {
            echo '<script>alert("'.$error_message.'"); window.location.href="add_account.php";</script>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
            <span class="error"><?php echo $name_err; ?></span>

            <label for="section">Section:</label>
            <input type="text" id="section" name="section" placeholder="Section" value="<?php echo $section; ?>" required>
            <span class="error"><?php echo $section_err; ?></span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $email_err; ?></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
            <span class="error"><?php echo $password_err; ?></span>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
