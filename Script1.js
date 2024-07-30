document.addEventListener('DOMContentLoaded', () => {
  const navItem = document.querySelector(".justify-content-end");
  const container = document.querySelector(".Container");
  const btn = document.querySelector(".navbar-toggler");

  btn.addEventListener("click", () => {
    navItem.style.visibility = "visible";
    container.style.marginTop = "180px";
  });

  const createPetCard = (pet) => {
    const card = document.createElement('div');
    card.className = 'card-container';

    card.innerHTML = `
    
      <img src="img/${pet.pet_image}" class="img" alt="pet" style="width: 100px; height: 100px;">

      <h3>Pet Name: ${pet.pet_name}</h3>
      <h3>Pet Type: ${pet.category}</h3>
      <h3>Gender: ${pet.gender || 'Not Specified'}</h3>
      <h3>Breed: ${pet.breed}</h3>
      <h3>Age: ${pet.pet_age}</h3>
      <p><strong>Colour:</strong> ${pet.colour}</p>
      <p><strong>Location:</strong> ${pet.location}</p>
      <p><strong>Email:</strong> ${pet.email}</p>
      <p><strong>Phone:</strong> ${pet.phone}</p>
      <button class="primary" ${!pet.available ? 'disabled' : ''}>
        Adopt Now
      </button>
    `;

    card.querySelector('button').addEventListener('click', () => {
      alert(`You have selected to adopt ${pet.pet_name}`);
    });

    return card;
  };

  const displayPetCards = (pets) => {
    const container = document.getElementById('pet-cards-container');
    container.innerHTML = '';

    if (pets.length === 0) {
      container.innerHTML = '<div class="not-found">No Pets Found Matching.</div>';
    } else {
      pets.forEach(pet => {
        container.appendChild(createPetCard(pet));
      });
    }
  };

  async function fetchItems() {
    try {
      const response = await fetch('fetch_items.php');
      const result = await response.json();

      console.log('Fetched result:', result); // Debug line to check fetched data

      if (result.status === 'success') {
        displayPetCards(result.data);
      } else {
        console.error('Error fetching items:', result.message);
      }
    } catch (error) {
      console.error('Error fetching items:', error);
    }
  }

  fetchItems();
});
