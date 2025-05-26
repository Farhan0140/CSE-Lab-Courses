<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Adoption</title>
    <link rel="stylesheet" href="adoptionstyle.css">
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
                <a href="index.html" class="active">Home</a>


                <div class="dropdown">
                    <a href="#" class="shop-link">Shop</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                            <a href="Cat.html">Cat</a>
                            
                            <a href="Food.html">Food</a>
                            
                            <a href="Accessories.html">Accessories</a>
                           <a href="toys.html">Toys</a>
                           <a href="medicine.html">Medicine</a>

                             </div>
                    </div>
                </div>


                <a href="#reviews">Reviews</a>
                <a href="#about-section">About</a>
                <div class="dropdown">
                    <a href="#" class="services-link active">Services</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                            <a href="Buy&Sell.html">Buy&Sell</a>
                            
                            <a href="adoption.html"class="active">Adoption</a>
                            
                            <a href="hlthchk.html">Health Checkup</a>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions">

                <a href="myaccount.html" id="myAccountBtn">My Account</a>
                <a href="rewards.html">Rewards</a>
                <a href="cart.html">Cart</a>
                <a href="contact.html" class="contact">&#128222; Contact</a>
            </div>
        </div>
    </div>



    <!-- Adoption Section -->
    <div class="adoption-section">
        <!-- Filters -->
        <div class="filters">
            <h2>Cat Adoption Search</h2>
            <form class="filter-form">
                <select name="sex">
                    <option value="">Sex: All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="breed">
                    <option value="">Breed: All</option>
                    <option value="domestic-short-hair">Domestic Short Hair</option>
                    <option value="domestic-medium-hair">Domestic Medium Hair</option>
                </select>
                <select name="age">
                    <option value="">Age: All</option>
                    <option value="kitten">Kitten</option>
                    <option value="adult">Adult</option>
                </select>

                <!--<input type="text" placeholder="Animal ID" name="animal-id"> -->
                <button type="submit">Search</button>
                <button type="reset">Clear</button>
            </form>
        </div>



        <!-- Cats Grid -->
        <div class="cats-grid">
            <div class="cat-card">
                <img src="images/cat1.jpg" alt="Bruce">
                <h3>Bruce</h3>
                <p>Domestic Short Hair (crossed), 6 years and 11 months, Male</p>
            </div>
            <div class="cat-card">
                <img src="images/cat2.jpg" alt="Silas">
                <h3>Silas</h3>
                <p>Domestic Short Hair (crossed), 3 years and 3 months, Male</p>
            </div>
        </div>

       <!--Pagination-->

            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">&raquo;</a>
            </div>
        </div>

    
    
    
    <!--Footer Section-->

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

