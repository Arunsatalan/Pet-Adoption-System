<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile and CRUD Example</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
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
                <form action="process_create.php" method="POST" enctype="multipart/form-data">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image"><br>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br>
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type"><br>
                    <label for="notes">Notes:</label><br>
                    <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>
                    <button type="submit">Create</button>
                </form>
            </div>

            <!-- Already Created Items Section -->
            <div id="crudItems">
                <h2>Already Created Items</h2>
                <!-- Existing items will be added dynamically here -->
            </div>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>
