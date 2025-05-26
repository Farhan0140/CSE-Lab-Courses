<?php
session_start();
include('database.php'); // Include database connection

// Check if the user is logged in and has the admin role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $adminLoggedIn = true;
} else {
    $adminLoggedIn = false;
}

// Handle form submission
$messageStatus = null; // To track if the message submission was successful or failed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $service = trim($_POST['service']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if ($name && $email && $service && $phone && $message) {
        // Insert message into the database (assuming a 'messages' table exists)
        $stmt = $conn->prepare("INSERT INTO messages (name, email, service, phone, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $name, $email, $service, $phone, $message);

        if ($stmt->execute()) {
            $messageStatus = 'success'; // Successfully inserted
        } else {
            $messageStatus = 'failed'; // Database error
        }

        $stmt->close();
    } else {
        $messageStatus = 'failed'; // Validation error
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contctstyle.css">
    <script>
        // Show congratulation or failure message
        window.addEventListener('DOMContentLoaded', () => {
            const messageStatus = "<?php echo $messageStatus; ?>";

            if (messageStatus === 'success') {
                alert("🎉 Congratulations! Your message has been sent successfully.");
            } else if (messageStatus === 'failed') {
                alert("❌ Failed to send the message. Please try again.");
            }
        });
    </script>
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
                        <div class="dropdown-submenu">
                            <a href="Cat.php">Cat</a>
                            
                            <a href="Food.php">Food</a>
                            
                            <a href="Accessories.php">Accessories</a>
                           <a href="toys.php">Toys</a>
                           <a href="medicine.php">Medicine</a>

                             </div>
                    </div>
                </div>


                <a href="#reviews">Reviews</a>
                <a href="#about-section">About</a>
                <div class="dropdown">
                    <a href="#" class="services-link">Services</a>
                    <div class="dropdown-content">
                        <div class="dropdown-submenu">
                            <a href="Buy&Sell.php">Buy&Sell</a>
                            
                            <a href="adoption.php">Adoption</a>
                            
                            <a href="hlthchk.php">Health Checkup</a>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="actions">

                <a href="login.php" id="myAccountBtn">Sign in</a>
                <a href="cart.php">Cart</a>
                <a href="contact.php" class="contact active">&#128222; Contact</a>


            </div>
        </div>
    </div>


    <!--Contact-->

    <div class="contact-container">
        <h1>Get in Touch</h1>
        <form class="contact-form">
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Your Name*" required>
                <span class="error">The text field is required.</span>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Your E-mail*" required>
                <span class="error">The text field is required.</span>
            </div>
            <div class="form-group">
                <select id="service" name="service" required>
                    <option value="" disabled selected>Select a Service</option>
                    <option value="consultation">Consultation</option>
                    <option value="support">Support</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" id="phone" name="phone" placeholder="Your Phone*" required>
                <span class="error">Only numbers are required.</span>
            </div>
            <div class="form-group">
                <textarea id="message" name="message" rows="4" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
    
    <script>
        document.querySelector('.contact-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission for validation
            const form = e.target;
    
            // Clear all previous errors
            form.querySelectorAll('.error').forEach(error => error.style.display = 'none');
            
            let isValid = true;
    
            // Validate Name
            const nameInput = form.querySelector('#name');
            if (!nameInput.value.trim()) {
                showError(nameInput, 'The text field is required.');
                isValid = false;
            }
    
            // Validate Email
            const emailInput = form.querySelector('#email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                showError(emailInput, 'Please enter a valid email address.');
                isValid = false;
            }
    
            // Validate Service Selection
            const serviceInput = form.querySelector('#service');
            if (!serviceInput.value) {
                showError(serviceInput, 'Please select a service.');
                isValid = false;
            }
    
            // Validate Phone
            const phoneInput = form.querySelector('#phone');
            const phoneRegex = /^\d+$/; // Only digits allowed
            if (!phoneRegex.test(phoneInput.value.trim())) {
                showError(phoneInput, 'Only numbers are allowed.');
                isValid = false;
            }
    
            // Validate Message (Optional, but you can make it required)
            const messageInput = form.querySelector('#message');
            if (messageInput.value.trim().length > 0 && messageInput.value.trim().length < 10) {
                showError(messageInput, 'Message must be at least 10 characters.');
                isValid = false;
            }
    
            // Submit the form if all fields are valid
            if (isValid) {
                form.submit();
            }
        });
    
        function showError(inputElement, message) {
            const errorSpan = inputElement.parentElement.querySelector('.error');
            errorSpan.textContent = message;
            errorSpan.style.display = 'block';
        }
    </script>
    




    
<!--Footer Section-->

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


