<?php
include './connection.php';
$count = 0;

if (isset($_SESSION['cart'])) {
    $cartData = $_SESSION['cart'];
    foreach ($cartData as $key => $value) {
        $count = $count + $value;
    }
}

if (!isset($_SESSION['isAuthenticated'])) {
    $_SESSION['isAuthenticated'] = False;
}
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = '';
}

$isCustomer = true;
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'trader') {
        $isCustomer = false;
    }
}

if ($_SESSION['isAuthenticated']) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM USERS WHERE USER_ID=$user_id";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    $userImage = '';
    while (($row = oci_fetch_object($stid)) != false) {
        $userImage = $row->USER_IMAGE;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="naav.css">
</head>
<body>
    <div class="navbar primary-navbar">
        <div class="container primary-navbar__content">
            <div class="primary-navbar__content__left">
                <a href="index.php"><img src="./assets/images/logo-01.png" alt="Logo" style="height: 50px;"></a>
                <div class="nav-links nav-links--desktop">
                    <a href="index.php"><?php echo $isCustomer ? 'Home' : 'Products'; ?></a>
                </div>
            </div>
            <div class="primary-navbar__content__right">
                <form class="search-container" action="./filter.php" method="GET">
                    <input type="text" placeholder="Search products" name="search">
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
