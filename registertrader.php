<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Register</title>
    <link rel="stylesheet" href="registertrader.css">
</head>
<body data-theme="default">
    <div class="page login-page">
        <!-- Primary Navbar Placeholder -->
        <div class="container page__body">
            <div class="login-form">
                <form method="POST" action="">
                    <div class="login-form__content">
                        <div class="login-form__content__header">
                            Sign Up
                        </div>
                        <div class="login-form__content__body">
                            <h3>Trader Details:</h3>
                            <div class="form-control">
                                <p class="form-control__label">Name</p>
                                <input class="form-control__input" placeholder="FirstName" name="Tname">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Email Address</p>
                                <input class="form-control__input" placeholder="Enter your email Address" name="Temail">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Phone Number</p>
                                <input class="form-control__input" placeholder="+44" name="Tphone">
                            </div>
                            <h3>Shop Details:</h3>
                            <div class="form-control">
                                <p class="form-control__label">Name</p>
                                <input class="form-control__input" placeholder="Shop Name" name="name">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Address</p>
                                <input class="form-control__input" placeholder="Shop Address" name="addr">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Shop Contact Number</p>
                                <input class="form-control__input" placeholder="+44" name="phone">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Type of Product Sold by Shop</p>
                                <input class="form-control__input" placeholder="Enter the type of product sold by shop" name="product">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Purposal Message</p>
                                <textarea class="form-control__input textArea" placeholder="Enter proposal message" name="desc" rows="4" cols="50"></textarea>
                            </div>
                            <div class="login-form__content__login">
                                <input type="submit" value="Registration Proposal" class="btn primary-btn form-btn">
                            </div>
                            <div class="login-form__content__signup flex_container">
                                <div>
                                    <p class="button-desc">Already have an account?</p>
                                    <input type="submit" value="Log-in" class="btn primary-btn form-btn">
                                </div><br>
                                <div>
                                    <p class="button-desc">Sign Up as Customer</p>
                                    <input type="submit" value="Signup as Customer" class="btn primary-btn form-btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Page Footers Placeholder -->
    <!-- Copyright Placeholder -->
    <!-- Bottom Nav Placeholder -->
    <script src="app.js"></script>
</body>
</html>
