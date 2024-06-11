<?php 
    include "dbh.php";
                  $query = "SELECT* FROM admins";
                  $data = mysqli_query($conn,$query);
                  $result = mysqli_num_rows($data);
                  if($result){
                        while ($row =mysqli_fetch_array($data)) {
                           ?>
                            <tr>
                                <td class="people">
               <img src="profiles/<?php echo $row['profile_image']; ?>">
                  
                            <div class="people-de">
                                <h5 class="text-primary"><?php echo $row['fname'] . ' ' . $row['lname']; ?></h5>

                            </div>
                        <td>
                            <p class="text-light"><?php echo $row['email']; ?></p>
                        </td>

                        <td>
                            <p class="text-primary"><?php echo $row['phone']; ?></p>
                        </td>
                        <td>
                            <p class="text-primary">Admin</p>
                        </td>
                        <td class="edit"><a href="#">Edit</a></td>
                        </td>
                                        </tr>
                           <?php
                        }
                  }
                  else
                  {
                    ?>
                    <tr>
                        <td>No record Found</td>
                    </tr>
                    <?php
                    
                  }   
                  //end of php and sql codes  
              ?>