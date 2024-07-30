<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Find A Pet</title>
   <link rel="stylesheet" type="text/css" href="./Css/style.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
   <!-----------Navbar--------->
   <nav class="navbar navbar-light ">
      <a class="navbar-brand" href="#">
         <img src="./Images/Logo.svg" alt="" width="300" height="100">
      </a>
      <ul class="nav justify-content-end">
         <li class="nav-item">
            <a class="link" aria-current="page" href="#">Home</a>
         </li>
         <li class="nav-item">
            <a class="link" href="#">About</a>
         </li>
         <li class="nav-item">
            <a class="link" href="#">List a Pet</a>
         </li>
         <li class="nav-item">
            <a class="link active" href="index.php">Find a Pet</a>
         </li>
         <li class="nav-item">
            <a class="link text-success fw-bold" href="#">Log in / Register</a>
         </li>
      </ul>
      <button class="navbar-toggler" type="button">
         <span class="navbar-toggler-icon fw-bold"></span>
      </button>
   </nav>

   <!-----------Content--------->
   <div class="Container">
      <!-- <div class="inputs">
         <h2>Find Your Pet</h2>
         <label for="type">Choose a Pet Type:</label><br>
         <input type="text" id="type" name="type"><br><br>
         <label for="gender">Choose Gender:</label><br>
         <input type="text" id="gender" name="gender"><br><br>
         <label for="location">Location:</label><br>
         <input type="text" id="location" name="location"><br><br>
         <button id="apply-filters">Apply Filters</button>
      </div> -->
      <div id="pet-cards-container"></div>
   </div>

   <div class="footer">
      <a href="#">About</a><br>
      <a href="#">Career</a><br>
      <a href="#">Contact Us</a>
   </div>

   <script src="PetData.js"></script>
   <script src="Script1.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
