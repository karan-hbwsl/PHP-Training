<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error messages array
    $errors = [];
    $successMessage = '';

    // 1. Sanitize and validate user input
    // Full Name
    if (empty($_POST['name'])) {
        $errors[] = "Full name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST['name']));
    }

    // Email Address
    if (empty($_POST['email'])) {
        $errors[] = "Email address is required.";
    } else {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Interests (checkboxes)
    if (empty($_POST['interests'])) {
        $errors[] = "Please select at least one interest.";
    } else {
        $interests = $_POST['interests'];
    }

    // Country
    if (empty($_POST['country'])) {
        $errors[] = "Country selection is required.";
    } else {
        $country = htmlspecialchars(trim($_POST['country']));
    }

    // 2. If there are no errors, display the success message
    if (empty($errors)) {
        // Securely store the submitted data (e.g., database, file, etc.)
        // For this example, we'll just display the data for demonstration purposes.
        $successMessage = "<h2>Registration Successful!</h2>";
        $successMessage .= "<p><strong>Name:</strong> $name</p>";
        $successMessage .= "<p><strong>Email:</strong> $email</p>";
        $successMessage .= "<p><strong>Interests:</strong> " . implode(', ', $interests) . "</p>";
        $successMessage .= "<p><strong>Country:</strong> $country</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Registration - Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Newsletter Registration - Result</h2>

        <?php if (!empty($errors)) { ?>
            <div class="error">
                <h3>There were some problems with your submission:</h3>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } else { ?>
            <div class="success">
                <?php echo $successMessage; ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>



<!-- Sanitization & Validation:

Name: The name is sanitized with htmlspecialchars() and trim() to remove any unwanted characters or spaces. This helps prevent cross-site scripting (XSS) attacks.
Email: The email address is sanitized using filter_var() with FILTER_SANITIZE_EMAIL to remove unwanted characters and then validated with FILTER_VALIDATE_EMAIL to ensure it follows the correct format.
Interests: We ensure at least one checkbox is selected. If not, an error message is displayed. This prevents incomplete form submissions.
Country: The country field is checked to ensure it's selected (not empty).
Error Handling:

If any validation fails, the respective error messages are displayed to the user.
If there are no errors, a success message is shown with the collected data.
Security Considerations:

Cross-Site Scripting (XSS) Prevention: User inputs like name and country are sanitized with htmlspecialchars() to prevent any harmful scripts from being executed in the browser.
Email Validation: The email input is validated to ensure it follows the standard format, preventing malformed or invalid email addresses from being accepted.
Data Processing:

In this example, the data is displayed back to the user, but in a real application, you would store this data in a database securely.
Always ensure that you store sensitive data (like email addresses) in a secure manner, using hashed or encrypted formats as needed. -->