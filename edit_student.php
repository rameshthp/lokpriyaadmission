<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $class = $_POST['class'];

    $sql = "UPDATE students SET name='$name', dob='$dob', father_name='$father_name', mother_name='$mother_name', address='$address', contact='$contact', class='$class' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
    DOB: <input type="date" name="dob" value="<?= $row['dob'] ?>" required><br>
    Father's Name: <input type="text" name="father_name" value="<?= $row['father_name'] ?>" required><br>
    Mother's Name: <input type="text" name="mother_name" value="<?= $row['mother_name'] ?>" required><br>
    Address: <input type="text" name="address" value="<?= $row['address'] ?>" required><br>
    Contact: <input type="text" name="contact" value="<?= $row['contact'] ?>" required><br>
    Class:
    <select name="class" required>
        <option value="Play Group" <?= ($row['class'] == 'Play Group') ? 'selected' : '' ?>>Play Group</option>
        <option value="Nursery" <?= ($row['class'] == 'Nursery') ? 'selected' : '' ?>>Nursery</option>
    </select><br>
    <button type="submit" name="update">Update</button>
</form>
