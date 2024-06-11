<?php 
    $query = "SELECT S.student_id, S.student_fname, S.student_lname, S.students_id,  S.student_nrc, S.choice, P.transaction_id, P.transaction_date, P.network, P.bank, P.account_number, P.amount, P.student_id, P.student_nrc
              FROM students S
              JOIN payments P ON S.student_id = P.student_id
              WHERE S.student_id = {$_SESSION['student_id']}";

    $data = mysqli_query($conn, $query);
    $result = mysqli_num_rows($data);

    if ($result) {
        while ($row = mysqli_fetch_array($data)) {
?>
            <tr>
                <td><?php echo $row['transaction_id'];?></td>
                <td><?php echo $row['transaction_date'];?></td>
                <td><?php echo $row['network'];?></td>
                <td><?php echo $row['bank'];?></td>
                <td><?php echo $row['account_number'];?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['student_nrc'] . '/ ' . $row['students_id'];?></td>
                <td><?php echo $row['student_fname'] . ' ' . $row['student_lname'];?></td>
                <td><?php echo $row['choice'];?></td>
                <td><button><a href="#">Generate</a></button></td>
            </tr>
<?php
        }
    } else {
?>
        <tr>
            <td>You will see your transaction history upon making a payment!</td>
        </tr>
<?php
    }
?>
