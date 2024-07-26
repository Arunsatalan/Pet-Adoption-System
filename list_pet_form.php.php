<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Pet - Pet Pals</title>
    <link rel="stylesheet" href="styles.css">
    <style>
            body {
        font-family: Arial, sans-serif;
        background-image: url('./background_image/bg.jpg'); /* Replace with your image path */
        background-size: cover; /* Cover the entire background */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Prevent repeating the image */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .container {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        background-color: #d1f8e0; /* Lighter background color */
        border-radius: 8px;
        border: 2px solid #4caf50; /* Green border color */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 0 auto; /* Center the container */
    }
    form {
        display: flex;
        flex-direction: column;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px; /* Space between items */
    }
    .form-row > div {
        flex: 1;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #000000;
        display: block;
    }
    input[type="text"],
    input[type="email"],
    input[type="file"] {
        padding: 10px;
        margin-bottom: 5px; /* Reduced margin to fit in the same row */
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }
    input[type="radio"] {
        margin-right: 5px;
    }
    button {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        color: #fff;
        background-color: #4caf50; /* Adjusted button color to match border */
        cursor: pointer;
        font-size: 16px;
    }
    button[type="button"] {
        background-color: #6c757d;
    }
    button:hover {
        opacity: 0.9;
    }
    @media (max-width: 600px) {
        .container {
            padding: 15px;
        }
        button {
            font-size: 14px;
            padding: 8px 12px;
        }
    }
</style>
<!-- Include your CSS here -->
</head>
<body>
    <div class="container">
        <h2>Donate Pet</h2>
        <form action="save_pet.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pet_name">Pet Name:</label>
                <input type="text" id="pet_name" name="pet_name" required>
            </div>

            <div class="form-group">
                <label for="pet_age">Pet Age:</label>
                <input type="text" id="pet_age" name="pet_age" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Vaccinate:</label>
                    <input type="radio" id="vaccinate_yes" name="vaccinate" value="yes" required> Yes
                    <input type="radio" id="vaccinate_no" name="vaccinate" value="no" required> No
                </div>

                <div class="form-group">
                    <label>Trained:</label>
                    <input type="radio" id="trained_yes" name="trained" value="yes" required> Yes
                    <input type="radio" id="trained_no" name="trained" value="no" required> No
                </div>

                <div class="form-group">
                    <label>Category:</label>
                    <input type="radio" id="category_cat" name="category" value="cat" required> Cat
                    <input type="radio" id="category_dog" name="category" value="dog" required> Dog
                </div>
            </div>

            <div class="form-group">
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required>
            </div>

            <div class="form-group">
                <label for="colour">Colour:</label>
                <input type="text" id="colour" name="colour" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="pet_image">Upload Your Pet Image:</label>
                <input type="file" id="pet_image" name="pet_image" required>
            </div>

            <div style="text-align: center;">
                <button type="submit">ADD</button>
                <button type="button" onclick="window.location.href='index.html'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
