<?php
require_once('..//TCPDF-main/tcpdf.php');

function generateReceipt($receiptId, $amount, $studentName, $studentId, $transactionDate)
{
    // Create instance of TCPDF
    $pdf = new TCPDF();

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('times', 'B', 12);

    // Output the content
    $content = "
        <h3>Malcolm Moffat College of Education</h3>
        <h5>Receipt No: <span>{$receiptId}</span></h5>
        <h5>Amount paid: <span>{$amount}</span></h5>
        <h5>Student Name: <span>{$studentName}</span></h5>
        <h5>Student ID: <span>{$studentId}</span></h5>
        <h5>Transaction date: <span>{$transactionDate}</span></h5>
        <h5>Student phone: <span>0976445026</span></h5>
        <div class='stamp-area'>
            <label for=''>Stamp</label>
            <div class='stamp'></div>
        </div>
    ";

    $pdf->writeHTML($content, true, false, true, false, '');

    // Save the PDF content to a variable
    $pdfContent = $pdf->Output('receipt.pdf', 'S');

    // Open a new window with the PDF content
    echo "<script>window.open('data:application/pdf;base64," . base64_encode($pdfContent) . "', '_blank');</script>";
}

// Example usage
generateReceipt('123', '100', 'John Doe', 'ST123', '2022-02-15');
?>
