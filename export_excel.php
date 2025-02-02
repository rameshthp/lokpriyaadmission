<?php
include 'config.php';

if (isset($_GET['class'])) {
    $class = $_GET['class'];
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename={$class}_students.xls");

    echo "ID\tName\tDOB\tFather's Name\tMother's Name\tAddress\tContact\tCertificate\n";

    $result = mysqli_query($conn, "SELECT * FROM students WHERE class='$class'");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "{$row['id']}\t{$row['name']}\t{$row['dob']}\t{$row['father_name']}\t{$row['mother_name']}\t{$row['address']}\t{$row['contact']}\t{$row['certificate_file']}\n";
    }
}
?>
