<?php include "dbh.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks | Create account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
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
            height: 75em;
            display: flex;
            justify-content: center;
            border-radius: 5px;
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
            <li ><a href="login.php"><i class="fa fa-key"></i> Login</a></li>
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
            <a href="login.php"><i class="fa fa-key"></i></a>
        </div>
    </div>
    <div class="home mt-5 p-5">
        <h1>Welcome!!</h1>
         <p>We are glad to have you here!!</p>

    </div>
       <!-- -------------the registraion form goes here------------ -->
       <div class="container">
                        <div class="content">  
                    <div class="form">
                        <form action="signup.php" method="POST" >
                            <div class="make">
                                <h4>Register Here</h4>
                        </div>
                        <div class="error-text" >
                        <p></p>
                        </div>
                        <div class="fields" id="fname">
                                <label for="">Enter your First Name</label>
                        <input type="text" name="fname" placeholder="Enter First Name">
                    </div>
                        <div class="fields" id="lname">
                            <label for="">Enter your Last Name</label>
                            <input type="text" name="lname" placeholder="Enter Last Name">
                        </div>
                        
                        <div class="fields" id="choice">
                                <label for="">First year or Already enrolled</label>
                                    <select name="choice" id="chc">
                                            <option value="">Select</option>
                                            <option value="First year">First year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                    </select>
                                </div>
                            <div class="fields" id="std-nrc">       
                                <label for="">Enter Student NRC</label>
                            <input type="text" name="studentsNRC" placeholder="Enter Student NRC">
                            </div>
                            <div class="fields" id="std-id">       
                                <label for="">Enter Student Id</label>
                            <input type="text" name="studentsID" placeholder="Enter Student Id">
                            </div>
                            <div class="fields" id="std-phn">       
                            <label for="">Enter your phone number</label>

                            <input type="tel" name="phone" placeholder="Enter Phone ">

                            </div>
                <div class="fields" id="bank-id">
                    <label for="">Select Institution</label>
                        <select name="institution" id="institution">
                        <option value="">Select</option>
                        <option value="Mamoce">Mamoce</option>
                        <option value="Unza">Unza</option>
                        <option value="SSN">SSN</option>
                        <option value="KNU">KNU</option>
                        <option value="CBU">CBU</option>
                                </select>
                </div>   
                            <div class="fields" id="Usname">        
                                <label for="">Enter your Username</label>
                            <input type="text" name="username" placeholder="Enter your Username">
                            </div>
                            <div class="fields" id="lname">        
                                <label for="">Enter your password</label>
                            <input type="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="fields" id="btn-id">
                    <button type="submit" name="submit" id="btn-id">Register</button>
                        </div>

                            <div class="fields">
                    <p style="
                            font-size: 16px;
                            font-weight: 500;
                            color: #fff;
                        border-top:1px solid #fff;
                        ">Have an account?<a href="login.php" style="text-decoration: none;"> Login here</a></p>
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
              <p>Developed by Silwimba Praise</p>
              </div>
              </div>
              </div>
    </section>
</div>
<script src="js/forms.js"></script>
<script src="js/menu.js"></script>
<script>
//     const form = document.querySelector(".form form"),
// submitBtn = document.getElementById('btn-id');
// errorText = document.querySelector(".error-text");

// form.onsubmit = (e)=>{
//     e.preventDefault();//this prevents the form from submitng
// }
// submitBtn.onclick =()=>{
//     //the ajax codes
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "signup.php", true);
//     if(xhr.readyState === XMLHttpRequest.DONE){
//         if(xhr.status === 200){
//             let data =xhr.response;
//             if(data == "Success"){

//             }else{
//                 errorText.textContent = data;
//                 errorText.style.display = "block";
//             }
//         }
//     }
// };

</script>

</body>
    </html>