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
        $msg = 'Available room TODAY';
    } else {
        $msg =  'Available room From: ' . '['. $_POST['arrival'].']' . ' To: ' . '['. $_POST['departure'].']';
    }


    $_SESSION['arrival'] = date_format(date_create($_POST['arrival']), "Y-m-d");
    $_SESSION['departure'] = date_format(date_create($_POST['departure']), "Y-m-d");



        $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id`   AND `num_person` = " . $_POST['person'];
    } elseif (isset($_GET['q'])) {

        $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id` AND `room`='" . $_GET['q'] . "'";
    } else {
        $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id`";
    }

$accomodation = ' | ' . @$_GET['q'];
?>
<!-- rooms & rates -->
<div class="plans-section" id="rooms">
    <div class="container">
        <h3 class="title-w3-agileits title-black-wthree">Rooms And Rates</h3>

        <!-- check availability -->
        <div class="container">
            <div class="col-lg-6">
                <div class="row">

                    <form method="POST" action="index.php?p=rooms">
                        <div id="sidebarRight-wrap">
                            <div class="row">
                                <div class="col-md-10 block">
                                    <h3> Book a Room</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">

                                    <div class="form-group input-group">
                                        <label>Arrival</label>
                                        <input type="date" data-date="" data-date-format="mm-dd-yyyy" data-link-field="any" data-link-format="mm-dd-yyyy" name="arrival" id="date_pickerfrom" value="<?php echo isset($_POST['arrival']) ? date('Y-m-d', strtotime($_POST['arrival'])) : date('Y-m-d'); ?>" class="date_pickerfrom input-sm form-control">
                                        <span class="input-group-btn">
                                            <i class="date_pickerfrom fa fa-calendar"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group input-group">
                                        <label>Departure</label>
                                        <input type="date" data-date="" data-date-format="mm-dd-yyyy" data-link-field="any" data-link-format="mm-dd-yyyy" name="departure" id="date_pickerto" value="<?php echo isset($_POST['departure']) ? date('Y-m-d', strtotime($_POST['departure'])) : date('Y-m-d'); ?>" class="date_pickerto input-sm form-control">
                                        <span class="input-group-btn">
                                            <i class="date_pickerto fa  fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group input-group">
                                        <label>Person</label>
                                        <select class=" form-control input-sm " name="person" id="person">
                                            <?php $sql = "SELECT distinct(`num_person`) as 'NumberPerson' FROM `room`";
                                            $mydb->setQuery($sql);
                                            $cur = $mydb->loadResultList();
                                            foreach ($cur as $result) {
                                                echo '<option value=' . $result->NumberPerson . '>' . $result->NumberPerson . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-10">
                                    <button class="btn monbela-btn  btn-primary btn-sm " name="booknowA" type="submit" id="booknowA">Check Availability </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br />
            </div>
        </div>

        <!-- date result -->
        <div id="bread">
            <ol class="breadcrumb">
                <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a>
                </li>
                <li class="active"><?php print $title; ?></li>
                <li style="color: #02aace; float:right"> <?php print  $msg; ?></li>
            </ol>
        </div>
        <!-- date result -->

        <!-- check availability -->

        <div class="priceing-table-main">

        <?php
        $arrival = $_SESSION['arrival'];
        $departure = $_SESSION['departure'];

        $mydb->setQuery($query);
        $cur = $mydb->loadResultList();
        foreach ($cur as $result) {
            // filtering the rooms
            // ======================================================================================================
            $mydb->setQuery("SELECT * FROM `reservation` WHERE (
                (
                    '$arrival' >= DATE_FORMAT(`arrival`, '%Y-%m-%d') AND '$arrival' <= DATE_FORMAT(`departure`, '%Y-%m-%d')
                ) OR (
                    '$departure' >= DATE_FORMAT(`arrival`, '%Y-%m-%d') AND '$departure' <= DATE_FORMAT(`departure`, '%Y-%m-%d')
                ) OR (
                    (
                        DATE_FORMAT(`arrival`, '%Y-%m-%d') >= '$arrival' AND DATE_FORMAT(`arrival`, '%Y-%m-%d') <= '$departure'
                    ) OR (
                        DATE_FORMAT(`departure`, '%Y-%m-%d') >= '$arrival' AND DATE_FORMAT(`departure`, '%Y-%m-%d') <= '$departure'
                    )
                )
            ) AND status = 'Pending' AND room_id = " . $result->room_id);
            


            $curs = $mydb->loadResultList();
            $resNum = $result->room_num;

            $stats = $mydb->executeQuery();
            $rows = $mydb->fetch_array($stats);
            $status = isset($rows['status']) ? $rows['status'] : '';

            // Check if the room is booked this month
            $isBookedThisMonth = (
                $status == 'Pending' &&
                date('m-Y', strtotime($arrival)) == date('m-Y', strtotime($rows['arrival'])) &&
                date('W-Y', strtotime($arrival)) == date('W-Y', strtotime($rows['arrival']))
            );
            
            
            // Check if the room is available
            $isAvailable = ($resNum !== 0 && $status !== 'Pending');

            if ($isBookedThisMonth) {
                // Room is booked already this month
                $btn = '<div style="color: red; font-size:10px;"><strong>Booked already this month</strong></div>';
            } elseif ($resNum == 0) {
                // Room is either booked
                $btn = '<div style="color: red; font-size:20px;"><strong>Fully Booked</strong></div>';
            } elseif ($isAvailable) {
                // Room is available for booking
                $btn = '<input type="submit" class="btn btn-primary btn-sm" id="booknow" name="booknow" onclick="return validateBook();" value="Book Now"/>';
            } else {
                //  unavailable
                $btn = '<div style="color: red; font-size:20px;"><strong>Unavailable</strong></div>';
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
                                        <h5>
                                            <li><?php echo $result->accomodation_name; ?></li>
                                        </h5><br>
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
<!--// rooms & rates -->