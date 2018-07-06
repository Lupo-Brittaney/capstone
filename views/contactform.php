<?php
// start session
session_start();

// page title name
$page_title = "Contact";

include 'head.php';
       
include 'header.php'; 
                
?>        
        <main>
            <h1>Contact</h1>
            <!-- get information from contact page, process it, send email and give confirmation or error message-->
                <?php
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $from = $email;
                $to = 'blupo473@brittaneylupo.com';



                $body = "From: $name\n E-Mail: $email\n Message: $message";

                if ($_POST['submit'] ) {
                  if (mail ($to, $body, $from)) {
                  echo '<p>Your message has been sent!</p>';
                } else {
                  echo '<p>Something went wrong, go back and try again!</p>';
                }
                }
                ?>
        

            
        </main>
<?php include 'footer.php'; ?>

