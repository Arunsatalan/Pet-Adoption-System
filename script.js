function showCreateForm() {
    var createForm = document.getElementById('createForm');
    if (createForm.style.display === 'none') {
createForm.style.display = 'block';
} else {
createForm.style.display = 'none';
}
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