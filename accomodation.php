<?php
$msg = "";

if (isset($_POST['booknow'])) {

  $days = 0;
  $day = dateDiff($_SESSION['arrival'], $_SESSION['departure']);

  if ($day <= 0) {
    $totalprice = $_POST['ROOMPRICE'] * 1;
    $days = 1;
  } else {
    $totalprice = $_POST['ROOMPRICE'] * $day;
    $days = $day;
  }

  addtocart($_POST['room_id'], $days, $totalprice, $_SESSION['arrival'], $_SESSION['departure']);

  redirect(WEB_ROOT . 'booking/');
}


if (!isset($_SESSION['arrival'])) {
  $_SESSION['arrival'] = date_create('Y-m-d');
}
if (!isset($_SESSION['departure'])) {
  $_SESSION['departure'] =  date_create('Y-m-d');
}


if (isset($_POST['booknowA'])) {


  $days = dateDiff($_POST['arrival'], $_POST['departure']);

  if ($days <= 0) {
    $msg = 'Available room today';
  } else {
    $msg =  'Available room From:' . $_POST['arrival'] . ' To: ' . $_POST['departure'];
  }


  $_SESSION['arrival'] = date_format(date_create($_POST['arrival']), "Y-m-d");
  $_SESSION['departure'] = date_format(date_create($_POST['departure']), "Y-m-d");



  $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`= a.`accomodation_id` AND `accomodation_name`='" . $_GET['q'] . "' AND `num_person` = " . $_POST['person'];
} elseif (isset($_GET['q'])) {

  $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`= a.`accomodation_id` AND `accomodation_name`='" . $_GET['q'] . "'";
}

$accomodation = ' | ' . $_GET['q'];
?>



<div id="accom-title">
  <div class="pagetitle">
    <h1><?php print $title; ?>
      <small><?php print  $accomodation; ?></small>
    </h1>
  </div>
</div>

<div id="bread">
  <ol class="breadcrumb">
    <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a>
    </li>
    <li class="active"><?php print $title; ?></li>
    <li style="color: #02aace; float:right"> <?php print  $msg; ?></li>
  </ol>
</div>

<div id="main" class="site-main clr">
  <div id="primary" class="content-area clr">
    <div id="content-wrap">
      <div class="col-lg-9">
        <div class="tabs-wrapper clr">
          <div class="row">

            <?php
            $arrival = $_SESSION['arrival'];
            $departure = $_SESSION['departure'];

            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {
              // filtering the rooms
              // ======================================================================================================
              $mydb->setQuery("SELECT * FROM `reservation`     WHERE status<>'Pending' AND ((
            '$arrival' >= DATE_FORMAT(`arrival`,'%Y-%m-%d')
            AND  '$arrival' <= DATE_FORMAT(`departure`,'%Y-%m-%d')
            )
            OR (
            '$departure' >= DATE_FORMAT(`arrival`,'%Y-%m-%d')
            AND  '$departure' <= DATE_FORMAT(`departure`,'%Y-%m-%d')
            )
            OR (
            DATE_FORMAT(`arrival`,'%Y-%m-%d') >=  '$arrival'
            AND DATE_FORMAT(`arrival`,'%Y-%m-%d') <=  '$departure'
            )
            )
            AND room_id =" . $result->room_id);

              $curs = $mydb->loadResultList();
              $resNum = $result->room_num;

              $stats = $mydb->executeQuery();
              $rows = $mydb->fetch_array($stats);
              $status = isset($rows['status']) ? $rows['status'] : '';

              if ($resNum > 0) {
                // Room is available for booking
                $btn = '<input type="submit" class="btn btn-primary btn-sm" id="booknow" name="booknow" onclick="return validateBook();" value="Book Now"/>';
              } else {
                // Room is fully booked
                $btn = '<div style="color: red; font-size:20px;"><strong>Fully Booked</strong></div>';
              }

              // ============================================================================================================================



            ?>
              <form method="POST" action="index.php?p=accomodation">
                  <input type="hidden" name="ROOMPRICE" value="<?php echo $result->price; ?>">
                  <input type="hidden" name="room_id" value="<?php echo $result->room_id; ?>">
                  <div class="col-md-3 price-grid">
                      <div class="price-block agile">
                          <div class="price-gd-top">
                              <img src="<?php echo WEB_ROOT . 'admin/mod_rooms/' . $result->room_image; ?>" alt="" class="img-responsive" />
                              <h4 style="font-size: larger;"><?php echo $result->room; ?></h4>
                          </div>
                          <div class="price-gd-bottom">
                              <div class="price-list">
                                  <ul>
                                      <h5><li><?php echo $result->accomodation_name; ?></li></h5><br>
                                      <li><?php echo $result->room_description; ?></li><br>
                                      <li>Number Person : <?php echo $result->num_person; ?></li><br>
                                      <li>Remaining Rooms :<?php echo  $resNum; ?></li><br>
                                  </ul>
                              </div>
                              <div class="price-selet">
                              <h3><span>₱</span><?php echo number_format($result->price); ?></h3>
                                  <?php echo $btn; ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
            <?php

            }

            ?>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="row">
          <?php require_once('sidebar.php'); ?>
        </div>
      </div>

    </div>
  </div>

</div>