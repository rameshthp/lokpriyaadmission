<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No student found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Student Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Details</h2>
        <table class="table table-bordered">
            <tr><th>ID</th><td><?= $row['id'] ?></td></tr>
            <tr><th>Name</th><td><?= $row['name'] ?></td></tr>
            <tr><th>Date of Birth</th><td><?= $row['dob'] ?></td></tr>
            <tr><th>Father's Name</th><td><?= $row['father_name'] ?></td></tr>
            <tr><th>Mother's Name</th><td><?= $row['mother_name'] ?></td></tr>
            <tr><th>Address</th><td><?= $row['address'] ?></td></tr>
            <tr><th>Contact Number</th><td><?= $row['contact'] ?></td></tr>
            <tr><th>Class</th><td><?= $row['class'] ?></td></tr>
            <tr>
                <th>Birth Certificate</th>
                <td>
                    <a href="<?= $row['certificate_file'] ?>" download>Download Certificate</a>
                </td>
            </tr>
        </table>
        <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
