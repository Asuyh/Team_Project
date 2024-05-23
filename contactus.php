<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body data-theme="default" id="get-theme">
    <div class="container">
        <div class="login-form">
            <form method="POST" action="">
                <div class="login-form__content">
                    <div class="login-form__content__header">
                        Contact Us
                    </div>
                    <div class="login-form__content__body">
                        <div class="form-row">
                            <div class="form-control half">
                                <label class="form-control__label">First Name*</label>
                                <input class="form-control__input" placeholder="Provide your first name" name="firstname" required/>
                            </div>
                            <div class="form-control half">
                                <label class="form-control__label">Last Name*</label>
                                <input class="form-control__input" placeholder="Provide your last name" name="lastname" required/>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="form-control__label">Email Address*</label>
                            <input class="form-control__input" placeholder="Provide your email Address" name="email"/>
                        </div>
                        <div class="form-control">
                            <label class="form-control__label">Subject*</label>
                            <input class="form-control__input" placeholder="Write us your queries" name="subject" required/>
                        </div>
                        <div class="form-control">
                            <label class="form-control__label">Message</label>
                            <textarea class="form-control__input textArea" placeholder="Please explain us further" name="message" rows="4" cols="50"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="Submit" name="ContactUsSubmit" class="btn primary-btn form-btn"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>
