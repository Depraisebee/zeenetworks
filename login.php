<?php 
session_start();
include 'dbh.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks | Sign In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
       #interface{
    width: calc(100% - 301px);
    left: 225px;
    position: relative;
}
        .home{
            background-image: url(img/bakgnd.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
            background-color: rgba(0, 0, 0, .8);
        }
        .container{
           text-align: center;
            background-image: url(img/bakgnd.png);
            padding-bottom: 4%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            background-blend-mode: multiply;
            /* flex-basis: 100%; */
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            height: 40em;
            display: flex;
            justify-content: center;
            border-radius: 6px;
        }
        @media(max-width:769px){
  #interface{
    width: calc(100% - 0px);
    left: 0px;
    position: relative;
}}
    </style>
</head>

<body>
   
<div id="menu">
    <div id="close-btn">
        <i class="fa fa-times"></i>
</div>
<ul>
            <li class="actives"><a href="login.php"><i class="fa fa-home"></i> Login</a></li>
            <li><a href="register.php"><i class="fa fa-credit-card"></i> Register</a></li>

        </ul>
</div>

<div id="interface" class=" sm-6">
    
    <div class="header">
     
        <nav class="navbar">
            
            <a href="#"><i class="fa fa-network-wired"></i></a>
            <div class="logo">
                <h1>Zeenetworks</h1>
            </div>      
        </nav>

    </div>
     <div id="menu-btn">
                <i class="fa fa-bars"></i>
    </div>
    <div id="navigation">
        <div class="icons">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-x"></i></a>
            <a href="register.php"><i class="fa fa-key"></i></a>
        </div>
    </div>
    <div class="home mt-5 p-5">
        <h1>Welcome back!!</h1>
         <p>We are glad to have you here!!</p>

    </div>
       <!-- -------------the login form goes here------------ -->
       <div class="container">
		<div class="content">
			<div id="form">

				<form action="signin.php" method="POST">

					<div class="make">
						<h4>Login Here</h4>
					</div>
					<div class="error-text">
						<p>
							The field cannot be empty!!
						</p>
					</div>

                    <div class="fields" id="Usname">        
                         <label for="">Enter your Username</label>
                         <input type="text" name="username" placeholder="Enter your Username">
                    </div>
					<div class="fields" id="password">
						<label for="">Enter your password</label>
						<input type="password" name="password" placeholder="Enter your password">
					</div>
					<div class="fields" id="btn-id">
						<button type="submit" name="submit">Login</button>
					</div>
					<div class="fields">
                        <p style="
                            color:#fff;			
                            font-size:17px;	
                            width:100%;
                    border-top:1px solid #fff;
                        ">Don't Have an account yet?
						<a href="register.php" style="text-decoration:none">Sign Up here</a>
						</p>
			

					</div>
				</form>

			</div>
			<br /><br />


		</div>
	</div>



<!-- -----------this section is for footer--------------- -->
    <section>
        <div class="footer text-center bg-dark">
              <div class="copyright">

         <p>Zeenetworks <span>&COPY;</span> 2024</p>

              </div>
              <div class="developer" >
              <p>Developed by Silwimba Praise</p>
              </div>
              </div>
              </div>
    </section>
</div>
<!-- <script src="js/forms.js"></script> -->
<script src="js/menu.js"></script>
<script>

document.addEventListener("DOMContentLoaded", function () {

var networkSelect = document.getElementById("network");
var studentIdInput = document.querySelector("#std-id input");
var studentNrcInput = document.querySelector("#std-nrc input");
var passwordInput = document.querySelector("#password input");

var errorText = document.querySelector(".error-text");


networkSelect.onchange = function showNrc() {
    var sId = document.querySelector("#std-id");
    var sNrc = document.querySelector("#std-nrc");
    if (networkSelect.value === "fyear") {
        console.log("first year");
        sId.style.display="none";	
        sNrc.style.display="block";
    }
    else{
    sId.style.display="block";	
        sNrc.style.display="none";
    }
    
}

document.querySelector("form").addEventListener("submit", function (event) {

    if (networkSelect.value === "") {
        showError("Please select First year or Already enrolled");
        event.preventDefault();
    } 
    else if (networkSelect.value !== "fyear" && studentIdInput.value === ""){
        showError("Please enter Student Id");
        event.preventDefault();
    }
    else if (networkSelect.value === "fyear" && studentNrcInput.value === "") {
        showError("Please enter Student NRC");
        event.preventDefault();
    } 
    // else if (!validatePassword(passwordInput.value)) {
    //     showError("Password must be at least 6-8 characters and include at least one uppercase letter, one lowercase letter, and one digit.");
    //     event.preventDefault();
    // }
});

// function showError(message) {
//     var errorText = document.querySelector(".error-text");
//     errorText.innerHTML = "<p>" + message + "</p>";
//     errorText.style.display = "block";
// }

// function validatePassword(password) {

//     var passwordRegex = /^[a-zA-Z0-9]{6,8}$/;
//     return passwordRegex.test(password);
// }
});

</script>
</body>
</html>