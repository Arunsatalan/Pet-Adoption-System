// Function to toggle display of create form
function showCreateForm() {
    var createForm = document.getElementById('createForm');
    if (createForm.style.display === 'none') {
        createForm.style.display = 'block';
    } else {
        createForm.style.display = 'none';
    }
}

// Function to fetch existing items from server
function fetchItems() {
    fetch('crud.php')
        .then(response => response.json())
        .then(data => {
            addItemsToDOM(data);
        })
        .catch(error => console.error('Error fetching items:', error));
}

// Function to add new item
document.getElementById('addItemForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('crud.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        addNewItemToDOM(data);
        document.getElementById('addItemForm').reset(); // Reset form after submission
    })
    .catch(error => console.error('Error adding item:', error));
});

// Function to add new item to DOM dynamically
function addNewItemToDOM(item) {
    var crudItemsDiv = document.getElementById('crudItems');

    var itemHtml = `
        <div class="crud-item">
            <img src="${item.image}" alt="Item Image">
            <div class="crud-item-details">
                <p><strong>Name:</strong> ${item.name}</p>
                <p><strong>Type:</strong> ${item.type}</p>
                <p><strong>Age:</strong> ${item.age}</p>
                <p><strong>Notes:</strong> ${item.notes}</p>
            </div>
            <div class="edit-delete-buttons">
                <button onclick="editItem(${item.id})">Edit</button>
                <button onclick="deleteItem(${item.id})">Delete</button>
            </div>
        </div>
    `;

    crudItemsDiv.innerHTML += itemHtml;
}

// Initial fetch of items on page load
fetchItems();

// Placeholder functions for edit and delete (to be implemented)
function editItem(itemId) {
    // Handle edit functionality
    alert('Edit functionality to be implemented for item ID: ' + itemId);
}

function deleteItem(itemId) {
    // Handle delete functionality
    alert('Delete functionality to be implemented for item ID: ' + itemId);
}
