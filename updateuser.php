<?php
include("connection.php");

function updateUserCredentials($conn, $email, $password, $isDisabled, $role) {
    $updateSql = "UPDATE USERS SET PASSWORD=:passwords, IS_DISABLED=:isDisabled WHERE EMAIL=:email AND USER_ROLE=:role";
    $stmt = oci_parse($conn, $updateSql);
    oci_bind_by_name($stmt, ':passwords', $password);
    oci_bind_by_name($stmt, ':isDisabled', $isDisabled);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':role', $role);
    oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
}

function approveTraderRequests($conn, $email) {
    $selectSql = "SELECT USER_ID FROM USERS WHERE EMAIL=:email";
    $stmt = oci_parse($conn, $selectSql);
    oci_bind_by_name($stmt, ':email', $email);
    oci_execute($stmt, OCI_DEFAULT);

    while (($row = oci_fetch_object($stmt)) != false) {
        $userId = $row->USER_ID;
        $updateRequestSql = "UPDATE SHOP_REQUEST SET IS_APPROVED='true' WHERE USER_ID=:userId";
        $updateStmt = oci_parse($conn, $updateRequestSql);
        oci_bind_by_name($updateStmt, ':userId', $userId);
        oci_execute($updateStmt, OCI_COMMIT_ON_SUCCESS);
    }
    oci_commit($conn);
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $password = 'Password1'; // Example password, usually this would be hashed
    $isDisabled = 'false';
    $role = 'trader';

    updateUserCredentials($conn, $email, $password, $isDisabled, $role);
    approveTraderRequests($conn, $email);

    oci_close($conn);
    echo "You have accepted this trader account.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Trader Confirmation</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="main-content">
            <p class="status-message">You have accepted this trader account.</p>
            <a href="dashboard.php" class="button">Return to Dashboard</a>
        </div>
    </div>
</body>
</html>
