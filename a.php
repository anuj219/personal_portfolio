<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal-Website.Anuj</title>

    <link href="https://fonts.cdnfonts.com/css/amazon-ember" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet"> <!-- Google Fonts - Nunito Sans  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- bootstrap css -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- bootstrap js -->


    <!-- typeJS is javascript's animation library -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <!-- TypeJS cdn  -->

    <title>Contact</title>

    <link rel="stylesheet" href="style.css">
    <style>
        h3{
            background-color:rgb(186, 113, 3);
        }
        h1,h2,h3,h4{
            text-align: center;
        }
        .box{
            display:flex;
            flex-direction:column;
            margin:auto;
            max-width:50%;
            background-color: rgb(235, 178, 92);
            border: 2px solid beige;
            border-radius:20px;
            min-width: fit-content;
        }

        #user_name{
            padding:7px;
            background-color: rgb(255, 208, 137);
            border:2px solid transparent;
            border-radius:15px;
        }
    </style>
</head>

<body>
    <div class="social">
        <div id="insta" class="in">
            <a href="https://www.instagram.com/anuj_v_mehta219/" target="_blank">
                <span class="textt">Instagram</span>
                <i class="fa-brands fa-instagram"></i>
            </a>
        </div>
        <div id="git" class="in">
            <a href="https://github.com/anuj219" target="_blank">
                <span class="textt">GitHub</span>
                <!-- <i class="fa-solid fa-code-pull-request"></i> -->
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
        <div id="lin" class="in">
            <a href="https://www.linkedin.com/in/anuj-mehta-1b120622a/" target="_blank">
                <span class="textt">LinkedIn</span>
                <i class="fa-brands fa-linkedin"></i>
            </a>
        </div>
    </div>

    <header id="header">
        <nav id="navbar">
            <div class="left">Portfolio</div>
            <div class="right">
                <ul>
                    <li><a href="index.html">Home</a></li>
                </ul>
            </div>
            <div class="end"><i class="fa fa    -bars" id="menu-icon" onclick="toggle_menu()"></i></div>
            <div class="menu-links" id="menu-links">
                <ul>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="box">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "maria";
    $dbname = "contact";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // mysqli is the MySQL Improved extension, which provides an interface for interacting with MySQL databases in PHP.
    // connecting to the database, and performing other database operations.

    if($conn->connect_error){
        die("connection Failed : " . $conn->connect_error);
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['r1'];
        $msg = $_POST['msg'];
    }

    $stmt = $conn->prepare("INSERT INTO user_details (name, email, gender, msg) values (?,?,?,?)");
    // prepare statement used to insert the form data into the user_details table

    $stmt->bind_param("ssss", $name, $email, $gender, $msg);
    //  This ensures that the data is properly escaped, preventing SQL injection attacks.
    // "ssss" indicates all parameters are strings.

    if($stmt->execute()){
        //  It inserts the provided user data into the database,
        //  executing the SQL query with the actual values instead of the placeholders(?).
        echo "<h3>New Record Created Successfully</h3>";
        echo "<h1> Contact details delivered to Anuj</h1><br>";
        echo "<h2>Ill get back to you soon ! Until next time ; adios <span id='user_name'>$name</span></h2>";
    }
    else{
        echo "Error : " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    ?>
    </div>
</body>
</html>