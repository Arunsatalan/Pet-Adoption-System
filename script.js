// Function to fetch and display items

async function fetchItems() {
    try {
        const response = await fetch('fetch_items.php');
        const result = await response.json();

        console.log('Fetched result:', result); // Debug line to check fetched data

        const itemsContainer = document.getElementById('crudItems');
        itemsContainer.innerHTML = '<h2>Already Created Items</h2>';

        if (result.status === 'success') {
            result.data.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('crud-item');
                itemDiv.innerHTML = `
                    <img src="img/${item.pet_image}" alt="Item Image" style="width: 100px;">
                    <div class="crud-item-details">
                        <p><strong>Name:</strong> ${item.pet_name}</p>
                        <p><strong>Age:</strong> ${item.pet_age}</p>
                        <p><strong>Vaccinate:</strong> ${item.vaccinate}</p>
                        <p><strong>Trained:</strong> ${item.trained}</p>
                        <p><strong>Category:</strong> ${item.category}</p>
                        <p><strong>Breed:</strong> ${item.breed}</p>
                        <p><strong>Colour:</strong> ${item.colour}</p>
                        <p><strong>Location:</strong> ${item.location}</p>
                        <p><strong>Email:</strong> ${item.email}</p>
                        <p><strong>Phone:</strong> ${item.phone}</p>
                    </div>
                    <div class="edit-delete-buttons">
                        <button onclick='showEditForm(${JSON.stringify(item)})'>Edit</button>
                        <button onclick="deleteItem(${item.id})">Delete</button>
                    </div>
                `;
             
                itemsContainer.appendChild(itemDiv);
            });
        } else {
            itemsContainer.innerHTML = `<p>Error fetching items: ${result.message}</p>`;
        }
    } catch (error) {
        console.error('Error fetching items:', error);
    }
}

fetchItems(); // Call the function to execute it


// Function to delete an item
async function deleteItem(id) {
    if (!confirm('Are you sure you want to delete this item?')) {
        return;
    }

    try {
        const response = await fetch('delete_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ id: id })
        });

        const result = await response.json();

        if (result.status === 'success') {
            alert(result.message);
            fetchItems(); // Refresh the list of items
        } else {
            alert(`Error: ${result.message}`);
        }
    } catch (error) {
        console.error('Error deleting item:', error);
    }
}











function showEditForm(item) {
    const editFormContainer = document.getElementById('editFormContainer');
    editFormContainer.innerHTML = `
        <h2>Edit Pet Details</h2>
        <form id="editPetForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pet_id" value="${item.id}">
            <div class="form-group">
                <label for="pet_name">Pet Name:</label>
                <input type="text" id="pet_name" name="pet_name" value="${item.pet_name}" required>
            </div>
            <div class="form-group">
                <label for="pet_age">Pet Age:</label>
                <input type="text" id="pet_age" name="pet_age" value="${item.pet_age}" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Vaccinate:</label>
                    <input type="radio" id="vaccinate_yes" name="vaccinate" value="yes" ${item.vaccinate === 'yes' ? 'checked' : ''} required> Yes
                    <input type="radio" id="vaccinate_no" name="vaccinate" value="no" ${item.vaccinate === 'no' ? 'checked' : ''} required> No
                </div>
                <div class="form-group">
                    <label>Trained:</label>
                    <input type="radio" id="trained_yes" name="trained" value="yes" ${item.trained === 'yes' ? 'checked' : ''} required> Yes
                    <input type="radio" id="trained_no" name="trained" value="no" ${item.trained === 'no' ? 'checked' : ''} required> No
                </div>
                <div class="form-group">
                    <label>Category:</label>
                    <input type="radio" id="category_cat" name="category" value="cat" ${item.category === 'cat' ? 'checked' : ''} required> Cat
                    <input type="radio" id="category_dog" name="category" value="dog" ${item.category === 'dog' ? 'checked' : ''} required> Dog
                </div>
            </div>
            <div class="form-group">
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" value="${item.breed}" required>
            </div>
            <div class="form-group">
                <label for="colour">Colour:</label>
                <input type="text" id="colour" name="colour" value="${item.colour}" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="${item.location}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="${item.email}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="${item.phone}" required>
            </div>
          
            <button type="submit">Update</button>
            <button type="button" onclick="closeEditForm()">Cancel</button>
        </form>
    `;

    // Attach event listener for the form submission
    document.getElementById('editPetForm').addEventListener('submit', async (event) => {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(event.target);

        try {
            const response = await fetch('update.php', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();
            console.log('Response:', result);

            if (result.status === 'success') {
                alert(result.message);
                closeEditForm();
                fetchItems(); // Refresh the list of items
            } else {
                alert(`Error: ${result.message}`);
            }
        } catch (error) {
            console.error('Error updating item:', error);
        }
    });
}
