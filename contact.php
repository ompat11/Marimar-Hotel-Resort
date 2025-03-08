<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    




    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .contact_heading {
            text-align: center;
            font-size: 36px;
            margin-top: 20px;
            color: #333;
        }

        .contact {
            padding: 40px 0;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .col-lg-6 {
            width: 48%;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .section_title {
            font-size: 28px;
            font-weight: bold;
            color: #444;
            margin-bottom: 15px;
        }

        .contact_details {
            list-style: none;
            padding: 0;
        }

        .contact_details li {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .contact_details li i {
            margin-right: 10px;
            color: #007bff;
        }

        /* Form Styling */
        .contact_form {
            display: flex;
            flex-direction: column;
        }

        .contact_input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact_button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .contact_button:hover {
            background-color: #0056b3;
        }

        /* Google Map */
        .contact_map_container {
            width: 100%;
            margin-top: 30px;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                align-items: center;
            }

            .col-lg-6 {
                width: 90%;
            }
        }
        
    </style>
</head>
<body>

<h1 class="contact_heading">Contact Us</h1>
<div class="contact">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-6">
                <div class="section_title">Get in Touch</div>
                <p>If you have any questions, feel free to reach out. We're happy to help!</p>
                <ul class="contact_details">
                    <br>
                    <li><i class="fa-solid fa-hotel"></i> Marimar Hotel & Resort!</li>
                    <li><i class="fas fa-envelope"></i> marimar@contact.com</li>
                    <li><i class="fas fa-phone"></i> +91 8108131995</li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="section_title">Send Us a Message</div>
                <form action="https://api.web3forms.com/submit" method="POST" class="contact_form">
                    <input type="hidden" name="access_key" value="782231a4-f9ae-4b0d-af4f-454318f9d0d9">
                    <input type="text" class="contact_input" name="name" placeholder="Your Name"  required>
                    <input type="email" class="contact_input" name="email" placeholder="Your Email" required>
                    <textarea class="contact_input" name="message" placeholder="Your Message" required></textarea>
                    <button type="submit" class="contact_button">Send Message</button>
                    <p id="resultMessage"></p>
                </form>
                <script>
   
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();  // Prevent page reload
    var form = this;
    var formData = new FormData(form);
    
    fetch(form.action, {
        method: form.method,
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById("resultMessage").innerHTML = "✅ Message sent successfully!";
            form.reset();  // ✅ Clears all input fields
        } else {
            document.getElementById("resultMessage").innerHTML = "❌ Error sending message.";
        }
    })
    .catch(error => {
        document.getElementById("resultMessage").innerHTML = "❌ Error sending message.";
    });
});
</script>

            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="contact_map_container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.512347759537!2d72.85866137440361!3d19.041198382156182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8d24540ba2f%3A0x28d0648e98c826d0!2sSies%20College%20Of%20Arts%2C%20Science%20%26%20Commerce%2C%20Jain%20Society%2C%20Sion%2C%20Mumbai%2C%20Maharashtra%20400022!5e0!3m2!1sen!2sin!4v1738909999464!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  
    </div>
</div>

</body>
</html>
