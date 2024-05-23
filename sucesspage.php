<?php
session_start();
include("connection.php");

// Initialize session variables if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['isAuthenticated'])) {
    $_SESSION['isAuthenticated'] = false;
}
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = null;
}

function authenticateUser($userId, $conn) {
    $sqlUser = "SELECT * FROM USERS WHERE USER_ID = :userId AND USER_ROLE = 'customer'";
    $stmtUser = oci_parse($conn, $sqlUser);
    oci_bind_by_name($stmtUser, ':userId', $userId);
    oci_execute($stmtUser);
    return oci_fetch_object($stmtUser);
}

function updatePaymentStatus($orderId, $conn) {
    $updateOrderSql = "UPDATE ORDERPLACE SET PAYMENT_STATUS = 'true' WHERE ORDERPLACE_ID = :orderId";
    $stmtOrderUpdate = oci_parse($conn, $updateOrderSql);
    oci_bind_by_name($stmtOrderUpdate, ':orderId', $orderId);
    oci_execute($stmtOrderUpdate, OCI_COMMIT_ON_SUCCESS);
    oci_free_statement($stmtOrderUpdate);
}

function recordPayment($orderId, $conn) {
    $insertPaymentSql = "INSERT INTO PAYMENT(MODE_DETAIL, ORDERPLACE_ID) VALUES ('paypal', :orderId)";
    $stmtInsertPayment = oci_parse($conn, $insertPaymentSql);
    oci_bind_by_name($stmtInsertPayment, ':orderId', $orderId);
    oci_execute($stmtInsertPayment, OCI_COMMIT_ON_SUCCESS);
    oci_free_statement($stmtInsertPayment);
}

if (isset($_GET['userId'], $_GET['payment'], $_GET['orderId'], $_GET['PayerID']) && $_GET['payment']) {
    $userId = $_GET['userId'];
    $orderId = $_GET['orderId'];

    $user = authenticateUser($userId, $conn);
    if ($user) {
        $_SESSION['isAuthenticated'] = true;
        $_SESSION['user_id'] = $userId;

        updatePaymentStatus($orderId, $conn);
        recordPayment($orderId, $conn);

        // Include PHPMailer for email functionality
        include './PHPMailer/index.php';
        oci_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <title>Success</title>
</head>
<body data-theme="default">

    <div class="page home-page">
        <?php include './components/navbars/primary-navbar.php'; ?>

        <div class="container page__body">
            <div class="success-page-container">
                <img src='./assets/images/succcess.png'>
                <div class="success-page-container__content">
                    Thank You For your payment. Your Order <b>#<?php echo htmlspecialchars($orderId) ?></b> will be delivered soon. <br/>

                    <div class="success-page-container__content__links">
                        <a href="index.php">
                            <button class="btn primary-btn">Go to Home</button>
                        </a>
                        <a href="orders.php">
                            <button class="btn primary-outline-btn">My Orders</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './components/resuables/page-footer.php'; ?>
    <?php include './components/resuables/copyright.php'; ?>
    <?php include './components/navbars/bottom-navbar.php'; ?>

    <script src="app.js"></script>
</body>
</html>
