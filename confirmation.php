<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database
    $stmt = $conn->prepare("SELECT * FROM payment_db WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        die("User not found.");
    }
    
    $stmt->close();
    $conn->close();
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #28a745;
        }
        .details {
            font-size: 18px;
            margin-top: 20px;
        }
        .img-container {
            text-align: center;
            margin-top: 20px;
        }
        .img-container img {
            max-width: 300px;
            border-radius: 8px;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Payment Successful!</h1>
        <p class="text-center">Thank you, <strong><?php echo $user['name']; ?></strong> for your payment.</p>

        <div class="details">
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone No.:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>Amount:</strong> <?php echo $user['amount']; ?></p>
            <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
        </div>

        <div class="img-container">
            <h3>Uploaded Image:</h3>
            <img src="<?php echo $user['image_path']; ?>" alt="Uploaded Image">

        </div>

        <div class="text-center mt-4">
            <a href="payform.php" class="btn btn-primary">Go to Home</a>
        </div>
    </div>

</body>
</html>
