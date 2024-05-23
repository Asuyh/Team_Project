<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">   
</head>

<body data-theme="default" id="get-theme">
    <div class="page login-page">
        <div class="container page__body">
            <div class="login-form">
                <form method="POST" action="">
                    <div class="login-form__content">
                        <div class="login-form__content__header">
                            Log In
                        </div>
                        <div class="login-form__content__body">
                            <div class="form-control">
                                <p class="form-control__label">
                                    Email Address*
                                </p>
                                <input class="form-control__input" placeholder="Enter your email address" name="email" />
                                <!-- Error show -->
                                <div class="input-error" id="email-error"></div>
                            </div>

                            <div class="form-control">
                                <p class="form-control__label">
                                    Password*
                                </p>
                                <div class="form-control__password">
                                    <input id="password-field" class="form-control__input form-control__input--password" placeholder="Enter your password" type="password" name="password" />

                                    <!-- Error show -->
                                    <div class="input-error" id="password-error"></div>

                                    <div class="pass-visibility" id="show-pass">
                                        SHOW
                                    </div>
                                    <div class="pass-visibility" id="hide-pass">
                                        HIDE
                                    </div>
                                </div>
                            </div>

                            <div class="login-form__content__body__other">
                                <div>
                                    <input type="checkbox" id="remember-me" /> <span id="remember-me-text"> Remember me</span>
                                </div>
                                <a href="forgetPassword.php">
                                    <div>
                                        Forgot Password?
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="login-form__content__login">
                            <input type="submit" value="Login" name="LoginSubmit" class="btn primary-btn form-btn" />
                        </div>

                        <div class="login-form__content__signup flex_container">
                            <div>
                                <p class="button-desc">
                                    User Account
                                </p>
                                <input type="submit" value="User Register" class="btn primary-btn form-btn login-form__content__login" name="signup">
                            </div>
                            <div>
                                <p class="button-desc">
                                    Sell Product on All Grocers Hub?
                                </p>
                                <input type="submit" value="Register as Trader" class="btn primary-btn form-btn login-form__content__login" name="registerastrader">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>
