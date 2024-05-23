<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="forgotpassword.css">
</head>

<body data-theme="default" id="get-theme">
    <div class="page login-page">
        <div class="container page__body">
            <div class="login-form">
                <form method="POST" action="">

                    <div class="login-form__content center_body_div">
                        <div class="login-form__content__header">
                            New Password
                        </div>
                        <div class="login-form__content__body">
                            <div class="form-control">
                                <input class="form-control__input" placeholder="Enter New Password" name="newPassword" type="password" />
                                <!-- Error show -->
                                <div class="input-error" id="newPasswordErr"></div>
                            </div>

                            <div class="form-control">
                                <input class="form-control__input" placeholder="Confirm password" name="confirmPassword" type="password" />
                                <!-- Error show -->
                                <div class="input-error" id="confirmPasswordErr"></div>
                            </div>

                            <div class="login-form__content__login">
                                <input type="submit" value="Reset Password" name="changePassword" class="btn primary-btn form-btn" />
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
