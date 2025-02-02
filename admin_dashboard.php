<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch students by class
$play_group_students = mysqli_query($conn, "SELECT * FROM students WHERE class='Play Group'");
$nursery_students = mysqli_query($conn, "SELECT * FROM students WHERE class='Nursery'");

// Delete student
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM students WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <a href="export_excel.php?class=Play Group" class="btn btn-success">Export Play Group to Excel</a>
        <a href="export_excel.php?class=Nursery" class="btn btn-success">Export Nursery to Excel</a>
        
        <h3 class="mt-4 text-primary">Play Group Students</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th><th>Name</th><th>DOB</th><th>Father's Name</th><th>Mother's Name</th><th>Address</th><th>Contact</th><th>Certificate</th><th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($play_group_students)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['father_name'] ?></td>
                <td><?= $row['mother_name'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><a href="<?= $row['certificate_file'] ?>" download>Download</a></td>
                <td>
                    <a href="edit_student.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="view_student.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="admin_dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <h3 class="mt-4 text-primary">Nursery Students</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th><th>Name</th><th>DOB</th><th>Father's Name</th><th>Mother's Name</th><th>Address</th><th>Contact</th><th>Certificate</th><th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($nursery_students)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['father_name'] ?></td>
                <td><?= $row['mother_name'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><a href="<?= $row['certificate_file'] ?>" download>Download</a></td>
                <td>
                    <a href="edit_student.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="view_student.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="admin_dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>


