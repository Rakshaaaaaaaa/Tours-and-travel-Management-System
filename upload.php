<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $qualification = htmlspecialchars($_POST['qualification']);
    $skills = htmlspecialchars($_POST['skills']);

    if (isset($_FILES['resume'])) {
        $resume = $_FILES['resume'];
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($resume['name']);

        // Ensure upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move uploaded file
        if (move_uploaded_file($resume['tmp_name'], $uploadFile)) {
            echo "<p>Thank you, $name!</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Phone: $phone</p>";
            echo "<p>Date of Birth: $dob</p>";
            echo "<p>Gender: $gender</p>";
            echo "<p>Address: $address</p>";
            echo "<p>Qualification: $qualification</p>";
            echo "<p>Technical Skills: $skills</p>";
            echo "<p>Resume uploaded successfully: <a href='$uploadFile' target='_blank'>" . htmlspecialchars($resume['name']) . "</a></p>";
        } else {
            echo "<p style='color:red;'>Failed to upload resume.</p>";
        }
    } else {
        echo "<p style='color:red;'>No resume uploaded.</p>";
    }
} else {
    echo "<p style='color:red;'>Invalid request.</p>";
}

?>

