<?php
if (isset($_POST['avail'])) {

  $_SESSION['from'] = $_POST['from'];
  $_SESSION['to']  = $_POST['to'];

  redirect(WEB_ROOT . "index.php?page=5");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo isset($title) ? $title . ' | Midway Minkay Restobar and Catering Services' :  'Midway Minkay Restobar and Catering Services'; ?></title>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //for-mobile-apps -->
  <link href="<?php echo WEB_ROOT; ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?php echo WEB_ROOT; ?>css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/chocolat.css" type="text/css" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/flexslider.css" type="text/css" media="screen" property="" />
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/jquery-ui.css" />
  <link href="<?php echo WEB_ROOT; ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?php echo WEB_ROOT; ?>css/ekko-lightbox.css" rel="stylesheet" />
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/modernizr-2.6.2.min.js"></script>
  <!--fonts-->
  <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <!--favicon-->
  <link rel="icon" type="image/png" href="<?php echo WEB_ROOT; ?>favicon/favicon_midway-modified.png">
</head>

<!--  -->
<?php
if (isset($_SESSION['monbela_cart'])) {
  if (count($_SESSION['monbela_cart']) > 0) {
    $cart = '<span class="carttxtactive"> ' . count($_SESSION['monbela_cart']) . ' </span>';
  }
}
if (isset($_SESSION['activity'])) {
  if (is_array($_SESSION['activity']) && count($_SESSION['activity']) > 0) {
    $activity = '<span class="carttxtactive"> ' . count($_SESSION['activity']) . ' </span>';
  }
}
?>
<!--  -->

<body>

  <?php include $small_nav; ?>

  <div class="w3_navigation">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header navbar-left">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="index.php">Midway <span>Minkay</span>
              <p class="logo_w3l_agile_caption">Your Dreamy Resort</p>
            </a></h1>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <nav class="menu menu--iris">
            <?php
            $accomodation = new Accomodation();
            $cur = $accomodation->listOfaccomodation();
            ?>
            <ul class="nav navbar-nav menu__list">
              <li class="menu__item"><a href="<?php echo WEB_ROOT; ?>index.php" class="menu__link">Home</a></li>
              <li class="menu__item"><a href="<?php echo WEB_ROOT; ?>index.php?p=about" class="menu__link">About</a></li>
              <li class="menu__item"><a href="<?php echo WEB_ROOT; ?>index.php?p=gallery" class="menu__link">Gallery</a></li>
              <li class="menu__item"><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms" class="menu__link">Rooms</a></li>
              <li class="menu__item"><a href="<?php echo WEB_ROOT; ?>index.php?p=contact" class="menu__link">Contact Us</a></li>
            </ul>
          </nav>
          <script>
            var currentURL = window.location.href;
            var menuItems = document.querySelectorAll(".menu__item");

            menuItems.forEach(function(menuItem) {
              var link = menuItem.querySelector(".menu__link");
              if (link.href === currentURL) {
                menuItem.classList.add("menu__item--current");
              }
            });
          </script>

        </div>
      </nav>

    </div>
  </div>

  <!-- main content -->
  <?php
  require_once $content;
  ?>
  <!-- /main content -->

  <!-- footer -->
  <div class="copy">
    <p>© 2014 MIDWAY . All Rights Reserved | Design by <a href="index.php">MIDWAY MINKAY</a> </p>
  </div>
  <!--/footer -->

  <!-- Modal photo -->
  <div class="modal fade" id="myModalPhoto" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">X</button>

          <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
        </div>

        <form action="<?php echo WEB_ROOT; ?>guest/update.php" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="form-group">
              <div class="rows">
                <div class="col-md-12">
                  <div class="rows">
                    <div class="col-md-8">
                      <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> <input id="image" name="image" type="file">
                    </div>

                    <div class="col-md-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="savephoto" type="submit">Upload Photo</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- js -->
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/jquery-2.1.4.min.js"></script>
  <!-- contact form -->
  <script src="<?php echo WEB_ROOT; ?>js/jqBootstrapValidation.js"></script>

  <!-- /contact form -->
  <!-- Calendar -->
  <script src="<?php echo WEB_ROOT; ?>js/jquery-ui.js"></script>
  <script>
    $(function() {
      $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
    });
  </script>
  <!-- //Calendar -->
  <!-- gallery popup -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT; ?>css/swipebox.css">
  <script src="<?php echo WEB_ROOT; ?>js/jquery.swipebox.min.js"></script>
  <script type="text/javascript">
    jQuery(function($) {
      $(".swipebox").swipebox();
    });
  </script>
  <!-- //gallery popup -->
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/move-top.js"></script>
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
  <!-- flexSlider -->
  <script defer src="<?php echo WEB_ROOT; ?>js/jquery.flexslider.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider) {
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  <!-- //flexSlider -->
  <script src="<?php echo WEB_ROOT; ?>js/responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function() {
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 500,
        namespace: "callbacks",
        before: function() {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function() {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
  <!--search-bar-->
  <script src="<?php echo WEB_ROOT; ?>js/main.js"></script>
  <!--//search-bar-->
  <!--tabs-->
  <script src="<?php echo WEB_ROOT; ?>js/easy-responsive-tabs.js"></script>
  <script>
    $(document).ready(function() {
      $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
          var $tab = $(this);
          var $info = $('#tabInfo');
          var $name = $('span', $info);
          $name.text($tab.text());
          $info.show();
        }
      });
      $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
      });
    });
  </script>
  <!--//tabs-->
  <!-- smooth scrolling -->
  <script type="text/javascript">
    $(document).ready(function() {

      $().UItoTop({
        easingType: 'easeOutQuart'
      });
    });
  </script>

  <div class="arr-w3ls">
    <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  </div>
  <!-- //smooth scrolling -->
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-3.1.1.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>js/ekko-lightbox.js"></script>
</body>

</html>