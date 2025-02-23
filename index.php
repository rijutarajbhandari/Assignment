<?php  include "includes/header.php";  ?>

<section class="banner">
    <div class="slider">
        <img src="img/secpay.jpg" alt="Slide 1" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
        <img src="img/fasttrans.jpg" alt="Slide 2" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
        <img src="img/globalaccess.jpg" alt="Slide 3" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
    </div>
</section>

<section class="icon-block">
    <h2>Outsource Payment Collection</h2>
    <h2> Faster and flexible access to cash flow from one or all your invoices</h2>
    <div id="post-container">
        <?php include "php/fetch_posts.php"; ?>
    </div>
</section>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        <p>Your daily to-do list</p>
        <div class="task-box">
            <ul id="task-list">
                <li><input type="checkbox"> Task Item One <button class="delete">Delete</button></li>
                <li><input type="checkbox" checked> Task Item Two <button class="delete">Delete</button></li>
            </ul>
            <input type="text" id="new-task" placeholder="Add new task">
            <button id="add-task">Add Task</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<script src="js/task_manager.js"></script>

    <h2>Contact Us</h2>
    <form id="contactForm" action="php/contact.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <!-- Honeypot Field (Hidden) -->
        <input type="text" id="honeypot" name="honeypot" style="display: none;">
        <label for="captcha">What is 3 + 2?</label>
        <input type="text" id="captcha" name="captcha" required>


        <button type="submit">Send Message</button>
        <p id="formMessage"></p>
    </form>

    <script src="js/validate.js"></script>
</body>
</html>

<?php include 'includes/footer.php'; ?>

