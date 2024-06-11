<?php 
include "..//dbh.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks Sign up </title>
    <link rel="stylesheet" href="..//css/style.css">
    <link rel="stylesheet" href="..//css/login.css">
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
            height: 30em;
            display: flex;
            justify-content: center;
            border-radius: 6px;
        }
        form{
            align-items: center;
            align-self: center;
            align-content: space-around;
            position: relative;
            border: 1px solid #00b0e0;
            width: 350px;
            padding: 10px;
            flex-basis: 100%;
            top: 20px;
            border-radius: 10px;
            padding-bottom: 3%;
            height: 390px;
            box-shadow: 8px 4px 20px 4px rgb(204, 0, 223);
            }
            @media(max-width:769px){
            #close-btn{
                color: #00b0e0;
                margin: 20px;
                font-size: 30px;
                cursor: pointer;
                display: block;
            }

            form{
            align-items: center;
            align-self: center;
            align-content: space-around;
            position: relative;
            border: 1px solid #00b0e0;
            width: 300px;
            padding: 10px;
            flex-basis: 100%;
            top: 20px;
            border-radius: 10px;
            padding-bottom: 3%;
            height: 400px;
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
            <li class="actives"><a href="index.php"><i class="fa fa-key"></i> Login</a></li>
            <li><a href="register.php"><i class="fa fa-lock"></i> Register</a></li>

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
            <a href=""><i class="fab fa-facebook" title="Facebook"></i></a>
            <a href=""><i class="fab fa-instagram" title="Instagram"></i></a>
            <a href=""><i class="fab fa-x" title="X"></i></a>
            <a href="register.php" title="Register"><i class="fa fa-lock"></i></a>
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

				<form action="admin_signin.php" method="post">

					<div class="make">
						<h4>Login Here</h4>
					</div>
					<div class="error-text">
						<p>
							The field cannot be empty!!
						</p>
					</div>
					<div class="fields" id="adm-eml">

						<label for="">Enter Your email</label>
						<input type="email" name="email" placeholder="Enter Your Email">
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
              <p>Developed by Rinproud</p>
              </div>
              </div>
              </div>
    </section>
</div>
<!-- <script src="js/form.js"></script> -->
<script src="..//js/menu.js"></script>

<script>
   
  
</script>
</body>
</html>