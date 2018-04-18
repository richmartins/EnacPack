<?php
  require_once 'init.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles/style.css"/>
  <title>Contact</title>
</head>
  <body>
    <?php require_once('templates/header.html'); ?>
    <div class="jumbotron jumbotron-fluid custjumbotron">
      <div class="container">
        <h1 class="display-3"><a href="index.php">EnacPack</a></h1>
        <p class="lead">Contact us if you've seen any bug or something that doesn't work.<br />Or if you have just any question. It'll be a pleasure to answer as soon as we can.</p>
      </div>
    </div>
    <div class="container">

      <section class="section">
          <h2 class="section-heading h1 pt-4">Contact us</h2>
          <p class="section-description">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you as soon as we can.</p>

          <div class="row">
              <div class="col-md-8 col-xl-9">
                  <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="md-form">
                                  <input type="text" id="name" name="name" class="form-control">
                                  <label for="name" class="">Your name</label>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="md-form">
                                  <input type="text" id="email" name="email" class="form-control">
                                  <label for="email" class="">Your email</label>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="md-form">
                                  <input type="text" id="subject" name="subject" class="form-control">
                                  <label for="subject" class="">Subject</label>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="md-form">
                                  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                  <label for="message">Your message</label>
                              </div>
                          </div>
                      </div>
                  </form>

                  <div class="center-on-small-only btn btn-danger btn-lg custbtn">
                      <a onclick="validateForm()">Send</a>
                  </div>
                  <div class="status"></div>
              </div>
              <div class="col-md-4 col-xl-3">
                  <ul class="contact-icons">
                      <li><i class="fa fa-map-marker fa-2x"></i>
                          <p>Lausanne, VD 1015, CH</p>
                      </li>

                      <li><i class="fa fa-phone fa-2x"></i>
                          <p>Tél. +41 (0)21 693 62 77</p>
                      </li>

                      <li><i class="fa fa-envelope fa-2x"></i>
                          <p>enac-it3@epfl.ch</p>
                      </li>
                  </ul>
              </div>

          </div>
      </section>


      <?php require_once('templates/footer.html'); ?>
    </div>
  </body>
</html>
