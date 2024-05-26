<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }
        .nav-links {
            display: flex;
        }
        .nav-item {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #555;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .nav-item:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-align: left;
            display: block;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container input[type="text"] {
            padding: 8px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="index.php"><img src="./assets/images/logo-01.png" alt="Logo" style="height: 50px;"></a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <div class="nav-item">
                <a href="products.php">Products</a>
                <div class="dropdown-content">
                    <a href="#">Category 1</a>
                    <a href="#">Category 2</a>
                    <a href="#">Category 3</a>
                </div>
            </div>
            <div class="nav-item">
                <a href="deals.php">Deals</a>
                <div class="dropdown-content">
                    <a href="#">Deal 1</a>
                    <a href="#">Deal 2</a>
                    <a href="#">Deal 3</a>
                </div>
            </div>
        </div>
        <div class="search-container">
            <input type="text" placeholder="Search products">
            <button>Search</button>
        </div>
    </div>
</body>
</html>
