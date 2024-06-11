<?php 
$query = "SELECT* FROM students WHERE unique_id";
                $data = mysqli_query($conn,$query);
                $result = mysqli_num_rows($data);
                if($result){
                      while ($row =mysqli_fetch_assoc($data)) { 
                          if(isset($_SESSION['unique_id'])){
                        ?>
                          <h4><?php echo $row['unique_id'] . ' ' . $row['student_lname']; ?></h4>  
                        <?php
                          }
                      }
                    }