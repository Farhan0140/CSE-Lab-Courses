<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Medicine</title>
    <link rel="stylesheet" href="medicinestyle.css">
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
                <a href="index.php">
                    <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo" class="logo-image">
                </a>
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
                            
                            <a href="Food.php">Food</a>
                            <a href="Accessories.php">Accessories</a>
                            <a href="toys.php">Toys</a>
                            <a href="medicine.php" class="active">Medicine</a>
                        </div>
                    </div>
                </div>
                <a href="index.php#reviews">Reviews</a>
                <a href="index.php#about-section">About</a>
                
            </div>
            <div class="actions">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" id="logoutBtn">Sign out</a>
                <?php else: ?>
                    <a href="login.php" id="loginBtn">Sign in</a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="shop-container">
        <div class="filter-section">
            <h3>Filter by Price</h3>
            <ul>
                <li><a href="#">৳0 - ৳50</a></li>
                <li><a href="#">৳51 - ৳100</a></li>
                <li><a href="#">Above ৳100</a></li>
            </ul>
        </div>
        <div class="product-grid">
            <!-- Product Cards -->
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

    <!-- Cat Medicine Details -->
    <section class="details-section">
        <h2>Complete Cat Medicine Solution</h2>
        <p>
            At PETOPIA, we provide a variety of cat medicines to ensure your pet's health and well-being. Explore our collection of supplements, sprays, and oral care solutions tailored for your furry friend.
        </p>
    </section>

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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productGrid = document.querySelector(".product-grid");

            // Function to fetch and display products
            function fetchProducts(params = "") {
                fetch(`cat_medicine_backend.php?action=list${params}`)
                    .then((response) => response.json())
                    .then((products) => {
                        productGrid.innerHTML = ""; // Clear existing content
                        if (products.length === 0) {
                            productGrid.innerHTML = "<p>No medicines found for the selected criteria.</p>";
                            return;
                        }
                        products.forEach((product) => {
                            // Create product card dynamically
                            const productCard = `
                        <div class="product-card" data-id="${product.medicine_id}">
                            <img src="${product.image_url}" alt="${product.name}">
                            <h3>${product.name}</h3>
                            <p>
                                <span class="price">৳${product.price}</span>
                                <span class="discount">${product.discount_price ? "৳" + product.discount_price : ""}</span>
                            </p>
                        </div>`;
                            productGrid.innerHTML += productCard;
                        });

                        // Add click event to each product card
                        document.querySelectorAll(".product-card").forEach((card) => {
                            card.addEventListener("click", function() {
                                const medicineId = this.getAttribute("data-id");
                                showProductDetails(medicineId);
                            });
                        });
                    })
                    .catch((error) => {
                        console.error("Error fetching medicines:", error);
                    });
            }

            // Initial fetch
            fetchProducts();

            // Filter by price
            document.querySelectorAll(".filter-section a").forEach((link) => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const priceRange = this.textContent.trim();
                    let params = "";
                    if (priceRange === "৳0 - ৳50") {
                        params = "&min_price=0&max_price=50";
                    } else if (priceRange === "৳51 - ৳100") {
                        params = "&min_price=51&max_price=100";
                    } else if (priceRange === "Above ৳100") {
                        params = "&min_price=101";
                    }
                    fetchProducts(params);
                });
            });

            function showProductDetails(medicineId) {
                fetch(`cat_medicine_backend.php?medicine_id=${medicineId}`)
                    .then((response) => response.json())
                    .then((product) => {
                        const detailsSection = document.querySelector(".details-section");
                        detailsSection.innerHTML = `
                        <h2>${product.name}</h2>
                        <img src="${product.image_url}" alt="${product.name}">
                        <p><strong>Type:</strong> ${product.type}</p>
                        <p><strong>Brand:</strong> ${product.brand}</p>
                        <p><strong>Description:</strong> ${product.description}</p>
                        <p><span class="price">৳${product.price}</span></p>
                        <button class="buy-button">Buy Now</button>
                    `;
                        detailsSection.scrollIntoView({
                            behavior: "smooth"
                        });
                    })
                    .catch((error) => console.error("Error fetching details:", error));
            }

            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("buy-button")) {
                    alert("Thank you for purchasing the medicine!");
                }
            });
        });
    </script>

    </script>
</body>

</html>