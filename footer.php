<!-- template for footer with real time rating fetching php code -->
<footer>
        <span><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i><i
                class="fa fa-circle" aria-hidden="true"></i></span>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "maria";
    $dbname = "contact";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // mysqli is the MySQL Improved extension, which provides an interface for interacting with MySQL databases in PHP.
    // connecting to the database, and performing other database operations.

    $avg = $conn->prepare("SELECT avg(rating) as average, count(*) as count FROM user_details");
    $avg->execute();
    $result = $avg->get_result()->fetch_assoc(); // Fetch the result 
    if($avg->execute()){
        echo "<div class=\"ratingbox\"><div>Average Rating for this website :  <span class='user_ratings'>".round($result['average'], 1)."</span> / 5  <i class='fa fa-star'></i>   (from  ".$result['count']." users)</div>";
    }
    else{
    }

    $avg->close();
    $conn->close();
    ?>
        
        <div><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:notyourcupoftea@gmail.com"
                style="text-decoration:none; color:inherit">notyourcupoftea@gmail.com</a></div>
        <div><i class="fa fa-copyright" aria-hidden="true"></i>copyrights www.anujmehta.isnotsmart.com | All rights
            reserved</div>
    </footer>