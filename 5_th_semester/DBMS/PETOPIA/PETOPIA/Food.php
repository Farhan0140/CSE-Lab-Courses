<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link rel="stylesheet" href="foodstyle.css">
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
                            <a href="Cat.php">Cat</a>
                            <a href="Food.php" class="active">Food</a>
                            <a href="Accessories.php">Accessories</a>
                            <a href="toys.php">Toys</a>
                            <a href="medicine.php">Medicine</a>

                        </div>
                    </div>
                </div>
                <a href="index.php#reviews">Reviews</a>
                <a href="index.#about-section">About</a>
                
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

    <!-- Main Content -->

    <div class="shop-container">
        <div class="filter-section">
            <h3>Filter by Price</h3>
            <ul>
                <li><a href="#">৳0 - ৳100</a></li>
                <li><a href="#">৳101 - ৳500</a></li>
                <li><a href="#">Above ৳500</a></li>
            </ul>
        </div>
        <div class="product-grid">

            <!-- Product Cards -->
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <a href="#" id="prev-page">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#" id="page-2">2</a>
        <a href="#" id="page-3">3</a>
        <a href="#" id="page-4">4</a>
        <a href="#" id="next-page">&raquo;</a>
    </div>

    <!-- Cat Food Details -->
    <section class="details-section">
        <h2>Complete Cat Food Solution</h2>
        <p>
            At PETOPIA, we offer a wide range of cat food products tailored to meet your pet's nutritional needs. From premium dry foods to delicious wet meals, you'll find everything you need for your furry friend.
        </p>
    </section>
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
            function fetchProducts(priceMin = null, priceMax = null) {
                let url = "pet_foods_backend.php?action=list";
                if (priceMin !== null && priceMax !== null) {
                    url += `&price_min=${priceMin}&price_max=${priceMax}`;
                }

                fetch(url)
                    .then((response) => response.json())
                    .then((products) => {
                        productGrid.innerHTML = ""; // Clear existing content
                        if (products.length === 0) {
                            productGrid.innerHTML = "<p>No products found for the selected filter.</p>";
                        } else {
                            products.forEach((product) => {
                                const productCard = `
                            <div class="product-card" data-id="${product.food_id}">
                                <img src="${product.image_url}" alt="${product.name}">
                                <h3>${product.name}</h3>
                                <p>
                                    <span class="price">৳${product.price}</span>
                                    <span class="discount">৳${product.discount_price}</span>
                                </p>
                            </div>`;
                                productGrid.innerHTML += productCard;
                            });

                            // Add click event to each product card
                            document.querySelectorAll(".product-card").forEach((card) => {
                                card.addEventListener("click", function() {
                                    const foodId = this.getAttribute("data-id");
                                    showProductDetails(foodId);
                                });
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Error fetching products:", error);
                    });

            }


            // Initial fetch for all products
            fetchProducts();

            // Filter by price
            document.querySelectorAll(".filter-section ul li a").forEach((filterLink) => {
                filterLink.addEventListener("click", function(e) {
                    e.preventDefault();
                    const priceRange = this.textContent.trim();
                    let priceMin, priceMax;

                    if (priceRange === "৳0 - ৳100") {
                        priceMin = 0;
                        priceMax = 100;
                    } else if (priceRange === "৳101 - ৳500") {
                        priceMin = 101;
                        priceMax = 500;
                    } else if (priceRange === "Above ৳500") {
                        priceMin = 501;
                        priceMax = Infinity;
                    }

                    // Fetch and display filtered products
                    fetchProducts(priceMin, priceMax);
                });
            });

            // Function to show product details
            function showProductDetails(foodId) {
                fetch(`pet_foods_backend.php?food_id=${foodId}`)
                    .then((response) => response.json())
                    .then((product) => {
                        const detailsSection = document.querySelector(".details-section");
                        detailsSection.innerHTML = `
                    <h2>${product.name}</h2>
                    <img src="${product.image_url}" alt="${product.name}">
                    <p><strong>Brand:</strong> ${product.brand}</p>
                    <p><strong>Type:</strong> ${product.type}</p>
                    <p><strong>Nutrition Details:</strong> ${product.nutrition_details}</p>
                    <p><strong>Recommended For:</strong> ${product.recommended_for}</p>
                    <p><span class="price">৳${product.price}</span></p>
                    <button class="buy-button">Buy Now</button>`;
                        detailsSection.scrollIntoView({
                            behavior: "smooth"
                        });
                    })
                    .catch((error) => {
                        console.error("Error fetching product details:", error);
                    });
            }
            document.querySelector(".buy-button").addEventListener("click", function() {
                // Check if the user is logged in
                const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

                if (isLoggedIn) {
                    // User is logged in, proceed with purchase
                    const foodId = this.closest('.product-card').getAttribute('data-id');
                    const userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;

                    // Send an AJAX request to handle the purchase
                    fetch('process_purchase.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                food_id: foodId,
                                user_id: userId,
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert("Purchase successful!");
                                // You can also update the UI if needed, e.g., show in the admin dashboard
                            } else {
                                alert("An error occurred while processing your purchase.");
                            }
                        })
                        .catch(error => {
                            console.error("Error processing purchase:", error);
                            alert("An error occurred while processing your purchase.");
                        });
                } else {
                    // User is not logged in, show message
                    alert("You must log in first to make a purchase.");
                }
            });

        });
    </script>




</body>

</html>