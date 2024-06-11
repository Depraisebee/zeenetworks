<?php
 ?> 

 <div class="val-box">
     <i class="fas fa-users"></i>
     <div>
         <?php
         // Count the number of registered admins
         $stmt_admins = $conn->prepare("SELECT COUNT(*) AS admin_count FROM admins");
         $stmt_admins->execute();
         $result_admins = $stmt_admins->get_result();
         $admin_count = $result_admins->fetch_assoc()['admin_count'];
         // $stmt_admins->close();
         ?>
         <h3><?php echo $admin_count; ?></h3>
         <span>Admins</span>
     </div>
 </div>
 </div><?php
