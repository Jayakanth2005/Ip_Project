<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Book - Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Side Nav Bar Styles */
        body {
            background-color: #ffde59;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #FF6347;
            padding-top: 60px;
            transition: 0.5s;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #FFD700;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            cursor: pointer;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #FF6347;
            color: white;
            border: none;
            padding: 10px 15px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1;
            border-radius: 5px;
            transition: 0.5s;
        }

        /* Container styling */
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #FF6347;
            text-align: center;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            width: 100%;
        }

        #previewImage {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            display: block;
            margin: 10px auto;
        }

        .form-group {
            margin-top: 20px;
        }

        /* Purpose Text Area */
        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <!-- Side Navigation Menu -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="index.php">Register</a>
        <a href="people.php">Log Page</a>
    </div>

    <!-- Open Button to Toggle Side Nav -->
    <span class="openbtn" onclick="openNav()">☰ Menu</span>

    <!-- Form Container -->
    <div class="container">
        <h1>Add Your Details</h1>
        <form id="addressForm" action="submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="imageUpload">Upload Photo</label>
                <input type="file" class="form-control-file" id="imageUpload" name="imageUpload" accept="image/*" required>
                <img id="previewImage" src="" alt="Image Preview" />
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Purpose</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <!-- New "Purpose" Text Field -->
            <!-- <div class="form-group">
                <label for="purpose">Purpose</label>
                <input type="text" class="form-control" id="purpose" name="purpose" required>
            </div> -->
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    <!-- JavaScript to Handle Image Preview -->
    <script>
        // Handle image preview
        const imageInput = document.getElementById('imageUpload');
        const previewImage = document.getElementById('previewImage');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                previewImage.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });

        // Open and close side nav
        function openNav() {
            document.getElementById("mySidenav").style.left = "0";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-250px";
        }
    </script>

</body>
</html>
