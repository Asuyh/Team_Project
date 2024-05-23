<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <link rel="stylesheet" href="assets/styles/index.css">
</head>
<body data-theme="default">
    <div class="page login-page">
        <div class="container page__body">
            <div class="login-form">
                <form method="POST" action="">
                    <div class="login-form__content">
                        <div class="login-form__content__header">
                            Sign Up
                        </div>
                        <div class="login-form__content__body">
                            <div class="flex_container form-control">
                                <div class="flex_item">
                                    <p class="form-control__label">First Name</p>
                                    <input class="form-control__input" placeholder="FirstName" name="fname">
                                </div>
                                <div class="flex_item">
                                    <p class="form-control__label">Last Name</p>
                                    <input class="form-control__input" placeholder="LastName" name="lname">
                                </div>
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Email Address</p>
                                <input class="form-control__input" placeholder="Enter your email Address" name="email">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Phone Number</p>
                                <input class="form-control__input" placeholder="+44" name="phone">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Password</p>
                                <input class="form-control__input" type="password" placeholder="Enter your password" name="password">
                            </div>
                            <div class="form-control">
                                <p class="form-control__label">Confirm Password</p>
                                <input class="form-control__input" type="password" placeholder="Re-enter password" name="Rpassword">
                            </div>
                            <div class="login-form__content__login">
                                <input type="submit" value="Sign-Up" class="btn primary-btn form-btn">
                            </div>
                            <div class="login-form__content__signup flex_container">
                                <div>
                                    <p class="button-desc">Already have an account?</p>
                                    <input type="submit" value="Login" class="btn primary-btn form-btn">
                                </div>
                                <div>
                                    <p class="button-desc">Sell Product on GoceEase?</p>
                                    <input type="submit" value="Register as Trader" class="btn primary-btn form-btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
