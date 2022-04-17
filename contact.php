<?php 
  $errorFirstName = '';
  $errorEmail = '';
  $errorSubject = '';
  $errorMessage = '';

  $successMessage = '';

  if(isset($_POST['submit'])) {

      if(!$_POST['first_name']) {
          $errorFirstName = "Please enter your Name";
      }
      
      if(!$_POST['email'] || !preg_match("/^\S+@\S+$/", $_POST['email'])) {
          $errorEmail = "Please enter a valid Email address";
      }
      
      if(!$_POST['subject']) {
        $errorSubject = "Please enter the subject";
      } 
      
      if(!$_POST['message']) {
          $errorMessage = "Please enter your comment in the Message box";
      }

      if (empty($errorFirstName) && empty($errorEmail) && empty($errorSubject) && empty($errorMessage)) {
          $message = $_POST['first_name'] . " wrote the following:" . "\n\n" . $_POST['message'];
          $headers = "From:" . $_POST['email'];

          mail("berelacortez@gmail.com", $_POST['subject'], $message, $headers);

          $successMessage = "Thank you " . $_POST['first_name'] . ", I'll contact you shortly.";

          $_POST['first_name'] = '';
          $_POST['email'] = '';
          $_POST['subject'] = '';
          $_POST['message'] = '';
          // header("Location: https://berelacortez.com");
        }
      }
  ?>


<?php require_once './header.php'; ?>

  <main id="main">

    <section class="section pt-5 pb-5 mb-md-5">
      <div class="container">

        <!--<div class="row mb-5 align-items-end">
          <div class="col-md-6" data-aos="fade-up">
            <h2>Let's Talk</h2>
            <p class="mb-0">Send me an email or start a conversation.</p>
          </div>

        </div>-->

        <div class="row border-form">
          <div class="col-md-8 mb-5 mb-md-0 p-5" data-aos="fade-up">

          <?php 
            if(!empty($successMessage)) {
              echo "<div class='alert alert-success'>",htmlspecialchars($successMessage),"</div>";
            }
          ?>

           <form action="" method="post">
              <div class="row">
                <div class="col-md-12 mb-2" data-aos="fade-up">
                  <h2>Let's Talk</h2>
                  <p>Send me an email or start a conversation.</p>
                </div>
                <div class="col-md-6 mt-4 form-group"> 
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>"/>
                    <?php 
                      if(!empty($errorFirstName)) {
                        echo "<p style=\"color: red;\">",htmlspecialchars($errorFirstName),"</p>\n\n";
                      }
                    ?>
                </div>
                <div class="col-md-6 mt-4 form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control"  name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
                  <?php 
                      if(!empty($errorEmail)) {
                        echo "<p style=\"color: red;\">",htmlspecialchars($errorEmail),"</p>\n\n";
                      }
                    ?>
                </div>
                <div class="col-md-12 mt-4 form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : '' ?>"/>
                  <?php 
                      if(!empty($errorSubject)) {
                        echo "<p style=\"color: red;\">",htmlspecialchars($errorSubject),"</p>\n\n";
                      }
                    ?>
                </div>
                <div class="col-md-12 mt-4 form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="message" cols="20" rows="10" ><?php echo isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                  <?php 
                      if(!empty($errorMessage)) {
                        echo "<p style=\"color: red;\">",htmlspecialchars($errorMessage),"</p>\n\n";
                      }
                    ?>
                </div>

                <div class="col-md-4 mt-4 form-group">
                  <input type="submit" name="submit" value="Submit" class="cta d-block w-100">
                </div>
              </div>

            </form>

          </div> 


          <div class="col-md-4 ml-auto order-2 p-5 contact-dark" data-aos="fade-up">
          <h4 class="mb-4">Contact</h4>
            <ul class="list-unstyled">
            <li class="mb-4">
                <strong class="d-block mb-1">Email</strong>
                <span class="font-weight-light">berelacortez@gmail.com</span>
              </li>
              <li class="mb-4">
                <strong class="d-block mb-1">Behance</strong>
                <span class="font-weight-light">berelacortez</span>
              </li>
              <li class="mb-4">
                <strong class="d-block mb-1">Instagram</strong>
                <span class="font-weight-light">@berelacortez</span>
              </li>
             
            </ul>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <?php require_once './footer.php'; ?> 

</body>

</html>