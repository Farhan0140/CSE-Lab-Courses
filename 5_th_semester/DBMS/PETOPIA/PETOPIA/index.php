<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETOPIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >

    <!-- Navbar -->
    <div class="navbar">
        <div class="top-section">
            <div class="logo">
                <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="logo-image">
            </div>
            
            <div class="search-bar">
                <input type="text" placeholder="Search Pet Essentials">
                <span class="search-icon">&#128269;</span>
            </div>
        </div>
        <div class="bottom-section">
            <div class="nav-links">
                <a href="index.php" class="active">Home</a>


                <div class="dropdown">
                    <a href="#" class="shop-link">Shop</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                          
                            
                            <a href="Food.php">Food</a>
                            <a href="Accessories.php">Accessories</a>
                           <a href="toys.php">Toys</a>
                           <a href="medicine.php">Medicine</a>

                             </div>
                    </div>
                </div>


                <a href="index.php#reviews">Reviews</a>
                <a href="index.php#about-section">About</a>
                
            </div>
            <div class="actions">
    <?php if (isset($_SESSION['username'])): ?>
        <!-- If the user is logged in -->
        <a href="logout.php" id="myAccountBtn">Sign out</a>
    <?php else: ?>
        <!-- If the user is not logged in -->
        <a href="login.php" id="myAccountBtn">Sign in</a>
    <?php endif; ?>
    
</div>
        </div>
    </div>



    <!-- Home Section -->
    <section class="home-section">
        <div class="home-content">
            <h1>Welcome to PETOPIA</h1>
            <p>Connect, adopt, and provide the best care for your pets. 
               Explore our platform to find trusted services and accessories for your beloved friend. 
               We ensure your pets receive the love and care that they truly deserve. </p>

            <a href="contact.php" class="contact-button">Contact</a>
            <!--<button class="contact-button">Contact</button> -->
        </div>
        <div class="home-image">
            <img src="images/photo1.png" alt="Home Image">
        </div>
    </section>
    




<!-- Shop Section -->
<div class="shop-section" id="shop-section">
    <h2>Category</h2>
    <div class="categories">
        <div class="category-card" id="food">
            <a href="Food.php">
                <img src="images/photo3.jpg" alt="Food">
            </a>
            <a href="Food.php" class="shop-btn">Food</a>
        </div>

        <div class="category-card" id="Accessories">
            <a href="Accessories.php">
                <img src="images/photo4.jpg" alt="Accessories">
            </a>
            <a href="Accessories.php" class="shop-btn">Accessories</a>
        </div>

        <div class="category-card" id="toys">
            <a href="toys.php">
                <img src="images/photo5.jpg" alt="Toys">
            </a>
            <a href="toys.php" class="shop-btn">Toys</a>
        </div>

        <div class="category-card" id="medicine">
            <a href="medicine.php">
                <img src="images/photo6.jpg" alt="Medicine">
            </a>
            <a href="medicine.php" class="shop-btn">Medicine</a>
        </div>
    </div>
</div>





   <!-- Review Section -->
   <div class="review-section" id="reviews">
    <h2>Reviews</h2>
    <div class="review-row">
        <div class="review-cards-wrapper">
            <div class="review-cards">

                <!-- First 4 reviews -->
                <div class="review-card">
                    <p><span class="quote">“</span>The toys collection is just awesome.<span class="quote">”</span></p>
                    <div class="review-details">
                        <img src="images/review_images/photo17.png" alt="Customer Image" class="review-image">
                        <div>
                            <h4>John Doe</h4>
                            <div class="stars">★★★★★</div>
                        </div>
                    </div>
                </div>


                <div class="review-card">
                    <p><span class="quote">“</span>Amazing products for my cat. Highly recommend!<span class="quote">”</span></p>
                    <div class="review-details">
                        <img src="images/review_images/photo18.png" alt="Customer Image" class="review-image">
                        <div>
                            <h4>Jane Smith</h4>
                            <div class="stars">★★★★★</div>
                        </div>
                    </div>
                </div>


                <div class="review-card">
                    <p><span class="quote">“</span>Great customer service and quick delivery.<span class="quote">”</span></p>
                    <div class="review-details">
                        <img src="images/review_images/photo19.png" alt="Customer Image" class="review-image">
                        <div>
                            <h4>Emma Brown</h4>
                            <div class="stars">★★★★★</div>
                        </div>
                    </div>
                </div>


                <div class="review-card">
                    <p><span class="quote">“</span>Excellent service, highly recommended.<span class="quote">”</span></p>
                    <div class="review-details">
                        <img src="images/review_images/photo20.png" alt="Customer Image" class="review-image">
                        <div>
                            <h4>Mark White</h4>
                            <div class="stars">★★★★★</div>
                        </div>
                    </div>
                </div> 
               
            </div>
        </div>
    </div>



<!-- Next 4 reviews -->
        <div class="review-row">
        <div class="review-cards-wrapper">
            <div class="review-cards">
                

               <div class="review-card">
                <p><span class="quote">“</span>The packaging and the in time delivery is what makes me recommend this platform more!<span class="quote">”</span></p>
                <div class="review-details">
                    <img src="images/review_images/photo21.png" alt="Customer Image" class="review-image">
                    <div>
                        <h4>Sarah Green</h4>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>


                <div class="review-card">
                <p><span class="quote">“</span>Fast delivery and great quality products.<span class="quote">”</span></p>
                <div class="review-details">
                    <img src="images/review_images/photo22.png" alt="Customer Image" class="review-image">
                    <div>
                        <h4>James Lee</h4>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>


            <div class="review-card">
                <p><span class="quote">“</span>Top-notch customer service, highly impressed.<span class="quote">”</span></p>
                <div class="review-details">
                    <img src="images/review_images/photo23.png" alt="Customer Image" class="review-image">
                    <div>
                        <h4>Linda White</h4>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>
          

            <div class="review-card">
                <p><span class="quote">“</span>Will definitely order again. Highly recommend.<span class="quote">”</span></p>
                <div class="review-details">
                    <img src="images/review_images/photo24.png" alt="Customer Image" class="review-image">
                    <div>
                        <h4>Oliver Gray</h4>
                        <div class="stars">★★★★★</div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>


<!-- JavaScript -->
<script>
    const wrapper = document.querySelectorAll('.review-cards-wrapper').forEach(wrapper => {
    const cards = wrapper.querySelector('.review-cards');
    const clone = cards.cloneNode(true);
    wrapper.appendChild(clone);
});
</script>




    <!-- About Section -->
  <section class="about-section" id="about-section">
    <!-- Left Side: Image -->
    <img src="images/photo2.png" alt="About Us Image">

    <!-- Right Side: Text Content -->
    <div class="about-content">
        <h2>About PETOPIA</h2>
        <p>
            At PETOPIA, we are passionate about providing top-quality products and services for your beloved pets. 
            Whether it is nutritious food, fun toys, grooming services, or expert advice, we are here to ensure your furry friends are happy, healthy, and loved.
        </p>
        <p>
            Our mission is to create a haven for pet owners, offering everything they need in one convenient place. 
            With a dedicated team and a love for animals, PETOPIA is your trusted partner in pet care.
        </p>
    </div>
</section>

  



  <!-- Services Section -->
<div class="services-section" id="services">
    <h2>Our Services</h2>
    <div class="services-container">
        <!-- Service Card 1 -->
        <div class="service-card">
            <a href="Buy&Sell.php" class="service-link">
                <img src="images/photo7.png" alt="Buy & Sell Icon" class="service-icon">
                <h3>Buy & Sell</h3>
            </a>
            <p>Connect with buyers and sellers of pets and pet products easily and safely.</p>
        </div>
        
        <!-- Service Card 2 -->
        <div class="service-card">
            <a href="adoption.php" class="service-link">
                <img src="images/photo8.png" alt="Adoption Icon" class="service-icon">
                <h3>Adoption</h3>
            </a>
            <p>Find loving homes for pets or adopt a furry friend into your family.</p>
        </div>
        
        <!-- Service Card 3 -->
        <div class="service-card">
            <a href="hlthchk.php" class="service-link">
                <img src="images/photo9.png" alt="Health Checkup Icon" class="service-icon">
                <h3>Health Checkup</h3>
            </a>
            <p>Ensure your pets are in the best health with our trusted vet services.</p>
        </div>
    </div>
</div>



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
                  
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about-section">About Us</a></li>
           
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




