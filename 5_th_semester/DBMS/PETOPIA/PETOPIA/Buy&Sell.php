<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy & Sell</title>
    <link rel="stylesheet" href="buysellstyle.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="top-section">
            <div class="logo">
                <a href="index.php">
                <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="logo-image"></a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search Pet Essentials">
                <span class="search-icon">&#128269;</span>
            </div>
        </div>
        <div class="bottom-section">
            <div class="nav-links">
                <a href="index.php">Home</a>
                <div class="dropdown">
                    <a href="#" class="shop-link">Shop</a>
                    <div class="dropdown-content">
                        <a href="Cat.php">Cat</a>
                        <a href="Food.php">Food</a>
                        <a href="Accessories.php">Accessories</a>
                        <a href="toys.php">Toys</a>
                        <a href="medicine.php">Medicine</a>
                    </div>
                </div>
                <a href="index.html#reviews.php">Reviews</a>
                <a href="index.html#about.php">About</a>
                <div class="dropdown">
                    <a href="#" class="services-link active">Services</a>
                    <div class="dropdown-content">
                        <a href="Buy&Sell.php" class="active">Buy&Sell</a>
                        <a href="adoption.php">Adoption</a>
                        <a href="hlthchk.php">Health Checkup</a>
                    </div>
                </div>
            </div>
            <div class="actions">
                <a href="myaccount.php">My Account</a>
                <a href="rewards.php">Rewards</a>
                <a href="cart.php">Cart</a>
                <a href="contact.php" class="contact">&#128222; Contact</a>
            </div>
        </div>
    </div>

    
    <!-- Buy & Sell Section -->
    <div class="shop-section">
        <h2>Explore Cat & kittens of various breeds and personality!</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="images/cat1.jpg" alt="Persian Kitten">
                <h3>1-3 months Female Purebred Persian</h3>
                <p class="price">৳ 15,000</p>
                <p>Playful, healthy, with vaccination.</p>
            </div>
            <div class="product-card">
                <img src="images/cat2.jpg" alt="White Persian Kitten">
                <h3>1-3 months Male Purebred Persian</h3>
                <p class="price">৳ 18,000</p>
                <p>Blue eyes, vaccinated.</p>
            </div>
            <div class="product-card">
                <img src="images/cat3.jpg" alt="Long Coat Persian Cat">
                <h3>1+ year Male Purebred Persian Long Coat</h3>
                <p class="price">৳ 9,000</p>
                <p>Active, playful, vaccinated.</p>
            </div>
            <div class="product-card">
                <img src="images/cat4.jpg" alt="Mixed Breed Kitten">
                <h3>3-6 months Male Mixed Breed Persian</h3>
                <p class="price">৳ 2,500</p>
                <p>Friendly, healthy.</p>
            </div>
        </div>
    </div>


    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&raquo;</a>
    </div>





    <!--Footer section-->
    
<footer class="footer">
    <div class="footer-container">
        <!-- Logo Section -->
        <div class="footer-section logo-section">
            <a href="index.html"> <!-- Replace 'index.html' with the actual path to your homepage -->
                <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="footer-logo">
            </a>
        </div>

       <!-- Categories Section -->
       <div class="footer-section category">
        <h3>Categories</h3>
        <ul>
            <li><a href="Cat.html">Cat</a></li>
            <li><a href="Food.html">Food</a></li>
            <li><a href="medicine.html">Medicine</a></li>
        </ul>
    </div>

        <!-- Quick Links Section -->
        <div class="footer-section quick-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#about-section">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>


        <!-- Contact Section -->
        <div class="footer-section contact">
            <h3>Contact</h3>
            <p><strong>Address:</strong> 53/6 Mirpur pallabipolashi, Dhaka - 1212</p>
            <p><strong>Email:</strong> <a href="mailto: peetopia123bd@gmail.com">petopia123bd@gmail.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+8801912345674">+8801912-345674</a></p>
        </div>

        <!-- Social Media Links -->
        <div class="footer-section social-media">
            <a href="#"><img src="images/p1.png" alt="Facebook"></a>
            <a href="#"><img src="images/p2.png" alt="Instagram"></a>
            <a href="#"><img src="images/p4.png" alt="WhatsApp"></a>
            <a href="#"><img src="images/p3.png" alt="Twitter"></a>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; 2025 PETOPIA. All Rights Reserved.</p>
    </div>
</footer>


</body>
</html>
