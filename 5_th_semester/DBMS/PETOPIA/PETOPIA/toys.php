<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Toys - PETOPIA</title>
    <link rel="stylesheet" href="toysstyle.css">
    <style>
        .buy-button {
            background-color: #FF7F50;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 24px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-transform: uppercase;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            display: inline-block;
        }

        .buy-button:hover {
            background-color: #FF6347;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .buy-button:focus {
            outline: none;
        }

        .buy-button:active {
            background-color: #FF4500;
            transform: translateY(2px);
        }
    </style>
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
                <a href="#home">Home</a>
                <div class="dropdown">
                    <a href="#" class="shop-link active">Shop</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                           
                            
                            <a href="Food.php"  >Food</a>
                            <a href="Accessories.php">Accessories</a>
                           <a href="toys.php" class ="active">Toys</a>
                           <a href="medicine.php">Medicine</a>

                             </div>
                    </div>
                </div>
                <a href="index.html#reviews">Reviews</a>
                <a href="index.html#about-section">About</a>
                
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


    <!-- Toys Section -->

        
              <div class="filter-section">
                <h3>Filter by Price</h3>
                   <ul>
        <li><a href="#" data-price="0-100">৳0 - ৳100</a></li>
        <li><a href="#" data-price="101-500">৳101 - ৳500</a></li>
        <li><a href="#" data-price="500-999999">Above ৳500</a></li>
    </ul>
            </div>
            <section class="shop-section">
                <h1>Cat Toys</h1>
                <p>Explore a wide range of cat toys at PETOPIA. Find the best deals and make your cats happy!</p>

            <div class="product-grid">
                
                
            </div>
            <div class="details-section">
            <!-- Accessory details will be shown here -->
        </div>
        </section>
    
  

    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&raquo;</a>
    </div>


    
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
            <li><a href="Cat.php">Cat</a></li>
            <li><a href="Food.php">Food</a></li>
            <li><a href="medicine.php">Medicine</a></li>
        </ul>
    </div>

        <!-- Quick Links Section -->
        <div class="footer-section quick-links">
            <h3>Quick Links</h3>
            <ul>
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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productGrid = document.querySelector(".product-grid");
            const filterLinks = document.querySelectorAll(".filter-section a");

            // Fetch toys from the backend
                // Fetch toys from the backend
    function fetchToys(priceRange = "") {
        const url = priceRange ? `cat_toys_backend.php?action=list&price_range=${priceRange}` : "cat_toys_backend.php?action=list";
        fetch(url)
            .then((response) => response.json())
            .then((toys) => {
                productGrid.innerHTML = "";
                toys.forEach((toy) => {
                    const productCard = `
                        <div class="product-card" data-id="${toy.toy_id}">
                            <img src="${toy.image_url}" alt="${toy.name}">
                            <h3>${toy.name}</h3>
                            <p>
                                <span class="price">৳${toy.price}</span>
                                <span class="discount">৳${toy.discount_price}</span>
                            </p>
                        </div>`;
                    productGrid.innerHTML += productCard;
                });

                // Add click event to each product card
                document.querySelectorAll(".product-card").forEach((card) => {
                    card.addEventListener("click", function() {
                        const toyId = this.getAttribute("data-id");
                        showToyDetails(toyId);
                    });
                });
            })
            .catch((error) => {
                console.error("Error fetching toys:", error);
            });
    }

    // Handle filter click
    filterLinks.forEach((link) => {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            const priceRange = this.getAttribute("data-price");
            fetchToys(priceRange); // Fetch toys based on the selected price range
        });
    });

    // Initially load all toys
    fetchToys();
});
        function showToyDetails(toy_id) {
            // Fetch details of the selected toy
            fetch(`cat_toys_backend.php?toy_id=${toy_id}`)
                .then((response) => response.json())
                .then((cat_toys) => {
                    const detailsSection = document.querySelector(".details-section");
                    detailsSection.innerHTML = `
                        <h2>${cat_toys.name}</h2>
                        <img src="${cat_toys.image_url}" alt="${cat_toys.name}">
                        <p><strong>Type:</strong> ${cat_toys.type}</p>
                        <p><strong>Brand:</strong> ${cat_toys.brand}</p>
                        <p><strong>Description:</strong> ${cat_toys.description}</p>
                        <p><span class="price">৳${cat_toys.price}</span></p>
                        <button class="buy-button">Buy Now</button>
                    `;

                    detailsSection.scrollIntoView({
                        behavior: "smooth"
                    });
                })
                .catch((error) => {
                    console.error("Error fetching toy details:", error);
                });
        }

       

    </script>

</body>

</html>