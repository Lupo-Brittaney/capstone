      

            <!-- get information from contact page, process it, send email and give confirmation or error message-->
                <?php
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];
                $from = $email;
                $to = 'blupo473@brittaneylupo.com';
                $subject = "Message from colorado wild contact form";



                $body = "From: $name\n E-Mail: $email\n Message: $message";

                if ($_POST['submit'] ) {
                  if (mail ($to, $subject, $body)) {
                  $top_message = 'Your message has been sent!';
                  include 'contact.php';
                } else {
                  $top_message ='Something went wrong, go back and try again!';
                  include 'contact.php';
                }
                }
                ?>
        

            


