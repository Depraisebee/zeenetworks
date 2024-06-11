<?php
 ?> 
 <div class="values">
 <div class="val-box">
     <i class="fas fa-users"></i>
     <div>
         <?php
         // Count the number of registered students
         $stmt_students = $conn->prepare("SELECT COUNT(*) AS student_count FROM students");
         $stmt_students->execute();
         $result_students = $stmt_students->get_result();
         $student_count = $result_students->fetch_assoc()['student_count'];
         $stmt_students->close();
         ?>
         <h3><?php echo $student_count; ?></h3>
         <span>Registered Students</span>
     </div>
 </div>
<?php
