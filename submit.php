<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert alert-success text-center">🎉 Successfully Submitted!</div>';
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $class = $_POST['class'];

    // File Upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create folder if not exists
    }

    $file_name = basename($_FILES["certificate"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO students (name, dob, father_name, mother_name, address, contact, class, certificate_file) 
                VALUES ('$name', '$dob', '$father_name', '$mother_name', '$address', '$contact', '$class', '$target_file')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to index.php with success message
            header("Location: index.php?success=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "File upload failed!";
    }
}

mysqli_close($conn);
?>
