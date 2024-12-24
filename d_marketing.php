<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Ensure the path to autoload.php is correct

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $profiles = htmlspecialchars($_POST['profiles']);
    $address = htmlspecialchars($_POST['address']);

    $mail = new PHPMailer(true);

    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'arjuncableconverters@gmail.com';
        $mail->Password = 'mtrlfujdiyxxryjz'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Admin email details
        $mail->setFrom('bm.baroda@sellersathi.in', 'Digital-Marketing Application');
        $mail->addAddress('bm.baroda@sellersathi.in', 'Admin');

        $mail->isHTML(true);
        $mail->Subject = 'New Digital-Marketing Application Submission';
        $mail->AddEmbeddedImage('images/LOGO-sellersathi.png', 'logo_img');
        $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                .email-container { background: white; padding: 20px; border-radius: 8px; }
                h2 { color: #333; }
                p { font-size: 16px; line-height: 1.6; }
                .info-box { background: #f7f7f7; padding: 15px; border-radius: 8px; margin-top: 10px; }
            </style>
        </head>
        <body>
            <div class='email-container'>
            <h2>New Digital-Marketing Application Details</h2>
            <div class='info-box'>
            <img src='cid:logo_img' alt='Company Logo' style='max-height: 80px; text-align:center;'>
                    <p><strong>Full Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Contact Number:</strong> $contact</p>
                    <p><strong>Social Media Links:</strong> $profiles</p>
                    <p><strong>Address:</strong> $address</p>
                </div>
            </div>
        </body>
        </html>";

        $mail->send();

        // Reply email to the applicant
        $replyMail = new PHPMailer(true);
        $replyMail->isSMTP();
        $replyMail->Host = 'smtp.gmail.com';
        $replyMail->SMTPAuth = true;
        $replyMail->Username = 'arjuncableconverters@gmail.com';
        $replyMail->Password = 'mtrlfujdiyxxryjz'; 
        $replyMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $replyMail->Port = 587;

        $replyMail->setFrom('bm.baroda@sellersathi.in', 'Digital-Marketing Application Reply');
        $replyMail->addAddress($email, $name);

        $replyMail->isHTML(true);
        $replyMail->Subject = 'Thank you for your application!';        
        $replyMail->AddEmbeddedImage('images/LOGO-sellersathi.png', 'logo_img_user');
        $replyMail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                .email-container { background: white; padding: 20px; border-radius: 8px; }
                h2 { color: #333; }
                p { font-size: 16px; line-height: 1.6; }
                .footer { margin-top: 20px; color: #777; font-size: 14px; }
            </style>
        </head>
        <body>
            <div class='email-container'>            
                <img src='cid:logo_img_user' alt='Company Logo' style='max-height: 80px; text-align:center;'>
                <h2>Dear $name,</h2>
                <p>Thank you for expressing interest in our Digital-Marketing services. We have successfully received your application.</p>
                
                <p>We are pleased to inform you that we provide comprehensive Digital Marketing services, including managing your social media accounts, creating marketing strategies, and running campaigns tailored to your business needs.</p>

                <p>Our team will review your requirements and send a customized quotation shortly. Please find the attached Digital-Marketing service guide PDF for detailed information about our services and packages.</p>
                
                <p>For further queries, feel free to contact our support team at <a href='mailto:bm.baroda@sellersathi.in'>bm.baroda@sellersathi.in</a>.</p>

                <p class='footer'>Best regards,<br>Recruitment Team<br>Seller-Sathi</p>
            </div>
        </body>
        </html>";

        // Attach PDF file
        $replyMail->addAttachment('pdf/Seller_Sathi-Pricing_Details.pdf', 'Quotation_Guide.pdf');

        $replyMail->send();

       // Success message
       echo "Your application has been successfully submitted. A confirmation email has been sent to you.";
    } catch (Exception $e) {
        // Error message
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>





<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Career Application Form</title>
        <link rel="icon" href="images/LOGO-sellersathi.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Custom CSS for the page */
            
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
            }
            
            .hero {
                background-color: #007bff;
                color: white;
                text-align: center;
                padding: 100px 0;
            }
            
            .hero h1 {
                font-size: 3.5rem;
                font-weight: bold;
            }
            
            .form-container {
                margin-top: 50px;
                background-color: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            
            .form-container h2 {
                font-size: 2rem;
                margin-bottom: 20px;
            }
            
            .form-group label {
                font-weight: bold;
            }
            
            .form-group input,
            .form-group textarea {
                border-radius: 5px;
                border: 1px solid #ccc;
                padding: 10px;
                width: 100%;
            }
            
            .form-group input[type="submit"] {
                background-color: #007bff;
                color: white;
                font-weight: bold;
                border: none;
                cursor: pointer;
                padding: 10px 20px;
            }
            
            .form-group input[type="submit"]:hover {
                background-color: #0056b3;
            }
            
            .footer {
                background-color: #343a40;
                color: white;
                padding: 30px 0;
                text-align: center;
            }
            
            .footer a {
                color: white;
                text-decoration: none;
            }
            
            .footer a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>

        <!-- Hero Section -->
        <div class="hero">
            <div class="container">
                <h1>Join Our Team</h1>
                <p class="lead">Apply now by filling out the form below. We would love to hear from you!</p>
            </div>
        </div>

        <!-- Application Form Section -->
        <div class="container form-container">
            <h2>Social Media Application Form</h2>
            <form id="application-form"  method="POST" enctype="multipart/form-data">
                <!-- Name Field -->
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <!-- Email Field -->
                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <!-- Contact Number Field -->
                <div class="form-group mb-3">
                    <label for="contact">Contact Number</label>
                    <input type="text" id="contact" name="contact" class="form-control" required>
                </div>

                <!-- Profile Links Field -->
                <div class="form-group mb-3">
                    <label for="profiles">Your Social Medial Platform Link</label>
                    <input type="text" id="profiles" name="profiles" class="form-control" placeholder="https://your-social-media-account-link.com" required>
                    <p><span style="color: #007bff;">Enter multiple links separated by commas(,)</span></p>
                </div>

                <!-- Address Field -->
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="form-group mb-3 text-center">
                    <input type="submit" value="Submit Application" class="btn btn-primary">
                </div>
            </form>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; 2023 Seller-Sathi. All rights reserved.</p>

        </div>

        <!-- Bootstrap JS & Custom JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>