document.addEventListener('DOMContentLoaded', () => {
    fetchItems(); // Load items when the page is loaded

    document.getElementById('createItemForm').addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        try {
            const response = await fetch('crud.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            console.log(result); // Handle response
            if (result.status === 'success') {
                fetchItems(); // Reload items
                document.getElementById('createItemForm').reset(); // Reset form
                document.getElementById('createForm').style.display = 'none'; // Hide form
            } else {
                alert(result.message); // Show error message
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });

    document.getElementById('editItemForm').addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);

        try {
            const response = await fetch('crud.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            console.log(result); // Handle response
            if (result.status === 'success') {
                fetchItems(); // Reload items
                document.getElementById('editItemForm').reset(); // Reset form
                document.getElementById('editForm').style.display = 'none'; // Hide form
            } else {
                alert(result.message); // Show error message
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
});

function showCreateForm() {
    document.getElementById('createForm').style.display = 'block';
    document.getElementById('editForm').style.display = 'none'; // Hide edit form
}

function showEditForm(item) {
    document.getElementById('editId').value = item.id;
    document.getElementById('editName').value = item.name;
    document.getElementById('editType').value = item.type;
    document.getElementById('editAge').value = item.age;
    document.getElementById('editNotes').value = item.notes;

    document.getElementById('editForm').style.display = 'block';
    document.getElementById('createForm').style.display = 'none'; // Hide create form
}

async function fetchItems() {
    try {
        const response = await fetch('crud.php?fetch=1');
        const items = await response.json();
        const itemsContainer = document.getElementById('crudItems');
        itemsContainer.innerHTML = '<h2>Already Created Items</h2>';

        items.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('crud-item');
            itemDiv.innerHTML = `
                <img src="img/${item.image}" alt="Item Image" style="width: 100px;">
                <div class="crud-item-details">
                    <p><strong>Name:</strong> ${item.name}</p>
                    <p><strong>Type:</strong> ${item.type}</p>
                    <p><strong>Age:</strong> ${item.age}</p>
                    <p><strong>Notes:</strong> ${item.notes}</p>
                </div>
                <div class="edit-delete-buttons">
                    <button onclick='showEditForm(${JSON.stringify(item)})'>Edit</button>
                    <button onclick="deleteItem(${item.id})">Delete</button>
                </div>
            `;
            itemsContainer.appendChild(itemDiv);
        });
    } catch (error) {
        console.error('Error fetching items:', error);
    }
}

async function deleteItem(itemId) {
    if (confirm('Are you sure you want to delete this item?')) {
        try {
            const response = await fetch('crud.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({ id: itemId })
            });
            const result = await response.json();
            console.log(result); // Handle response
            if (result.status === 'success') {
                fetchItems(); // Reload items
            } else {
                alert(result.message); // Show error message
            }
        } catch (error) {
            console.error('Error deleting item:', error);
        }
    }
}
