<?php
// start session
session_start();

// page title name
$page_title = "Contact";

include 'head.php';

include 'header.php';
?>        
<main>
    <div class="container"><!--form container -->
        <h1>Contact</h1>
        <p>I would love to hear from you!</p>

        <form method="post" action="/index.php" id="contactform"> <!-- form to contact-->
            <input id="action" name="action" type="hidden" value="contact">
            <div class= "form-group">
                <label class = "col-form-label" for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label class = "col-form-label" for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label class = "col-form-label" for="message">Message:</label>
                <textarea  class="form-control" name="message" id="message" required></textarea>
            </div>
            <p>*All fields required</p>
            <input type='submit' name="submit" class= "btn btn-dark" id="submit" value="Send Email">
        </form>

    </div><!--form container -->


</main>
<?php include 'footer.php'; ?>

