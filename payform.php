<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Now Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        .bg-light {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 30px;
            font-size: 24px;
            text-align: center;
            font-size: 40px;
        }
        .checkbox-container {
            margin-top: 15px;
        }
        .checkbox-container input {
            margin-right: 10px;
        }
        .checkbox-container label {
            font-size: 14px;
        }
        .btn-success {
            background-color: blue;
            border: none;
        }
        .btn-success:hover {
            background-color: #e81b1b;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 p-4 bg-light rounded">
                <h1>Pay Now</h1>
                <form action="process_payment.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email Id:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="phone" class="form-label">Phone No.:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col">
                            <label for="amount" class="form-label">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <!-- File Upload Section -->
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Upload Image:</label>
                        <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept="image/*" required>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" name="terms" required>
                        <label>I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a></label>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Next</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
