<?php 
include "..//dbh.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks</title>
    <link rel="stylesheet" href="..//css/style.css">
    <link rel="stylesheet" href="..//css/register.css">
    <link rel="stylesheet" href="..//bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="..//bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
        .home{
            background-image: url(..//img/bakgnd.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
            background-color: rgba(0, 0, 0, .8);
        }
        .container{
           text-align: center;
            background-image: url(..//img/bakgnd.png);
            padding-bottom: 4%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            background-blend-mode: multiply;
            /* flex-basis: 100%; */
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            height: 53em;
            display: flex;
            justify-content: center;
            border-radius: 5px;
        }
        .form{
   
            align-items: left;
            border: 1px solid #00b0e0;
            justify-content: center;
            display: grid;
            width: 400px;
            padding: 10px;
            /* margin-left: 500px; */
            top: 20px;
            position: relative;
            border-radius: 10px;
            padding-bottom: 3%;
            height: 750px;
            box-shadow: 8px 4px 20px 4px rgb(204, 0, 223);
          }

          @media(max-width:769px) {
            
        .form{
   
            align-items: left;
            border: 1px solid #00b0e0;
            justify-content: center;
            display: grid;
            width: 300px;
            padding: 10px;
            /* margin-left: 500px; */
            top: 20px;
            position: relative;
            border-radius: 10px;
            padding-bottom: 3%;
            height: 750px;
            box-shadow: 8px 4px 7px 4px rgba(204, 0, 223, 0.1);
          }
          }
    </style>
</head>

<body>
   
<div id="menu">
    <div id="close-btn">
        <i class="fa fa-times"></i>
</div>
<ul>
            <li ><a href="index.php"><i class="fa fa-key"></i> Login</a></li>
            <li class="actives"><a href="register.php"><i class="fa fa-lock"></i> Register</a></li>

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
            <a href="index.php" title="Login"><i class="fa fa-key"></i></a>
        </div>
    </div>
    <div class="home mt-5 p-5">
        <h1>Welcome to the Admin Dashboard!!</h1>
         <p>We are glad to have you here!!</p>

    </div>
       <!-- -------------the registraion form goes here------------ -->
       <div class="container">
                        <div class="content">  
                    <div class="form">
                        <form action="admin_signup.php" method="POST">
                            <div class="make">
                                <h4>Register Here</h4>
                        </div>
                        <div class="error-text">
                        <p>The field cannot be empty!!</p>
                        </div>
                        <div class="fields" id="fname">
                                <label for="">Enter your First Name</label>
                        <input type="text" name="fname" placeholder="Enter First Name" required>
                    </div>
                        <div class="fields" id="lname">
                            <label for="">Enter your Last Name</label>
                            <input type="text" name="lname" placeholder="Enter Last Name" required>
                        </div>
                            <div class="fields" id="adm-eml">       
                                <label for="">Enter  Email</label>
                            <input type="email" name="email" placeholder="Enter Email address" required>
                            </div>
                            <div class="fields" id="admin-phn">       
                            <label for="">Enter your phone number</label>

                            <input type="tel" name="phone" placeholder="Enter Phone " required>
                            </div>
                                    <div class="fields" id="password">        
                                <label for="">Enter your password</label>
                            <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                            <div class="fields" id="btn-id">
                    <button type="submit" name="submit">Register</button>
                        </div>

                            <div class="fields">
                    <p style="
                            font-size: 16px;
                            font-weight: 500;
                            color: #fff;
                        border-top:1px solid #fff;
                        ">Have an account?<a href="index.php" style="text-decoration: none;"> Login here</a></p>
                    </div>
                      </form>
                         </div>

                         </div> 
                         </div>
<!-- -----------this section is for footer--------------- -->
    <section>
        <div class="footer text-center bg-dark">
         
              <div class="copyright">

         <p>Zeenetworks <span>&COPY;</span> 2024</p>

              </div>
              <div class="developer" >
              <p>Developed by Rinproud</p>
              </div>
              </div>
              </div>
    </section>
</div>
<!-- <script src="js/form.js"></script> -->
<script src="..//js/menu.js"></script>
<script>
    // document.ddEventListener("DOMContentLoaded", function () {

    // var fNameInput = document.querySelector("#fname input");
    // var lNameInput = document.querySelector("#lname input");
    // var adminInput = document.querySelector("#adm-eml input");
    // var phone = document.querySelector("#phone input");
    // var passwordInput = document.querySelector("#password input");
    // var errorText = document.querySelector(".error-text");
         
     
    //      document.querySelector("#btn-id button").addEventListener("submit", function (event) {
     
    //           if (fNameInput.value == ""){
    //              showError("First name cannot be empty");
    //              event.preventDefault();
    //          }
    //          else if (lNameInput.value == ""){
    //             showError("Last name  cannot be empty");
    //             event.preventDefault();
    //         }
    //         else if (adminInput.value == ""){
    //             showError("Email  cannot be empty");
    //             event.preventDefault();
    //         }
    //         else if (phone.value == ""){
    //             showError("phone  cannot be empty");
    //             event.preventDefault();
    //         }
    //          else if (passwordInput.value === "") {
    //              showError("Please password field cannont be empty!");
    //              event.preventDefault();
    //          } 
    //          else if (!validatePassword(passwordInput.value)) {
    //              showError("Password must be at least 6-8 characters and include at least one uppercase letter, one lowercase letter, and one digit.");
    //              event.preventDefault();
    //          }
    //      });
     
    //      function showError(message) {
    //          var errorText = document.querySelector(".error-text");
    //          errorText.innerHTML = "<p>" + message + "</p>";
    //          errorText.style.display = "block";
    //      }
     
    //      function validatePassword(password) {
     
    //          var passwordRegex = /^[a-zA-Z0-9]{6,8}$/;
    //          return passwordRegex.test(password);
    //      }
    //  });
</script>
</body>
</html>