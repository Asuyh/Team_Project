<?php
session_start();
include './connection.php';

if (!isset($_SESSION['isAuthenticated']) || $_SESSION['isAuthenticated'] !== true) {
    header('location:index.php');
    exit;
}

$user_id = $_SESSION['user_id'];

function fetchQuantityInStock($conn, $product_id) {
    $sql = "SELECT QUANTITY_IN_STOCK FROM PRODUCT WHERE PRODUCT_ID = :product_id";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_execute($stmt);
    return oci_result($stmt, 'QUANTITY_IN_STOCK');
}

function updateOrInsertCart($conn, $user_id, $product_id, $quantity, $currentQuantity) {
    if ($currentQuantity > 0) {
        $sql = "UPDATE CARTLIST SET QUANTITY = :quantity WHERE USER_ID = :user_id AND PRODUCT_ID = :product_id";
        $quantity += $currentQuantity;
    } else {
        $sql = "INSERT INTO CARTLIST(USER_ID, PRODUCT_ID, QUANTITY) VALUES (:user_id, :product_id, :quantity)";
    }
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':quantity', $quantity);
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
}

function handleCartOperations($conn, $user_id) {
    if (!isset($_GET['product_id'], $_GET['qty'])) return;
    
    $product_id = $_GET['product_id'];
    $quantity = $_GET['qty'];
    
    if ($quantity <= 0 || !filter_var($quantity, FILTER_VALIDATE_INT)) {
        echo '<script>alert("Invalid input to the cart")</script>';
        return;
    }
    
    $qty_in_stock = fetchQuantityInStock($conn, $product_id);
    $currentItemInCart = $_SESSION['cart'][$product_id] ?? 0;
    
    if ($qty_in_stock <= $currentItemInCart) {
        echo "<script>alert('You have already kept $qty_in_stock of it in your cart for this product. ITEM OUT OF STOCK!')</script>";
    } else {
        updateOrInsertCart($conn, $user_id, $product_id, $quantity, $currentItemInCart);
        $_SESSION['cart'][$product_id] = ($currentItemInCart + $quantity);
    }
}

function handleWishListOperations($conn, $user_id) {
    if (!isset($_GET['category'], $_GET['product_id'], $_GET['type'], $_SESSION['isAuthenticated']) || !$_SESSION['isAuthenticated']) return;
    
    $product_id = $_GET['product_id'];
    $type = $_GET['type'];
    
    if ($type === 'remove') {
        $sql = "DELETE FROM WISHLIST WHERE USER_ID = :user_id AND PRODUCT_ID = :product_id";
    } elseif ($type === 'add') {
        $sql = 'INSERT INTO WISHLIST(USER_ID, PRODUCT_ID) VALUES (:user_id, :product_id)';
    } else {
        return; // Invalid type
    }
    
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':user_id', $user_id);
    oci_bind_by_name($stmt, ':product_id', $product_id);
    oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);
}

handleCartOperations($conn, $user_id);
handleWishListOperations($conn, $user_id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WishList</title>
    <link rel="stylesheet" href="./assets/styles/index.css">
</head>
<body data-theme="default" id="get-theme">
    <div class="page user-dashboard-page">
        <?php include './components/navbars/primary-navbar.php'; ?>
        <div class="container page__body">
            <?php include './components/pages/AccountSettings/userNavbar.php'; ?>
            <div class="user-dashboard__content">
                <h1 class="section__header__heading">My WishLists</h1>
                <!-- Wish List Display Logic -->
                <?php include './components/displayWishList.php'; ?>
            </div>
        </div>
        <?php include './components/resuables/page-footer.php'; ?>
        <?php include './components/resuables/copyright.php'; ?>
        <?php include './components/navbars/bottom-navbar.php'; ?>
    </div>
    <script src="app.js"></script>
</body>
</html>
