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
                <button onclick="showCreateForm()">Create New Item</button>
            </section>

            <!-- CRUD Section -->
            <section class="crud-section" id="crudSection">
                <!-- Create Form (Initially Hidden) -->
                <div id="createForm" style="display: none;">
                    <h2>Create New Item</h2>
                    <form id="createItemForm" enctype="multipart/form-data">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" required><br>

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required><br>

                        <label for="type">Type:</label>
                        <input type="text" id="type" name="type" required><br>

                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" required><br>
                        
                        <label for="notes">Notes:</label><br>
                        <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>
                        <button type="submit">Create</button>
                    </form>
                </div>

                <!-- Edit Form (Initially Hidden) -->
                <div id="editForm" style="display: none;">
                    <h2>Edit Item</h2>
                    <form id="editItemForm" enctype="multipart/form-data">
                        <input type="hidden" id="editId" name="id">
                        <label for="editImage">Image:</label>
                        <input type="file" id="editImage" name="image"><br>

                        <label for="editName">Name:</label>
                        <input type="text" id="editName" name="name" required><br>

                        <label for="editType">Type:</label>
                        <input type="text" id="editType" name="type" required><br>

                        <label for="editAge">Age:</label>
                        <input type="number" id="editAge" name="age" required><br>
                        
                        <label for="editNotes">Notes:</label><br>
                        <textarea id="editNotes" name="notes" rows="4" cols="50"></textarea><br>
                        <button type="submit">Update</button>
                    </form>
                </div>

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
