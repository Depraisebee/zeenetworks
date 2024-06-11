<?php
// include "check_login.php";
include "../dbh.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeenetworks | Admin panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="..//bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="..//bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">

    <style>
        #interface{
    width: calc(100% - 400px);
    position: relative;
    margin-left: 400px;
    

}
#interface .navigation{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 15px 20px;
    border-bottom: 3px solid #594ef7;
    position: fixed;
    width: calc(100% - 400px);
    margin-left: 0px;
    background: rgb(255, 255, 255);
    
}
@media(max-width:769px){
    #interface{
    width: calc(100% - -30px);
    position: relative;
    margin-left: 30px;
    

}
#interface .navigation{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fff;
    padding: 15px 20px;
    border-bottom: 3px solid #594ef7;
    position: fixed;
    width: calc(100% - 0px);
    margin-left: -20px;
    background: rgb(255, 255, 255);
    
}
}
        .register-student{
            background-color: #010101;
        }
        .register-student h4{
            color: #fff;
            padding: 8px;
            font-size: 25px;
        }


        .updated .cards{
     box-shadow: -3px 1px 1px 2px rgb(0,0,9, 0.1);
       width: 80%;
       border-radius: 8px;
       padding: 20px;
       background: #cfd2d3;
       margin: 8px;
    }

    .updated{
        padding: 5px;
        justify-content: flex-start;
        display: grid;
    }
    .updates{
        padding: 8px;
        top: 120px;
        
    }

    .updates h2{
        color: #01b0e0;
        font-size: 29px;
        padding:8px;
        /* flex-basis: 100%; */
        margin: 0 4px;
    }
    
       .updates .cards p {
        color: #1d2735;
        font-size: 25px;
        font-weight: 500;
        text-align: left;
        font-family: Monospace;
    }
    .updates .cards h4 {
        color: #e000e0;
        font-size: 25px;
    }
    .updates .card p a{
        text-decoration: none;

        color: #1d2735;
        font-size: 22px;
        font-weight: 600;
    }
     .time{
        margin: 10px;
        color: #333;
       display:flex;
       font-size: 16px;
    }
    .time h6{
        margin: 7px;
        bottom: 7.7px;
        font-size: 14px;
        
    }
    .profile h4{
        color: #333;
        font-size: 20px;
    }
    .active{
        border-left: 4px solid #fff;
    /* background: #fff; */
    border-radius:  0 10px  0  10px;
    color: #0051f3;
    }



    </style>
</head>
<body id="body">
     
<section id="menu">
               <div  class="closebtn" class="icons">
          <i class="fas fa-times" id="closebtn"></i>
                </div>
      <div class="logo">
          <img src="img/2.jpg">
          <h2>Zeenetworks</h2>
      </div>
      <div class="items ">
          <li class="active"><i class=""></i><a href="#">Dashboard</a></li>
          <li><i ></i><a href="#">View Registered Students</a></li>
          <li><i ></i><a href="#">Post Update</a></li>
          <li><i></i><a href="#">View Paid Students</a></li>
          <li><i></i><a href="#">View Admins</a></li>
      </div>
</section>

<section id="interface">
    <div class="navigation">
        <div class="n1">
            <div >
                <div id="menubtn"> 
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="search">
                <i class="fa fa-search" class="icons"></i>
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="profile">
    <i class="far fa-bell" class="icons"></i>
    
    <h4>
        <?php  
  
       if (isset($_SESSION['unique_id']['unique_id'])) {
            echo $_SESSION['first_name']['fname'];
       }

        ?>
    </h4>
    <img src="img/1.jpg">
</div>


    </div>
    <h3 class="i-name">Dashboard</h3>
    <div class="theme">
        <button id="btn">Change Theme</button>
              </div>
    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
            <div>
                
            <h3>800</h3>
            <span>Registered Students</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-shopping-cart"></i>
            <div>
                
            <h3>200</h3>
            <span>Paid Students</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-shopping-cart"></i>
            <div>
                
            <h3>200</h3>
            <span>Total transaction</span>
            </div>
        </div>
        <div class="val-box">
            <i class="fas fa-dollar-sign"></i>
            <div>
                
            <h3>$677.89</h3>
            <span>This Month</span>
            </div>
        </div>
    </div>
        <!--this code gets the Paid Students --->
                 <div class="data">
                <h2 class="">Students Payment Data</h2>
            <div class="data-student">
                <table border="1"cell
                 padding= "2" cellspacing="2">
                 <th>Student NRC ID</th>
                 <th>Student ID</th>
                <th>Student name</th>
                 <th>Program</th>
                  <th>Class</th>
                  <th>Amount Paid</th>
                  <th>Paid Date</th>
                  <th>Year</th>
                  <th>Generate receipt</th>    
                  <tr>
          <td></td>
          <td>20220166</td>
          <td> malumbo praise</td>
          <td> Secondary Diploma</td>
          <td> Computer studies 3</td>
          <td> 2800</td>
          <td> 20/04/2024</td>
          <td> 3</td>
          <td><button><a href="#">Generate</a></button></td>
                  </tr>
               <tr>
          <td></td>
          <td>20220166</td>
          <td> malumbo praise</td>
          <td> Primary  Diploma</td>
          <td> PDA3</td>
          <td> 2800</td>
          <td> 25/06/2024</td>
          <td> 3</td>
          <td><button><a href="#">Generate</a></button></td>
             <tr>
          <td>293500/47/1</td>
          <td></td>
          <td> malumbo praise</td>
          <td> Secondary Diploma</td>
          <td> Computer studies 3</td>
          <td> 2800</td>
          <td> 20/04/2024</td>
              <td> 1</td>
          <td><button><a href="#">Generate</a></button></td>
                  </tr>
               <tr>
          <td></td>
          <td>20220166</td>
          <td> malumbo praise</td>
          <td> Primary  Diploma</td>
          <td> PDA3</td>
          <td> 2800</td>
          <td> 25/06/2024</td>
          <td> 3</td>
          <td><button id="G-r"><a>Generate</button></td>
                  </tr>
                  </tr>

                 </table>
               </div>
               <div class="receipt">
           <button>Generate Report</button>

                 </div>
           </div>
         <div class="Receipt-container"id="R-c">    
       <div class="Generate-receipt">
            <h3>Malcolm Moffat College of Education</h3>
          <h5>Receipt No: <span>mmce101</span> </h5>
          <h5>Amount paid: <span>2800</span> </h5>
          <h5>Student Name: <span>malumbo praise</span> </h5>
          <h5>Student ID: <span>20220166</span> </h5>
          <h5>Programme: <span>Secondary Diploma</span> </h5>
          <h5>Class: <span>Scsda3</span> </h5>
          <h5>Transaction date: <span>20/04/2024</span> </h5>
          <h5>Student phone: <span>0976445026</span> </h5>
          <div class="stamp-area">
              
        <label for="">Stamp</label>
          <div class="stamp">
              
          </div>
            </div>

          </div>

              <button><a href="#">Generate Receipt</a></button>
          </div> 
        
          <div class="post">
              <h3>Post an Update</h3>
              <div class="post-area">
               <form action="adminPanel.php" method="POST" accept-charset="utf-8">
                  <textarea name="update" id= rows="16" cols="27"></textarea>
                  <button type="submit" name="post">Post</button>
                                 </form>
              </div>
          </div>
          
        <div class="view-posts">
        <section class="updates">
        <h2>Updates</h2>

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Updates
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Updates </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <?php 
        include "post.php";
      ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





          
         
              </section>
           
     <div data-bot-id="376293"></div>
                </div>
           
       
            
      
    <!--this code gets the registerd Admins --->
    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Title</td>
                    <td>Status</td>
                    <td>Role</td>
                    <td>Action</td>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="people">
                            <img src="img/1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img/3.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img/4.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img/1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
                <tr>
                    <td class="people">
                            <img src="img1.jpg">
                            <div class="people-de">
                                <h5>Malumbo</h5>
                                <p>malumbo@example.com</p>
                            </div>
                            <td class="people-des">
                                <h5>Software Engeneer</h5>
                                <p>Web dev</p>
                            </td>
                            <td class="active"><p>Active</p></td>
                            <td class="role"><p>Owner</p> </td>
                            <td class="edit"><a href="#">Edit</a></td>

                    </td>

                </tr>
            </tbody>
        </table>
    </div>
        <!-- this is for registered students -->
        <div class="register-student">
        <h4>Registered Student</h4>
        <table border="1"cell
                 padding= "2" cellspacing="2">
                 <th>Student NRC ID</th>
                 <th>Student ID</th>
                <th>Student name</th>
                 <th>Year</th>
                  <th>Phone Number</th>
                  <th>Institution</th>
              
                 <?php include "registered-student.php"?>
                 </table>

       </div>
  
</section>

<script src="js/theme.js"></script>
 <script>
 var showBtn = document.getElementById('menubtn');
 var showmenu = document.getElementById('menu');
  var closeBtn = document.getElementById('closebtn');
 
showBtn.addEventListener('click', showMenu);
function showMenu(){
    showmenu.style.display= "block";
    showBtn.style.display = "none";
};
closeBtn.addEventListener('click', closeMenu);
function closeMenu(){
    showmenu.style.display= "none";
    showBtn.style.display = "block";
};
 </script>
</body>
</html>