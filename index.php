<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile and CRUD Example</title>
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-wrapper">
        <!-- Header Section -->
        <header>
            <div class="left-header">
                <img src="pictures/pet-shop-silhouette-logo-illustration-free-vector__1_-removebg-preview.png" alt="Site Logo" class="site-logo">
            </div>
            <div class="middle-header">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">List Pet</a>
                <a href="#">Find a Pet</a>
            </div>
            <div class="right-header">
                <button class="auth-button">
                    <img src="pictures/user-sign-white-icon-vector-15479703-removebg-preview.png" alt="Logo" class="auth-logo"> Login/Register
                </button>
            </div>
        </header>

        <main class="container">
            <!-- Profile Section -->
            <section class="profile-section">
                <div class="profile-details">
                    <img src="path_to_profile_image.jpg" alt="Profile Picture">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@example.com</p>
                </div>

                <a href="list_pet_form.php" class="button-link">
                    <button>Create New Item</button>
                </a>
            </section>

            <!-- CRUD Section -->
            <section class="crud-section" id="crudSection">
                <!-- Create Form (Initially Hidden) -->
                <div id="createForm" style="display: none;">
                    <h2 id="formTitle">Create New Item</h2>
                    <form id="createItemForm" enctype="multipart/form-data">
                        <!-- Form fields will be dynamically added here -->
                        <button type="submit">Save Changes</button>
                    </form>
                </div>

                <div id="editFormContainer"></div>

                <!-- Already Created Items Section -->
                <div id="crudItems">
                    <h2>Already Created Items</h2>
                    <!-- Existing items will be added dynamically here -->
                </div>
            </section>
        </main>
        
        <!-- Footer Section -->
        <footer>
            <div class="footer-section">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Feedback</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>List a Pet</h3>
            </div>
            <div class="footer-section">
                <h3>Find a Pet</h3>
            </div>
            <div class="footer-section">
                <h3>My Account</h3>
                <ul>
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>
