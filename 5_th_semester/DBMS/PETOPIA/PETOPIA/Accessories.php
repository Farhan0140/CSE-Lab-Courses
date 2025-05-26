<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Accessories</title>
    <link rel="stylesheet" href="accesssstyle.css">
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
                          
                            <div class="submenu-content">
                                <a href="food.php">Food</a>
                                <a href="Accessories.php" class="active">Accessories</a>
                                <a href="toys.php">Toys</a>
                                <a href="medicine.php">Medicine</a>
                            </div>
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

    <!-- Accessories Section -->
    <main>
        <div class="filter-section">
            <h3>Filter by Price</h3>
            <ul>
                <li><a href="#" data-min="0" data-max="100">৳0 - ৳100</a></li>
                <li><a href="#" data-min="101" data-max="500">৳101 - ৳500</a></li>
                <li><a href="#" data-min="500" data-max="">Above ৳500</a></li>
            </ul>

        </div>

        <!-- Product Section -->
        <section class="shop-section">
            <h1>Cat Accessories</h1>
            <p>Find the best accessories for your cat, from harnesses to grooming tools, and more.</p>

            <!-- Product Grid -->
            <div class="product-grid">
                <!-- Products will be dynamically loaded here -->
            </div>
        </section>

        <!-- Details Section -->
        <div class="details-section">
            <!-- Accessory details will be shown here -->
        </div>




        </div>
        </section>
    </main>

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
                <a href="index.php"> <!-- Replace 'index.php' with the actual path to your homepage -->
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
                    <li><a href="#about-section">About Us</a></li>
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

            // Function to fetch and render accessories
            function fetchAccessories(minPrice = null, maxPrice = null) {
                let url = "cat_accessories_backend.php?action=list";
                if (minPrice !== null || maxPrice !== null) {
                    const params = new URLSearchParams();
                    if (minPrice !== null) params.append("min_price", minPrice);
                    if (maxPrice !== null) params.append("max_price", maxPrice);
                    url += `&${params.toString()}`;
                }

                fetch(url)
                    .then((response) => response.json())
                    .then((accessories) => {
                        productGrid.innerHTML = ""; // Clear the grid before rendering
                        accessories.forEach((accessory) => {
                            const productCard = `
                    <div class="product-card" data-id="${accessory.accessories_id}">
                        <img src="${accessory.image_url}" alt="${accessory.name}">
                        <h3>${accessory.name}</h3>
                        <p>
                            <span class="price">৳${accessory.price}</span>
                            ${
                                accessory.discount_price
                                    ? `<span class="discount">৳${accessory.discount_price}</span>`
                                    : ""
                            }
                        </p>
                    </div>`;
                            productGrid.innerHTML += productCard;
                        });

                        // Add click event to each product card
                        document.querySelectorAll(".product-card").forEach((card) => {
                            card.addEventListener("click", function() {
                                const accessoryId = this.getAttribute("data-id");
                                showAccessoryDetails(accessoryId);
                            });
                        });
                    })
                    .catch((error) => {
                        console.error("Error fetching accessories:", error);
                    });
            }

            // Function to show accessory details
            function showAccessoryDetails(accessories_id) {
                fetch(`cat_accessories_backend.php?accessory_id=${accessories_id}`)
                    .then((response) => response.json())
                    .then((accessory) => {
                        const detailsSection = document.querySelector(".details-section");
                        detailsSection.innerHTML = `
                <h2>${accessory.name}</h2>
                <img src="${accessory.image_url}" alt="${accessory.name}">
                <p><strong>Type:</strong> ${accessory.type}</p>
                <p><strong>Brand:</strong> ${accessory.brand}</p>
                <p><span class="price">৳${accessory.price}</span></p>
                <button class="buy-button">Buy Now</button>
            `;

                        detailsSection.scrollIntoView({
                            behavior: "smooth",
                        });
                    })
                    .catch((error) => {
                        console.error("Error fetching accessory details:", error);
                    });
            }

            // Initial fetch of all accessories
            fetchAccessories();

            // Event listener for filter links
            document.querySelectorAll(".filter-section a").forEach((link) => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const minPrice = this.getAttribute("data-min") || null;
                    const maxPrice = this.getAttribute("data-max") || null;
                    fetchAccessories(minPrice, maxPrice);
                });
            });

            // Add click event for "Buy Now" button
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("buy-button")) {
                    alert("Thank you for your purchase!");
                }
            });
        });
    </script>
</body>

</html>