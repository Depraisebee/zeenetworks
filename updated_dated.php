<?php 
                  $query = "SELECT* FROM payments WHERE student_id = $_SESSION[student_id]";
                  
                  $data = mysqli_query($conn,$query);
                  $result = mysqli_num_rows($data);
                  if($result){
                        while ($row =mysqli_fetch_array($data)) {
                           ?>
                             <div class="time">
                <h5>History Updated: <?php echo calculateTimeElapsed($row['transaction_date']); ?></h5>
               <div data-bot-id="376293"></div>
                          </div>
                           <?php
                        }
                  }
                  else
                  {
                    ?>
                    <tr>
                        <td>The transaction date will be here once you make a transaction </td>
                    </tr>
                    <?php
                    
                  }   

                  // Function to calculate time elapsed since the post was made
function calculateTimeElapsed($post_time)
{

    $current_time = time();
    $post_timestamp = strtotime($post_time);
    $time_diff = $current_time - $post_timestamp;

    if ($time_diff < 60) {
        return "Just now";
    } elseif ($time_diff < 3600) {
        $minutes = floor($time_diff / 60);
        return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < 86400) {
        $hours = floor($time_diff / 3600);
        return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
    } else {
        $days = floor($time_diff / 86400);
        return $days . " day" . ($days > 1 ? "s" : "") . " ago";
    }
}

                  //end of php and sql codes  
              ?>

