<?php
 ?> 


 <div class="val-box">
     <i class="fas fa-shopping-cart"></i>
     <div>
         <?php
         // Count the number of paid students
         $stmt_paid_students = $conn->prepare("SELECT COUNT(*) AS paid_student_count FROM payments");
         $stmt_paid_students->execute();
         $result_paid_students = $stmt_paid_students->get_result();
         $paid_student_count = $result_paid_students->fetch_assoc()['paid_student_count'];
         // $stmt_paid_students->close();
         ?>
         <h3><?php echo $paid_student_count; ?></h3>
        <span>Total transaction</span>
         <!-- <span>Paid Students</span> -->
     </div>
 </div>
<?php
