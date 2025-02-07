<?php
include 'db_connect.php';

// Ensure the uploads directory exists
$upload_dir = "E:/xampp/htdocs/phpm/uploads/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $address = $_POST['address'];

    // Handle file upload
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
        $fileName = basename($_FILES['fileUpload']['name']);
        $fileTmpName = $_FILES['fileUpload']['tmp_name'];
        $fileSize = $_FILES['fileUpload']['size'];
        $fileType = $_FILES['fileUpload']['type'];

        // Allowed file types
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];


       

        if (in_array($fileType, $allowed)) {
            $fileDestination = $upload_dir . $fileName;

            $fileDestination = "uploads/" . $fileName;
            move_uploaded_file($fileTmpName, "E:/xampp/htdocs/phpm/uploads/" . $fileDestination);
    

            // Move file to uploads folder
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Insert form data into database
                $stmt = $conn->prepare("INSERT INTO payment_db (name, email, phone, amount, address, image_path) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $email, $phone, $amount, $address, $fileDestination);

                if ($stmt->execute()) {
                    // Get last inserted ID
                    $user_id = $conn->insert_id;

                    // Redirect to confirmation page with user details
                    header("Location: confirmation.php?id=$user_id");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: Failed to upload file.";
            }
        } else {
            echo "Invalid file type. Only JPG, PNG, and GIF are allowed.";
        }
    } else {
        echo "Error: No file uploaded or an error occurred.";
    }

    $conn->close();
}
?>
