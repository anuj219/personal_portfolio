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
        .formbox {
            margin-top:05vh !important;
            font-size: 1.2rem;
            display: flex;
            justify-content: center;
            align-items: center;

            background-color: rgb(235, 178, 92);
            border: 2px solid rgb(241, 164, 48);
            border-radius: 20px;
            margin: auto;
            max-width: 30%;
        }

        #form2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        #submit {
            cursor: pointer;
            padding: 10px;
            border: 1px solid black;
            background-color: rgb(239, 146, 6);
            border-radius: 20px;
        }

        #name2,
        #email2,
        #msg {
            border: 0.4px solid black;
            border-radius: 20px;
            padding: 10px;
            margin-top: 20px;
        }

        .all1.all1 {
            max-width: fit-content;
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php require('template.php'); ?> 
    <!-- ive used require() function of php here.
    For this to work on any page, that page's extension needs to be renamed to .php -->
    <div class="formbox">
        <form action="a.php" method="post" id="form2">
            <div id="namebox" class="all1">
                <input type="text" name="name" id="name2" placeholder="Name" required>
            </div>
            <div id="emailbox" class="all1">
                <input type="email" name="email" id="email2" placeholder="Email" required>
            </div>
            <div id="genderbox" class="all1">
                <label for="m">male</label>
                <input type="radio" name="r1" id="m" value="m" required>

                <label for="f" class="all1">female</label>
                <input type="radio" name="r1" id="f" value="f" required>
            </div>

            <div id="msgbox" class="all1">
                <textarea name="msg" id="msg" rows="2" placeholder="Bring It On !!"></textarea>
            </div>

            <div id="submitbox" class="all1">
                <input type="submit" name="submit" id="submit" value="connect" disabled>
            </div>
        </form>
    </div>


    <script>
        // 
        $('#email2').on('keyup', function(){
            var user_email = document.getElementById('email2');
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (pattern.test(user_email.value.trim())) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        });
    </script>
</body>

</html>