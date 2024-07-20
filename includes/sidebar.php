<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="profile-cnt">
        <div class="profile">
            <img src="./images/logo.png" alt="Admin">
        </div>
        <p>Admin</p>
    </div>
    <a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Dashboard</a>
    <a href="#" class="dropdown-btn <?= in_array($current_page, ['list_accounts.php', 'add_account.php']) ? 'active' : '' ?>">Account</a>
    <div class="dropdown-container" style="<?= in_array($current_page, ['list_accounts.php', 'add_account.php']) ? 'display:block;' : '' ?>">
        <a href="list_accounts.php" class="<?= $current_page == 'list_accounts.php' ? 'active' : '' ?>">List Accounts</a>
        <a href="add_account.php" class="<?= $current_page == 'add_account.php' ? 'active' : '' ?>">Add Account</a>
    </div>
    <a href="#" class="dropdown-btn <?= in_array($current_page, ['list_devices.php', 'add_device.php']) ? 'active' : '' ?>">Device</a>
    <div class="dropdown-container" style="<?= in_array($current_page, ['list_devices.php', 'add_device.php']) ? 'display:block;' : '' ?>">
        <a href="list_devices.php" class="<?= $current_page == 'list_devices.php' ? 'active' : '' ?>">List Devices</a>
        <a href="add_device.php" class="<?= $current_page == 'add_device.php' ? 'active' : '' ?>">Add Device</a>
    </div>
    <a href="reports.php" class="<?= $current_page == 'reports.php' ? 'active' : '' ?>">Reports</a>
</div>
