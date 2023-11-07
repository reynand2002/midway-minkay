    <!-- contact -->
    <section class="contact-w3ls" id="contact">
        <div class="container">
            <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
                <div class="contact-agileits">
                    <h4>Contact Us</h4>
                    <p class="contact-agile2">Sign Up For Our News Letters</p>
                    <form method="post" name="sentMessage" id="contactForm">
                        <div class="control-group form-group">

                            <label class="contact-p1">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required>
                            <p class="help-block"></p>

                        </div>
                        <div class="control-group form-group">

                            <label class="contact-p1">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            <p class="help-block"></p>

                        </div>


                        <input type="submit" name="sub" value="Send Now" class="btn btn-primary">
                    </form>
                    <?php
                    if (isset($_POST['sub'])) {
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $approval = "Not Allowed";
                        $sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')";


                        if (mysqli_query($con, $sql))
                            echo "OK";
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
                <h4>Connect With Us</h4>
                <p class="contact-agile1"><strong>Phone :</strong>0975-081-5326 | 0927-285-5608</p>
                <p class="contact-agile1"><strong>Email :</strong> <a href="mailto:midway1115@yahoo.com">midway1115@yahoo.com</a></p>
                <p class="contact-agile1"><strong>Address :</strong> P3A, Tubigan, Initao, Mis. Or. 9022</p>

                <div class="social-bnr-agileits footer-icons-agileinfo">
                    <ul class="social-icons3">
                        <li><a href="https://www.facebook.com/MidwayMinkayRCSOfficial" target="_blank" class="fa fa-facebook icon-border facebook"> </a></li>
                        <li><a href="https://twitter.com/?lang=en" target="_blank" class="fa fa-twitter icon-border twitter"> </a></li>
                        <li><a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram icon-border instagram"> </a></li>
                    </ul>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d586.5265239038306!2d124.31174806940497!3d8.531924040455044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3300240001f7828f%3A0x97066de8ecdb984e!2sMidway%20Minkay%20Beach%20Resort!5e0!3m2!1sen!2sph!4v1697857540577!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- /contact -->