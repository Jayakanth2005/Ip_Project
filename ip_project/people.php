<?php
// Database connection
$host = 'localhost';
$db = 'address';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, phone, email, address, gender, image FROM person";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funky Address Book - People</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Particles background styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #8A2BE2;
            overflow: auto; /* Allow scrolling */
        }

        /* The particles container */
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Set particles behind the content */
        }

        /* Container for the content */
        .container {
            position: relative;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff6347;
            text-align: center;
        }

        .person-details {
            background-color: #E6E6FA;
            padding: 10px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
        }

        .person-details img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .btn-group {
            margin-left: 20px;
        }

        /* Styling the export button */
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- Particles.js Container -->
    <div id="particles-js"></div>

    <div class="container">
        <h1>People Details</h1>

        <!-- Export Button -->
        <div class="text-right mb-4">
            <a href="export.php" class="btn btn-primary">Export to CSV</a>
        </div>

        <div id="peopleList" class="mt-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="person-details">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="User Photo">';
                    echo '<div>';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p><strong>Phone:</strong> ' . $row['phone'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                    echo '<p><strong>Purpose:</strong> ' . $row['address'] . '</p>';
                    echo '<p><strong>Gender:</strong> ' . $row['gender'] . '</p>';
                    echo '</div>';
                    
                    // Edit and Delete buttons
                    echo '<div class="btn-group">';
                    echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Out</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No records found.</p>";
            }

            $conn->close();
            ?>
        </div>
        <a href="index.php" class="btn mt-4">Go Back to Form</a>
    </div>

    <!-- Include Particles.js -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 150,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": ["#FF6347", "#FFD700", "#00BFFF", "#32CD32"] /* Friendly colors */
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 2,
                        "color": "#FFFFFF"
                    },
                    "polygon": {
                        "nb_sides": 6
                    }
                },
                "opacity": {
                    "value": 0.8,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1.5,
                        "opacity_min": 0.3
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 3,
                        "size_min": 1
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#FFFFFF",
                    "opacity": 0.3, /* Softer line opacity */
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 4,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "bounce",
                    "bounce": true,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    }
                },
                "modes": {
                    "repulse": {
                        "distance": 100,
                        "duration": 1
                    },
                    "push": {
                        "particles_nb": 6
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
