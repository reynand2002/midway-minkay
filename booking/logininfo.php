<div class="about-wthree">
  <div class="container">
    <div id="accom-title">
      <div class="pagetitle">
        <h1>Your Booking Cart

        </h1>
      </div>
    </div>
    <div id="bread">
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a>
        </li>
        <li><a href="<?php echo WEB_ROOT; ?>booking/">Booking Cart</a></li>

        <li class="active">Verify Accounts</li>
      </ol>
    </div>
    <!-- end title -->
    <!-- ================================================================ -->
    <!-- content -->
    <!-- verify accounts -->
    <div class="col-md-12">
      <!-- Verify accounts -->
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-sign-in"></i> Login</a>
        </li>
        <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-edit"></i> Register</a>
        </li>

      </ul>

      <div class="col-md-12">
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="service-one">
            <h4>Log In</h4>
            <?php echo logintab(); ?>
          </div>

          <div class="tab-pane fade" id="service-two">
            <?php require_once 'personalinfo.php'; ?>
          </div>

        </div>
      </div>


    </div>

    <!-- end verify accounts  -->
    <?php

    function logintab()
    {
    ?>
      <div class="col-md-6">
        <?php
        // Check if there is a message in the session
        if (isset($_SESSION['message'])) {
          $message = $_SESSION['message'];

          echo "<div class=''>$message</div>";

          // Clear the session message to prevent displaying it on subsequent page loads
          unset($_SESSION['message']);
        }
        ?>
        <form action="<?php echo WEB_ROOT . "login.php" ?>" method="post" onsubmit="return validateLogin()">
          <div class="form-group has-feedback">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
              <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group has-feedback">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <input type="password" class="form-control" name="pass" id="passwordField" placeholder="Password">
          </div>
          <div class="checkbox">
              <label>
                  <input name="remember" type="checkbox" id="showPasswordCheckbox" onchange="togglePasswordMe()"> Show Password
              </label>
          </div>
          <div class="row">
              <div class="col-xs-4">
                  <button type="submit" name="gsubmit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
          </div>
      </form>
      <script>
          function togglePasswordMe() {
              var passwordField = document.getElementById("passwordField");
              var showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

              if (showPasswordCheckbox.checked) {
                  passwordField.type = "text";
              } else {
                  passwordField.type = "password";
              }
          }
      </script>
      </div>

      <script>
        function validateLogin() {
          var username = document.getElementsByName("username")[0].value;
          var password = document.getElementsByName("pass")[0].value;

          if (username === "" || password === "") {
            alert("Please enter both username and password.");
            return false;
          }

          return true;
        }
      </script>
      <?php
    }

    function listofbooking()
    {

      $payable = 0;
      if (isset($_SESSION['monbela_cart'])) {
        $count_cart = count($_SESSION['monbela_cart']);

      ?>
        <!-- list -->
        <div class="row">
          <div class="col-md-4">
            <div style="overflow:scroll;  height:300px;">

              <?php
              for ($i = 0; $i < $count_cart; $i++) {

                $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id` AND room_id=" . $_SESSION['monbela_cart'][$i]['monbelaroomid'];
                $mydb->setQuery($query);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {

              ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <!-- <h4>Payment</h4> -->
                        </div>
                        <div class="panel-body">

                          <div class="col-md-12">
                            <label>Room:</label><br />
                            <?php echo  $result->room . ' | ' . $result->room_description; ?>
                          </div>

                          <div class="col-md-6">
                            <label>Arrival:</label>
                            <?php echo  date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckin']), "m/d/Y"); ?>
                          </div>

                          <div class="col-md-6">
                            <label>Departure:</label>
                            <?php echo  date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckout']), "m/d/Y"); ?>
                          </div>

                          <div class="col-md-12" style="float:left;border-top:1px solid #000;">
                            <label>Summary</label>
                          </div>

                          <div style="float:right">

                            <div class="col-md-12">
                              <label>Price:</label>
                              <?php echo  ' &#8369 ' . $result->price; ?>
                            </div>

                            <div class="col-md-12">
                              <label>Days:</label>
                              <?php echo   $_SESSION['monbela_cart'][$i]['monbeladay']; ?>
                            </div>

                            <div class="col-md-12">
                              <label>Total:</label>
                              <?php echo ' &#8369 ' .   $_SESSION['monbela_cart'][$i]['monbelaroomprice']; ?>
                            </div>

                          </div>

                        </div>

                        <div class="panel-footer">

                        </div>
                      </div>
                    </div>
                  </div>
            <?php
                }

                $payable += $_SESSION['monbela_cart'][$i]['monbelaroomprice'];
              }
              $_SESSION['pay'] = $payable;
            }
            ?>
            <div class="col-md-12">
              <div class="row">
                <label style="float:left">Overall Price</label>
                <h2 style="float:right"> &#8369 <?php echo   $_SESSION['pay']; ?></h2>
              </div>
            </div>


            </div>

          </div>
        </div>
        <!-- end list -->

        <!-- end content -->
        <!-- =========================================================================== -->
      <?php } ?>
  </div>
</div>