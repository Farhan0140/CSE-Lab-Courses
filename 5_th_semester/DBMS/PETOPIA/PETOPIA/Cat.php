<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat</title>
    <link rel="stylesheet" href="catstyle.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="top-section">
            <div class="logo">
                <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="logo-image">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search Pet Essentials">
                <button class="search-icon">&#128269;</button>
            </div>
        </div>
        <div class="bottom-section">
            <div class="nav-links">
                <a href="index.php">Home</a>
                <div class="dropdown">
                    <a href="#" class="shop-link active">Shop</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                            <a href="Cat.php" class ="active" >Cat</a>
                            
                            <a href="Food.php">Food</a>
                            <a href="Accessories.php">Accessories</a>
                           <a href="toys.php">Toys</a>
                           <a href="medicine.php">Medicine</a>

                             </div>
                    </div>
                </div>
                <a href="index.php#reviews">Reviews</a>
                <a href="#about-section">About</a>
                <div class="dropdown">
                    <a href="#" class="services-link">Services</a>
                    <div class="dropdown-content">
                        <a href="Buy&Sell.php">Buy&Sell</a>
                        <a href="adoption.php">Adoption</a>
                        <a href="hlthchk.php">Health Checkup</a>
                    </div>
                </div>
            </div>
            <div class="actions">
                <a href="login.php" id="myAccountBtn">My Account</a>
                <a href="rewards.html">Rewards</a>
                <a href="cart.html">Cart</a>
                <a href="contact.php" class="contact">&#128222; Contact</a>
            </div>
        </div>
    </div>


    
    <!-- Shop Sections -->
    <main>
        <!-- Cat Food Section -->
<section class="shop-section" id="cat-food">
    <a href="Food.php" class="shop-link">
        <h2>Food</h2>
    </a>

    <div class="product-grid">
        <div class="product-card">
            <img src="felix.jpg" alt="Felix Cat Food">
            <h3>Felix Cat Food Kitten Tuna in Jelly</h3>
            <p><span class="price">৳110.00</span> <span class="discount">৳120.00</span></p>
        </div>
        <div class="product-card">
            <img src="sheba_tuna.jpg" alt="Sheba Tuna">
            <h3>Sheba Cat Food Pouch Tuna Flavour</h3>
            <p><span class="price">৳120.00</span> <span class="discount">৳130.00</span></p>
        </div>
        <div class="product-card">
            <img src="sheba_tuna_salmon.jpg" alt="Sheba Tuna and Salmon">
            <h3>Sheba Cat Food Pouch Tuna & Salmon Flavour</h3>
            <p><span class="price">৳120.00</span> <span class="discount">৳130.00</span></p>
        </div>
    </div>
    <!-- View More Button -->
    <div class="view-more-container">
        <a href="Food.html" class="view-more">View More</a>
    </div>
</section>


        <!-- Cat Accessories Section -->
        <section class="shop-section" id="cat-accessories">
        <a href="Accessories.php" class="shop-link">
            <h2>Accessories</h2>
        </a>

            <div class="product-grid">
                <div class="product-card">
                    <img src="cat_harness.jpg" alt="Cat Harness">
                    <h3>Cat Harness Belt</h3>
                    <p><span class="price">৳250.00</span> <span class="discount">৳350.00</span></p>
                </div>
                <div class="product-card">
                    <img src="fur_brush.jpg" alt="Pet Fur Brush">
                    <h3>Two-Way Reusable Pet Fur Remover Brush</h3>
                    <p><span class="price">৳599.00</span> <span class="discount">৳650.00</span></p>
                </div>
                <div class="product-card">
                    <img src="body_harness.jpg" alt="Cat Body Harness">
                    <h3>Cat Body Harness and Leash</h3>
                    <p><span class="price">৳300.00</span> - <span class="price">৳320.00</span></p>
                </div>
            </div>
            <!-- View More Button -->
    <div class="view-more-container">
        <a href="Food.php" class="view-more">View More</a>
    </div>

        </section>



        <!-- Cat Toys Section -->
        <section class="shop-section" id="cat-toys">
        <a href="toys.php" class="shop-link">
            <h2>Toys</h2>
        </a>

            <div class="product-grid">
                <div class="product-card">
                    <img src="mouse_toy.jpg" alt="Mouse Toy">
                    <h3>Interactive Mouse Toy</h3>
                    <p><span class="price">৳150.00</span> <span class="discount">৳200.00</span></p>
                </div>
                <div class="product-card">
                    <img src="feather_wand.jpg" alt="Feather Wand">
                    <h3>Feather Wand Toy</h3>
                    <p><span class="price">৳180.00</span> <span class="discount">৳250.00</span></p>
                </div>
                <div class="product-card">
                    <img src="ball_toys.jpg" alt="Ball Toys">
                    <h3>Colorful Rolling Balls</h3>
                    <p><span class="price">৳100.00</span> <span class="discount">৳120.00</span></p>
                </div>
            </div>
            <!-- View More Button -->
    <div class="view-more-container">
        <a href="toys.php" class="view-more">View More</a>
    </div>

        </section>




        <!-- Cat Medicine Section -->
        <section class="shop-section" id="cat-medicine">
        <a href="medicine.php" class="shop-link">
            <h2>Medicine</h2>
        </a>
        
            <div class="product-grid">
                <div class="product-card">
                    <img src="medicine1.jpg" alt="Feline Oral Care">
                    <h3>Feline Oral Care Solution</h3>
                    <p><span class="price">৳450.00</span> <span class="discount">৳500.00</span></p>
                </div>
                <div class="product-card">
                    <img src="medicine2.jpg" alt="Vitamin Supplement">
                    <h3>Cat Vitamin Supplement</h3>
                    <p><span class="price">৳350.00</span> <span class="discount">৳400.00</span></p>
                </div>
                <div class="product-card">
                    <img src="medicine3.jpg" alt="Anti-Flea Spray">
                    <h3>Anti-Flea Spray</h3>
                    <p><span class="price">৳600.00</span> <span class="discount">৳650.00</span></p>
                </div>
            </div>
            <!-- View More Button -->
    <div class="view-more-container">
        <a href="medicine.php" class="view-more">View More</a>
    </div>

        </section>

    </main>


   
    <!--Footer Section-->

<footer class="footer">
    <div class="footer-container">
        <!-- Logo Section -->
        <div class="footer-section logo-section">
            <a href="index.php"> <!-- Replace 'index.html' with the actual path to your homepage -->
                <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="footer-logo">
            </a>
        </div>

       <!-- Categories Section -->
       <div class="footer-section category">
        <h3>Categories</h3>
        <ul>
            
            <li><a href="Food.php">Food</a></li>
            <li><a href="Accessories.php">Accessories</a></li>
            <li><a href="toys.php">Toys</a></li>
           <li><a href="medicine.php">Medicine</a></li>
        </ul>
    </div>

        <!-- Quick Links Section -->
        <div class="footer-section quick-links">
            <h3>Quick Links</h3>
            <ul>
                  <li><a href="Cat.php">Cat</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about-section">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
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
