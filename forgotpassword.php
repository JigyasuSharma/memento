<?php
session_start();
require_once("global/api/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memento Sign in & Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-icon" href="img/mxm-white.png" sizes="any">
    <link rel="shortcut icon" href="img/mxm-white.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/mxm-white.png">
</head>
<body>
    <main>
        <div class="box">

            <div class="forms-wrap col-md-6">
                <form action="" method="POST" class="sign-in-form">
                    <div class="logo">
                        <img src="img/mxm-black.png" alt="Clothing" />
                    </div>
                    <div class="heading">
                        <h2>Password assistance</h2>
                        <h6>Enter the email address associated with your Memento account.</h6>
                    </div>
                    <div class="actual-form">
                        <div class="input-wrap" style="margin-bottom: 8px;">
                            <input type="text" id="email" name="email" class="input-field" required placeholder="Email" />
                        </div>
                        <p class="sendotp" style="margin-left: 290px;color:#9c95ae;border: none;background-color: white;">Get OTP</p>
                        <div class="input-wrap">
                            <input type="text" id="otp" name="otp" class="input-field" required placeholder="OTP" disabled />
                        </div>
                        <input type="submit" value="Continue" id="btn_checkotp" name="btn_checkotp" class="sign-btn" />
                        <p class="text">
                            Forgotten your password or your login details?
                            <a href="contact.php">Get help</a> signing in
                        </p>
                    </div>
                </form>
            </div>

            <div class="col-md-6 d-none d-md-flex bg-image carousel"></div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function () {
    let otp=Math.floor(Math.random() * (99999 - 10000 + 1)) + 10000;

    $(".sendotp").click(function() {
        let email = $("#email").val();
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!emailRegex.test(email)) {
            alert("Enter a email");
            return false;
        }else{
        console.log(email);// nikalna hai end mai
        let subject= "Forgot your Password?";
        let body="Your OTP IS "+otp ;
        let altbody="mail for change otp";
        $.ajax({
            url:"mail/",
            method:"post",
            data:{
                email: email,
                subject: subject,
                body: body,
                altbody: altbody,
            },
            success:function(data){
                console.log(otp);//nikalna hai end mai
                alert(data);
                $("#otp").prop('disabled',false);
            }
        })
    }
    })
    $(".sign-btn").click(function(){
        let checkotp=$("#otp").val();
        if(checkotp==otp){
            location.href="changepassword.php"
           alert("ya boi");//idher redirect karde nahi maan raaha location.href ya document ya koi bhi bhadwa hai
        }else{
            alert("Incorrect OTP")}
    })
})
</script>

</html>