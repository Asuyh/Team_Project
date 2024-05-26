<?php
session_start();

if (isset($_SESSION['isAuthenticated']) && $_SESSION['isAuthenticated'] === true) {
    header('location:index.php');
    exit();
}

include("connection.php");

if (isset($_POST['LoginSubmit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty(trim($email))) {
        $emailerror = "Please enter email";
    } else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Invalid email";
        }
    }

    if (empty(trim($password))) {
        $passworderr = "Please enter password";
    }

    if (!empty($email) && !empty($password)) {
        $password = md5($password);
        $sql = "SELECT * FROM USERS WHERE email = '$email' AND password ='$password' AND IS_DISABLED='false'";
        $stid = oci_parse($conn, $sql);
        oci_execute($stid, OCI_NO_AUTO_COMMIT);
        oci_commit($conn);

        $res = oci_fetch_array($stid);

        if ($res) {
            $_SESSION['isAuthenticated'] = true;
            $_SESSION['user_id'] = $res['USER_ID'];
            $_SESSION['role'] = $res['USER_ROLE'];

            // Setup the cart after logging in
            $sql = "SELECT * FROM CARTLIST WHERE USER_ID=" . $res['USER_ID'];
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);

            while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                $product_id = $row['PRODUCT_ID'];
                $quantity = $row['QUANTITY'];

                if (isset($_SESSION['cart'][$product_id])) {
                    $updateCartListSql = "UPDATE CARTLIST SET QUANTITY=:quantity WHERE USER_ID=:user_id AND PRODUCT_ID=:product_id";
                    $stidUpdate = oci_parse($conn, $updateCartListSql);
                    oci_bind_by_name($stidUpdate, ':quantity', $_SESSION['cart'][$product_id]);
                    oci_bind_by_name($stidUpdate, ':user_id', $res['USER_ID']);
                    oci_bind_by_name($stidUpdate, ':product_id', $product_id);
                    oci_execute($stidUpdate, OCI_COMMIT_ON_SUCCESS);
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            }

            header('location:index.php');
            exit();
        } else {
            $_SESSION['isAuthenticated'] = false;
            $passworderr = "Invalid Credential";
        }

        oci_free_statement($stid);
        oci_close($conn);
    }
}

if (isset($_POST['signup'])) {
    header('location:registeruser.php');
    exit();
}

if (isset($_POST['registerastrader'])) {
    header('location:registerTrader.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/index.css">
</head>

<body data-theme="default" id="get-theme">
    <div class="page login-page">
        <?php include './components/navbars/primary-navbar.php'; ?>

        <div class="container page__body">
            <div class="login-form">
                <form method="POST" action="">
                    <div class="login-form__content">
                        <div class="login-form__content__header">
                            Log In
                        </div>
                        <div class="login-form__content__body">
                            <div class="form-control">
                                <p class="form-control__label">Email Address</p>
                                <input class="form-control__input <?php echo isset($emailerror) ? 'form-control__input--error' : ''; ?>" placeholder="Enter your email Address" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                <?php if (isset($emailerror)) : ?>
                                    <div class="input-error"><?php echo $emailerror; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Password</p>
                                <div class="form-control__password">
                                    <input id="password-field" class="form-control__input form-control__input--password <?php echo isset($passworderr) ? 'form-control__input--error' : ''; ?>" placeholder="Enter your password" type="password" name="password" id="pass-input" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                                    <?php if (isset($passworderr)) : ?>
                                        <div class="input-error"><?php echo $passworderr; ?></div>
                                    <?php endif; ?>
                                    <div class="pass-visibility" id="show-pass">SHOW</div>
                                    <div class="pass-visibility" id="hide-pass">HIDE</div>
                                </div>
                            </div>
                            <div class="login-form__content__body__other">
                                <div>
                                    <input type="checkbox" id="remember-me" /> <span id="remember-me-text"> Remember me</span>
                                </div>
                                <a href="forgetPassword.php">
                                    <div>Forgot password?</div>
                                </a>
                            </div>
                        </div>
                        <div class="login-form__content__login">
                            <input type="submit" value="Login" name="LoginSubmit" class="btn primary-btn form-btn" />
                        </div>
                        <div class="login-form__content__signup flex_container">
                            <div>
                                <p class="button-desc">User Account</p>
                                <input type="submit" value="User Register" class="btn primary-btn form-btn login-form__content__login" name="signup">
                            </div>
                            <div>
                                <p class="button-desc">Sell Product on GrocerEase?</p>
                                <input type="submit" value="Register as Trader" class="btn primary-btn form-btn login-form__content__login" name="registerastrader">
                            </div>
                            
                        </div>
                        <div style="text-align: center; margin-top: 20px;">
    <p class="button-desc">Are You Admin?</p>
    <input type="submit" value="Sign In As Admin" class="btn primary-btn form-btn login-form__content__login" name="adminsignin" id="adminSignInBtn">
</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include './components/resuables/page-footer.php'; ?>
    <?php include './components/resuables/copyright.php'; ?>
    <?php include './components/navbars/bottom-navbar.php'; ?>
</body>

<script src="app.js"></script>
<script>
    // Find the button element
    var adminSignInBtn = document.getElementById('adminSignInBtn');

    // Add a click event listener to the button
    adminSignInBtn.addEventListener('click', function() {
        // Open the link in a new tab when the button is clicked
        window.open('http://localhost:8080/apex/f?p=104:LOGIN_DESKTOP:12146006083902:::::', '_blank');
    });
</script>

</html>
