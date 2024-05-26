<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar with Dropdown</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links {
            display: flex;
            list-style: none;
            padding: 0;
        }
        .nav-links a, .dropdown-content a {
            text-decoration: none;
            color: white;
            padding: 10px;
            display: block;
        }
        .search-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-grow: 1;
        }
        .search-container input[type="text"] {
            padding: 8px;
            margin-right: 10px;
            width: 200px;
        }
        .logo img {
            height: 50px;
        }
        .profile-image img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }
        .profile-menu {
            position: relative;
        }
        .profile-menu ul, .dropdown-content {
            position: absolute;
            background-color: #555;
            list-style: none;
            padding: 10px;
            display: none;
            right: 0;
            z-index: 1;
        }
        .profile-menu:hover ul, .nav-item:hover .dropdown-content {
            display: block;
        }
        .dropdown-content {
            right: initial;
            left: 0;
        }
        .nav-item {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="navbar primary-navbar">
        <div class="logo">
            <a href="index.php">
                <img src="./assets/images/logo-01.png" />
            </a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <div class="nav-item">
                <a href="deals.php">Categoties</a>
                <div class="dropdown-content">
                    <a href="#">Butchers</a>
                    <a href="#">Green Grocers</a>
                    <a href="#">Bakery</a>
                    <a href="#">Fishmonger</a>
                    <a href="#">Delicatessen</a>
                </div>
            </div>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search products">
            <button>Search</button>
        </div>
        <div class="profile-menu">
            <a href="profile.php">
                <div class="profile-image">
                    <img src="./assets/images/profiles/default.jpg" alt="Profile Image"/>
                </div>
            </a>
            <ul>
                <li><a href="account-settings.php">Account Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
