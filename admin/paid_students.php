<?php
include "dbh.php";
$query = "SELECT S.student_id, S.student_fname, S.student_lname, S.student_nrc, S.choice, P.transaction_id, P.transaction_date, P.network, P.bank, P.account_number, P.amount
FROM students S
JOIN payments P ON S.student_id = P.student_id";    

$data = mysqli_query($conn, $query );
$result = mysqli_num_rows($data);
if ($result) {
    while ($row = mysqli_fetch_assoc($data)) {
        // Assuming you have the necessary variables, modify as needed
        $Receipt = rand(100, 9) * 15 + time();
        $receiptId = "mmce$Receipt";
        $amount = $row['amount'];
        $studentId = $row['student_id'];
        $transactionDate = $row['transaction_date'];
?>
        <tr>
            <td><?php echo $row['student_nrc'] . '/ ' . $row['student_id'];?></td>
            <td><?php echo $row['student_id'];?></td>
            <td><?php echo $row['student_fname'] . ' ' . $row['student_lname'];?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['transaction_date']; ?></td>
            <td><button class="btn text-light btn-primary" onclick="generateReceipt('<?php echo $receiptId; ?>', '<?php echo $amount; ?>', '<?php echo $studentId; ?>', '<?php echo $transactionDate; ?>')">Generate</button></td>
        </tr>
<?php
    }
} else {
?>
    <tr>
        <td>No record Found</td>
    </tr>
<?php
}
// end of PHP and SQL codes
?>
