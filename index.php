<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile and CRUD Example</title>
   
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

    <script>
        function showCreateForm() {
            var createForm = document.getElementById('createForm');
            createForm.style.display = 'block';
        }

        // Simulated data for existing items (replace with actual dynamic data)
        var existingItems = [
            { id: 1, name: 'Item 1', type: 'Type A', notes: 'Some notes about Item 1', image: 'item1.jpg' },
            { id: 2, name: 'Item 2', type: 'Type B', notes: 'Some notes about Item 2', image: 'item2.jpg' }
            // Add more items as needed
        ];

        // Function to add items to the DOM
        function addItemsToDOM() {
            var crudItemsDiv = document.getElementById('crudItems');
            crudItemsDiv.innerHTML = ''; // Clear previous content

            existingItems.forEach(function(item) {
                var itemHtml = `
                    <div class="crud-item">
                        <img src="${item.image}" alt="Item Image">
                        <div class="crud-item-details">
                            <p><strong>Name:</strong> ${item.name}</p>
                            <p><strong>Type:</strong> ${item.type}</p>
                            <p><strong>ID:</strong> #${item.id}</p>
                            <p><strong>Notes:</strong> ${item.notes}</p>
                        </div>
                        <div class="edit-delete-buttons">
                            <button onclick="editItem(${item.id})">Edit</button>
                            <button onclick="deleteItem(${item.id})">Delete</button>
                        </div>
                    </div>
                `;
                crudItemsDiv.innerHTML += itemHtml;
            });
        }

        // Initial call to populate existing items
        addItemsToDOM();

        // Placeholder functions for edit and delete (to be implemented)
        function editItem(itemId) {
            // Handle edit functionality
            alert('Edit functionality to be implemented for item ID: ' + itemId);
        }

        function deleteItem(itemId) {
            // Handle delete functionality
            alert('Delete functionality to be implemented for item ID: ' + itemId);
        }
    </script>
</body>
</html>
