<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e1e5eb;
            padding: 10px 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
        }
        .nav-links, .nav-links--desktop {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
        }
        .nav-links__cart__counter {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            color: blue;
        }
        .nav-dropdown {
            position: absolute;
            background-color: #ffffff;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .nav-dropdown__lists {
            list-style: none;
            padding: 0;
        }
        .nav-dropdown__lists__list {
            padding: 8px 16px;
        }
        .nav-dropdown__lists__list:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="navbar primary-navbar">
        <div class="container primary-navbar__content">
            <div class="primary-navbar__content__left">
                <div class="primary-navbar__content__left__logo">
                    <a href="index.html">
                        <img src="./assets/images/logo-01.png" />
                    </a>
                </div>
                <div class="nav-links nav-links--desktop">
                    <a href="index.html">Home</a>
                </div>
                <div class="nav-links nav-links--desktop">
                    <a href="products.html">Products</a>
                </div>
                <div class="nav-links nav-links--desktop">
                    <a href="deals.html">Deals</a>
                </div>
                <div class="nav-links nav-links--desktop">
                    <a href="reviews.html">Reviews</a>
                </div>
            </div>
            <div class="primary-navbar__content__right">
                <div class="nav-links nav-links--desktop">
                    <a href="cart.html">
                        <div class="nav-links__cart">
                            <div class="nav-links__cart__main">
                                <!-- Cart Icon -->
                                <div class="nav-links__cart__counter">3</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="nav-links nav-links--profile nav-links--desktop">
                    <div class="nav-links__profile">
                        <!-- User Icon or Image -->
                        <img class='navbar-profile-picture' src='./assets/images/profiles/default.jpg'/>
                        <div class="nav-dropdown nav-dropdown--profile">
                            <ul class="nav-dropdown__lists nav-links__profile__lists">
                                <li class="nav-dropdown__lists__list">
                                    <a href='orders.html' class="nav-dropdown__lists__list__link">My Orders</a>
                                </li>
                                <li class="nav-dropdown__lists__list">
                                    <a href='wishlist.html' class="nav-dropdown__lists__list__link">My Wishlist</a>
                                </li>
                                <li class="nav-dropdown__lists__list">
                                    <a href='account-settings.html' class="nav-dropdown__lists__list__link">Account Settings</a>
                                </li>
                                <li class="nav-dropdown__lists__list">
                                    <a href="logout.html" class="nav-dropdown__lists__list__link">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nav-links nav-links--desktop">
                    <a href="login.html">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
