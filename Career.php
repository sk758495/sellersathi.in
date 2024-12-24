<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Ensure the path to autoload.php is correct

$message = ''; // Initialize the message variable

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $program = htmlspecialchars(trim($_POST['program']));
    $field = htmlspecialchars(trim($_POST['field']));
    $qualification = htmlspecialchars(trim($_POST['qualification']));
    $schoolCollege = htmlspecialchars(trim($_POST['schoolCollege']));
    $percentage = htmlspecialchars(trim($_POST['percentage']));
    $expectedSalary = htmlspecialchars(trim($_POST['expectedSalary']));
    $workExperience = htmlspecialchars(trim($_POST['workExperience']));
    $lastCompany = htmlspecialchars(trim($_POST['lastCompany']));
    $yearsWorked = htmlspecialchars(trim($_POST['yearsWorked']));
    $lastSalary = htmlspecialchars(trim($_POST['lastSalary']));
    $motivation = htmlspecialchars(trim($_POST['motivation']));

    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        // Check if file is a PDF
        if ($fileType !== 'pdf') {
            $message = 'Only PDF files are allowed.';
        } else {
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'arjuncableconverters@gmail.com'; // Your SMTP username
                $mail->Password = 'mtrlfujdiyxxryjz'; // Use your App Password here
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; // Use 587 for TLS

                // Recipients
                $mail->setFrom('arjuncableconverters@gmail.com', 'Job Application');
                $mail->addAddress('hr.baroda@sellersathi.in', 'Recipient');

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'New Job Application Submission';
                $mail->Body = "
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        table { border-collapse: collapse; width: 100%; }
                        th, td { border: 1px solid #ddd; padding: 8px; }
                        th { background-color: #f2f2f2; }
                    </style>
                </head>
                <body>
                    <h2>New Job Application Submission</h2>
                    <table>
                        <tr><th>Name</th><td>$name</td></tr>
                        <tr><th>Program</th><td>$program</td></tr>
                        <tr><th>Field</th><td>$field</td></tr>
                        <tr><th>Qualification</th><td>$qualification</td></tr>
                        <tr><th>School/College</th><td>$schoolCollege</td></tr>
                        <tr><th>Percentage/CGPA</th><td>$percentage</td></tr>                        
                        <tr><th>Expected Salary</th><td>$expectedSalary</td></tr>
                        <tr><th>Work Experience</th><td>$workExperience</td></tr>
                        <tr><th>Last Company</th><td>$lastCompany</td></tr>
                        <tr><th>Years Worked</th><td>$yearsWorked</td></tr>
                        <tr><th>Last Salary</th><td>$lastSalary</td></tr>
                        <tr><th>Motivation</th><td>$motivation</td></tr>
                    </table>
                </body>
                </html>
                ";

                // Attach the uploaded PDF file
                $mail->addStringAttachment(file_get_contents($_FILES['file']['tmp_name']), $_FILES['file']['name']);

                // Send the email
                $mail->send();
                $message = 'Application submitted successfully.';
            } catch (Exception $e) {
                $message = "Application could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        $message = "No file was uploaded or there was an upload error.";
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
    <link rel="stylesheet" href="Career.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

    <!-- Navbar -->
    <!-- Updated Navbar with Links -->
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

    <!-- Navbar End -->

   <!--Why Join Us? -->
   
   <div class="container mt-3">
    <div class="text-center mb-4">
        <img src="images/career.jpg" style="border-radius: 30px; box-shadow: 0 0 10px black;" class="img-fluid" alt="Career Opportunities" />
    </div>

      <!-- WHO WE ARE -->
      <section class="py-5 bg-light ">
        <div class="container ">
            <div class="row align-items-center ">
                <div class="col-md-6 mb-4 ">
                    <h2 style="font-size: 1.2rem; font-weight: 600; color: purple; ">SELLER SATHI</h2>
                    <h1 style="font-weight: 800; ">WHO WE ARE</h1>
                    <p>Seller Sathi is the best E-commerce product cataloging and listing service company in Delhi, Mumbai, and across India helping sellers to sell products online on various marketplaces. Our specialized team of E-commerce cataloging services
                        will help you to grow online sales.</p>
                </div>
                <div class="col-md-6 text-center ">
                    <img src="images/LOGO-sellersathi.png " alt="Company Logo " class="mb-3 " style="max-height: 100px; ">
                    <div class="row ">
                        <div class="col-12 mb-3 ">
                            <div class="border p-3 ">
                                <i class="fas fa-check-circle text-success "></i>
                                <span> By managing your E-commerce product listings, image editing, and product content writing.</span>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="border p-3 ">
                                <i class="fas fa-check-circle text-success "></i>
                                <span> We are an official Seller partner of Flipkart, Amazon, Myntra, Snapdeal, and Ajio.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="bg-light p-4 rounded mb-4">
        <h2 class="font-weight-bold" style="color: #007bff;text-transform: uppercase;font-family: sans-serif; font-weight: 600;">Why Join Us?</h2>
        <p style="font-family: sans-serif; font-weight: 300;">At our company, we believe in fostering a collaborative and innovative work environment. We value each team member’s contributions and strive to provide opportunities for personal and professional growth. Join us to be part of a diverse team dedicated to excellence and making a difference.</p>
    </div>

    <!-- FOrm Start here-->

    <form class="form-card"  method="POST" enctype="multipart/form-data">

    <p class="font-weight-bold" style="font-family: sans-serif; font-weight: 600; font-size: 30px; color: darkblue;">Apply Now</p>
    <div class="form-group mb-4">
        <label for="name" class="font-weight-bold">Enter Your Full Name:</label>
        <input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name" required />
    </div>

    <div class="form-group mb-4">
        <label for="programSelect" class="font-weight-bold">Select Program:</label>
        <select id="programSelect" class="form-control" name="program" required>
            <option value="">-- Select an option --</option>
            <option value="internships">Internships</option>
            <option value="jobs">Jobs</option>
        </select>
    </div>

    <div class="form-group mb-4">
        <label for="fieldSelect" class="font-weight-bold">Which field are you interested in?</label>
        <select id="fieldSelect" class="form-control" name="field" required>
            <option value="">-- Select a field --</option>
            <option value="Sales Executive">Sales Executive</option>
            <option value="Sales Manager">Sales Manager</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Talent Acquisition">Talent Acquisition</option>
            <option value="HR Recruiter">HR Recruiter</option>
            <option value="HR Assistant">HR Assistant</option>
            <option value="Web Developer">Web Developer</option>
            <option value="Digital Marketing Executive">Digital Marketing Executive</option>
        </select>
    </div>

    <div class="form-group mb-4">
        <label for="qualificationSelect" class="font-weight-bold">Highest Qualification:</label>
        <select id="qualificationSelect" class="form-control" name="qualification" required>
            <option value="">-- Select Qualification --</option>
            <option value="10th">10th Pass</option>
            <option value="12th">12th Pass</option>
            <option value="degree">Degree</option>
            <option value="master">Master's</option>
        </select>
    </div>

    <div class="form-group mb-4">
        <label for="schoolCollegeName" class="font-weight-bold">School/College Name:</label>
        <input type="text" id="schoolCollegeName" class="form-control" name="schoolCollege" placeholder="Enter school/college name" required />
    </div>

    <div class="form-group mb-4">
        <label for="percentage" class="font-weight-bold">Percentage/CGPA:</label>
        <input type="number" id="percentage" class="form-control" name="percentage" placeholder="Enter percentage" required />
    </div>

    <div class="form-group mb-4">
    <label for="workExperience" class="font-weight-bold">Work Experience:</label>
    <select id="workExperience" class="form-control" name="workExperience" onchange="toggleExperienceFields()" required>
        <option value="">-- Select One --</option>
        <option value="fresher">Fresher</option>
        <option value="experienced">Experienced</option>
    </select>
</div>

<div id="experienceFields" class="d-none">
    <div class="form-group mb-4">
        <label for="lastCompany" class="font-weight-bold">Last Company Name:</label>
        <input type="text" id="lastCompany" class="form-control" name="lastCompany" placeholder="Enter last company name" />
    </div>
    <div class="form-group mb-4">
        <label for="yearsWorked" class="font-weight-bold">Years of Working:</label>
        <input type="number" id="yearsWorked" class="form-control" name="yearsWorked" placeholder="Enter years worked" />
    </div>
    <div class="form-group mb-4">
        <label for="lastSalary" class="font-weight-bold">Last Salary:</label>
        <input type="number" id="lastSalary" class="form-control" name="lastSalary" placeholder="Enter last salary" />
    </div>
     <div class="form-group mb-4">
        <label for="expectedSalary" class="font-weight-bold">Expected Salary:</label>
        <input type="number" id="expectedSalary" class="form-control" name="expectedSalary" placeholder="Enter expected salary" required />
    </div>
</div>


    <div class="form-group mb-4">
        <label for="motivation" class="font-weight-bold">Tell us why we should select you:</label>
        <textarea id="motivation" class="form-control" name="motivation" rows="3" placeholder="Your motivation" required></textarea>
    </div>

    <div class="form-group mb-4">
        <label for="file" class="font-weight-bold">Upload Your Resume:</label>
        <input type="file" id="file" class="form-control" name="file" accept=".pdf" required />
    </div>

    <div class="form-check mb-4">
        <input type="checkbox" class="form-check-input" id="termsCheck" required>
        <label class="form-check-label" for="termsCheck">I confirm that the details provided are accurate.</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit Application</button>
</form>
<section class="apply-section py-5">
    <div class="container">
        <?php if ($message): ?>
            <div class="alert alert-info text-center"><?php echo $message; ?></div>
        <?php endif; ?>
       
    </div>
</section>
</div>

<script>
    function showVacancies() {
        const program = document.getElementById('programSelect').value;
        const vacancyItems = document.getElementById('vacancyItems');
        const vacanciesList = document.getElementById('vacanciesList');

        vacancyItems.innerHTML = ''; // Clear previous items

        if (program === 'internships') {
            const internships = [
                'Sales Executive',
                'Sales Manager',
                'Talent Acquisition',
                'HR Recruiter',
                'HR Assistant',
                'Web Developer',
                'Digital Marketing Executive'
            ];
            internships.forEach(item => {
                vacancyItems.innerHTML += `<li>${item}</li>`;
            });
            vacanciesList.classList.remove('d-none');
        } else if (program === 'jobs') {
            const jobs = [
                'Sales Executive',
                'Sales Manager',
                'Receiptionist',
                'Talent Acquisition',
                'HR Recruiter',
                'HR Assistant',
                'Web Developer',
                'Digital Marketing Executive'
            ];
            jobs.forEach(item => {
                vacancyItems.innerHTML += `<li>${item}</li>`;
            });
            vacanciesList.classList.remove('d-none');
        } else {
            vacanciesList.classList.add('d-none');
        }
    }

    function toggleExperienceFields() {
    const workExperience = document.getElementById('workExperience').value; // Check the workExperience select value
    const experienceFields = document.getElementById('experienceFields');

    if (workExperience === 'experienced') {
        experienceFields.classList.remove('d-none'); // Show the experience fields if experienced is selected
    } else {
        experienceFields.classList.add('d-none'); // Hide otherwise
    }
}

</script>

 <!-- FOrm End here-->

    <!-- Footer section -->

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
                        <strong>Regional Head Office:</strong><br /> C 507-509 Time Sqaure, Harshadrai Mehta Marg, Fatehgunj, Vadodara – Gujarat. <br />
                        <br />B – 403 Speranza Nr.TGB Circal, LP Savani Road Pal, Surat
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
                <small>&copy; 2024 SellerSathi.</small>
            </div>
        </div>
    </footer>



    <script>
        function animateCount(elementId, targetCount) {
            let count = 0;
            const increment = Math.ceil(targetCount / 100);

            const updateCount = () => {
                count += increment;
                if (count > targetCount) {
                    count = targetCount;
                }
                document.getElementById(elementId).innerText = count;

                if (count < targetCount) {
                    requestAnimationFrame(updateCount);
                }
            };

            requestAnimationFrame(updateCount);
        }

        animateCount('sellersCount', 1000);
        animateCount('ordersCount', 1000);
        animateCount('revenueCount', 200);
        animateCount('brand', 250);
    </script>

    <script>
        document.addEventListener("scroll", function() {
            const benefits = document.querySelectorAll('.benifit');
            const scrollPosition = window.scrollY + window.innerHeight;

            benefits.forEach((benefit, index) => {
                const benefitPosition = benefit.getBoundingClientRect().top + window.scrollY;

                if (scrollPosition > benefitPosition + 100) { // Adjust 100 as needed
                    benefit.style.opacity = 1; // Make it visible
                    benefit.style.transform = 'translateY(0)'; // Move back to original position
                }
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>