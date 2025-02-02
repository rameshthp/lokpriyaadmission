<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('images/school_background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.2); /* Transparent White */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            color: white;
            max-width: 500px;
            margin: auto;
            backdrop-filter: blur(5px);
            text-align: center;
        }
        .logo {
            width: 80px;
            height: 80px;
        }
        .school-name {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
            color: white;
        }
        .admin-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
        }
        .admin-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<!-- Admin Login Button -->
<a href="admin_login.php" class="admin-btn">Admin Login</a>

<div class="container mt-5">
    <div class="form-container">
        <!-- School Logo -->
        <img src="images/school_logo.png" alt="School Logo" class="logo">
        <div class="school-name">SHREE LOKPRIYA SECONDARY SCHOOL</div>

        <h2>Online Admission Form</h2>
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Father's Name</label>
                <input type="text" name="father_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mother's Name</label>
                <input type="text" name="mother_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Permanent Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contact Number</label>
                <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Class</label>
                <select name="class" class="form-control" required>
                    <option value="Play Group">Play Group</option>
                    <option value="Nursery">Nursery</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Upload Birth Certificate (PDF/Image)</label>
                <input type="file" name="certificate" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>


