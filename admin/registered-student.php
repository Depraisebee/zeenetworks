<?php 
    include "dbh.php";
                  $query = "SELECT* FROM students";
                  $data = mysqli_query($conn,$query);
                  $result = mysqli_num_rows($data);
                  if($result){
                        while ($row =mysqli_fetch_array($data)) {
                           ?>
                            <tr>
                                <td><?php echo $row['student_nrc'];?></td>
                                <td><?php echo $row['students_id'];?></td>
                                <td><?php echo $row['student_fname']." ". $row['student_lname'];?></td>
                                <td><?php echo $row['choice'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['institution'];?></td>
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