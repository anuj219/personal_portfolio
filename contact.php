<!DOCTYPE html>
<html lang="en">

<!--     used input type radio for rating feature in contact from
    had to write the input tag 1st and its label after, so when use ~ on a certain radio btn, all label tags along with its own will also be selected..which was otherwise not selecting
    because if eg
                    label
                    input

                    label        
                    input           (so if we use "~label" on the checked(selected) input tags, all label after that input would be selected)
                    ----------------------
                    input
                    label

                    input
                    label           (in this way, this inputs label will also be selected along with the next ones)

    then had to reverse direction(css property) of the radiobtn div box ... so radio btns go 5 to 1 in the html...but appear 1 to 5 on page
    so isse label and its input ka order back to normal ho jata hai, and when you select a btn (suppose 2nd star), then all labels before this radio btn will be gold (due to ~ and direction rtl on it)

    ~ :  tidle selector that selects all siblings after an element -->

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
            border-radius: 10px;
            box-shadow: 0px 0px 43px 0px rgb(77 48 2);
            margin: auto;
            max-width: 30%;
            min-width: 300px;
        }

        #form2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        #submitbox{
            width: 100%;
        }
        #submit {
            cursor: pointer;
            padding: 10px;
            border: 1px solid black;
            background-color: rgb(239, 146, 6);
            border-radius: 10px;
            width: 150%;
        }

        #name2,
        #email2,
        #msg {
            border: 0.4px solid black;
            border-radius: 10px;
            padding: 10px;
            margin-top: 20px;
        }

        .all1.all1 {
            display: flex;
            margin: 10px;
        }

        .radio{
            /* gender btns */
            display:flex;
            justify-content: space-around;
        }

        /* rating CSS */
        #ratingbox{
            direction: rtl;
        }
        .rating{
            /* css for radio buttons */
            opacity:0;
        }
        label{
            transition: all 0.4s ease;
            /* this creates change to gold and transform smooth */
        }
        .rating:checked ~label{
            transform: scale(1.5);
            color:gold;
        }
        .rating:hover ~label{
            transform: scale(1.5);
            color:gold;
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
                <input type="email" name="email" id="email2" placeholder="Email" autocomplete="email" required>
            </div>
            <div id="genderbox" class="all1 radio">
                <label for="m">male</label>
                <input type="radio" name="r1" id="m" value="m" required style="margin-right:10px">

                <label for="f">female</label>
                <input type="radio" name="r1" id="f" value="f" required>
            </div>  

            <div id="msgbox" class="all1">
                <textarea name="msg" id="msg" rows="2" placeholder="Bring It On !!"></textarea>
            </div>


            <span style="margin-top:30px;">Rate my website :)</span>
            <div id="ratingbox" class="all1">
                <input type="radio" name="rating" id="r5" class="rating" value="5">
                <label for="r5"><i class="fa fa-star" aria-hidden="true"></i></label>

                <input type="radio" name="rating" id="r4" class="rating" value="4">
                <label for="r4"><i class="fa fa-star" aria-hidden="true"></i></label>

                <input type="radio" name="rating" id="r3" class="rating" value="3">
                <label for="r3"><i class="fa fa-star" aria-hidden="true"></i></label>

                <input type="radio" name="rating" id="r2" class="rating" value="2">
                <label for="r2"><i class="fa fa-star" aria-hidden="true"></i></label>

                <input type="radio" name="rating" id="r1" class="rating" value="1">
                <label for="r1" id="1st"><i class="fa fa-star" aria-hidden="true"></i></label>
            </div>

            <div id="submitbox" class="all1">
                <input type="submit" name="submit" id="submit" value="connect" disabled>
            </div>
        </form>
    </div>

    <?php require('footer.php'); ?> 
    <script>
        // 
        $('#email2, #name2').on('keyup', function(){
            var user_name = document.getElementById('name2');
            var user_email = document.getElementById('email2');
            var name_pattern = /^[a-zA-Z ]{2,20}$/;
            var email_pattern = /^[a-zA-Z]+[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email_pattern.test(user_email.value.trim()) && name_pattern.test(user_name.value.trim())) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        });
        
        var flag = 0;     // this means btn is not clicked even once
        $('#r1').on('click', function(){
            if(flag == 1){
                if(document.getElementById('r1').checked == true){
                document.getElementById('r1').checked = false;
                // or $('#r1').prop('checked', false);
                flag = 0;
                }
            }
            else{
                flag = 1;   // this means btn is now clicked once;
            }
        });
    </script>
</body>

</html>