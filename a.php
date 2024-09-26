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
        .messagebox{
            position: relative;
            top: 50px;
            min-width: 300px;
            max-width: 52%;
            padding: 24px;
            border: 1px solid brown;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 43px 0px rgb(77 48 2);
        }

        element.style {
            font-size: 1.5rem;
            font-weight: 700;
            color: brown;
        }

        .ratingbox{
            border: 1px solid brown;
            border-radius: 10px;
            box-shadow: 0px 0px 43px 0px rgb(77 48 2);
            margin: auto;
            width: 50%;
            padding:24px;
            min-width: 300px;
            max-width: 61%;

            display: flex;
            flex-direction: column;
            align-items: center;

            position: relative;
            top: 110px;
        }
        .user_ratings{
            font-size: 1.2rem;
            font-weight: 800;
            color: brown;
        }
        .fa-star{
            color:yellow;
        }
    </style>
</head>

<body>
    
    <?php require('template.php'); ?> 

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
        $rating = $_POST['rating'];
    }

    $stmt = $conn->prepare("INSERT INTO user_details (name, email, gender, msg, rating) values (?,?,?,?,?)");
    // prepare statement used to insert the form data into the user_details table

    $stmt->bind_param("ssssi", $name, $email, $gender, $msg, $rating);
    //  This ensures that the data is properly escaped, preventing SQL injection attacks.
    // "ssss" indicates all parameters are strings.

    if($stmt->execute()){
        //  It inserts the provided user data into the database,
        //  executing the SQL query with the actual values instead of the placeholders(?).
        echo "<div class=\"messagebox\">";
        echo "<h3>Thank you for Connecting with this <span id=\"sound\">Coding Freak</span></h3>";
        echo "<audio id=\"hover-audio\"><source src=\"hacker.mp3\" type=\"audio/mp3\"></audio>";
        echo "<span>Details Succesfully Delivered</span> <br>";
        echo "<span>Ill get back to you soon ! Until then, adios <span id=\"user_name\">$name .</span></span>";
        echo "<small style=\"font-size:0.8rem\"> I finally got an amigo!! Vamos:)</small><br></div>";
    }
    else{
        echo "Error : " . $stmt->error;
    }

    $avg = $conn->prepare("SELECT avg(rating) as average, count(*) as count FROM user_details");
    $avg->execute();
    $result = $avg->get_result()->fetch_assoc(); // Fetch the result
    if($avg->execute()){
        echo "<div class=\"ratingbox\"><div>Average Rating till now :  <span class='user_ratings'>".round($result['average'], 1)."</span> / 5  <i class='fa fa-star'></i></div>";
        echo "<div>from  ".$result['count']."   total ratings till now</div></div>";
    }
    else{
        echo "<div class=\"other\">woops! no ratings available yet</dib>";
    }

    $stmt->close();
    $conn->close();
    ?>
    </div>

    <?php require('footer.php'); ?> 

    <script>
        const audio = document.getElementById('hover-audio');
        const hoverDiv = document.getElementById('sound');
        hoverDiv.addEventListener('mouseenter mouseover', () => {
            audio.play(); // Play audio when mouse enters the div
        });
    </script>
</body>
</html>