<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Ensure the path to autoload.php is correct

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $zip = htmlspecialchars($_POST['zip']);
    $contact = htmlspecialchars($_POST['contact']);
    $services = htmlspecialchars($_POST['services']);

    $mail = new PHPMailer(true);

   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'arjuncableconverters@gmail.com'; // Your SMTP username
        $mail->Password = 'qnxlyhxxigecbqls'; // Use your App Password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Use 587 for TLS

        // Recipients
        $mail->setFrom('arjuncableconverters@gmail.com', 'Seller Sathi');
        $mail->addAddress('arjuncableconverters@gmail.com', 'Recipient'); 

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Name: $name\nEmail: $email\nZip Code: $zip\nContact Number: $contact\nServices: $services";

        // Send the email
        $mail->send();
        $message = 'Message sent successfully.';
    } catch (Exception $e) {
        $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Sathi</title>
    <link rel="icon" href="images/LOGO-sellersathi.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="contact_us.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="box-shadow: 0 0 10px black">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/LOGO-sellersathi.png" alt="Logo" class="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html" role="tab" aria-controls="nav-home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.html" role="tab" aria-controls="nav-profile">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.html" role="tab" aria-controls="nav-services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.html" role="tab" aria-controls="nav-reviews" disabled>Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php" role="tab" aria-controls="nav-contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Career.php" role="tab" aria-controls="nav-contact">Career</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        // Get the current page URL
        const currentPage = window.location.pathname.split('/').pop();

        // Get all nav links
        const navLinks = document.querySelectorAll('.nav-link');

        // Loop through links and set active class based on the current page
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });
    </script>

    <!-- Contact Us Section -->
    <section class="contact-us-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <?php if (isset($message)): ?>
                <div class="alert alert-info text-center"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="contact_us.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6 col-12">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="email">Your Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-12">
                        <label for="zip">Your Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter your zip code" required>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="contact">Your Contact Number</label>
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="services">What Services Are You Interested In?</label>
                    <select class="form-control" id="services" name="services" required>
                        <option value="" disabled selected>Select a service</option>
                        <option value="ecommerce">Ecommerce Seller Account</option>
                        <option value="investment">Short Time Investment</option>
                        <option value="warehouse">Warehouse</option>
                        <option value="b2b">B2B / Offline Product Trading</option>
                        <option value="Development">Website Development</option>                               
                    </select>
                </div>
                <button type="submit" name="send" style="margin-top: 10px;" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
     
    <footer class="bg-dark text-light py-5 ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-3 tex3-center mb-4 ">
                    <img src="images/LOGO-sellersathi.png " alt="Company Logo " class="mb-3 " style="max-height: 80px " />
                    <div>
                        <a href="https://www.facebook.com/dhanji.bharwad.3/ " class="text-light mx-2 "><i
                                    class="fab fa-facebook-f "></i></a>
                        <a href="https://www.instagram.com/seller_sathi_vadodara " class="text-light mx-2 "><i
                                    class="fab fa-instagram "></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3 ">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled ">
                        <li><a href="service.html " class="text-light ">Services</a></li>
                        <li><a href="reviews.html " class="text-light ">Reviews</a></li>
                        <li><a href="about_us.html " class="text-light ">About Us</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-3 ">
                    <h5><a href="faq.html">FAQs</a></h5>
                    <ul class="list-unstyled ">
                        <li><a href="term-condition.html" class="text-light ">Terms and
                                    Conditions</a></li>
                        <li><a href="privacy_policy.html " class="text-light ">Privacy
                                    Policy</a></li>
                        <li>
                            <a href="contact_us.php " class="text-light ">Contact Us</a>
                        </li>
                        <li><a href="tel:9624402490 " class="text-light ">Call
                                    Me</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-3 ">
                    <h5>Our Locations</h5>
                    <p>
                        <strong>Head Office:</strong><br />AMR Tech Park II, No.25 & 26, Hongasandra, Hosur Main Road, Bangalore – 560 068, India.
                    </p>
                    <p>
                        <strong>Regional Head Office:</strong><br /> 214 sunrise complex, Waghodia Rd, CROSSING, ROAD, above AXIS BANK, Chanda Nagar, Vrundavan, Vadodara, Gujarat - 390020 <br />
                        <br />B – 403 Speranza Nr.TGB Circal, LP Savani Road Pal, Surat - 395009
                    </p>
                    <p>
                        <strong>Our Branches:</strong><br />Bengaluru,Surat, Delhi, Mumbai, Hyderabad, Kochi, Chandigarh, Chennai.
                    </p>
                    <p>
                        <strong>Upcoming Branches:</strong><br />Rajkot, Raipur, Jaipur, Indore.
                    </p>
                </div>
            </div>
            <div class="text-center mt-4 ">
                <small>Copyright &copy; 2024 SellerSathi. All Rights Reserved</small>
            </div>
        </div>
    </footer>

   <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Bootstrap 5 JS and Popper.js (required for some components like dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
