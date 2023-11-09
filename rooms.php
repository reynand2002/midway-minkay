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
                                        <input type="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="arrival" id="date_pickerfrom" value="<?php echo isset($_POST['arrival']) ? $_POST['arrival'] : date('m/d/Y'); ?>" class="date_pickerfrom input-sm form-control">
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
                                        <input type="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="departure" id="date_pickerto" value="<?php echo isset($_POST['departure']) ? $_POST['departure'] : date('m/d/Y'); ?>" class="date_pickerto input-sm form-control">
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
                    $btn = '<div style="color: red; font-size:21px;"><strong>Fully Booked</strong></div>';
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
<!-- visitors -->
<div class="w3l-visitors-agile">
    <div class="container">
        <h3 class="title-w3-agileits title-black-wthree">What other visitors experienced</h3>
    </div>
    <div class="w3layouts_work_grids">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3layouts_work_grid_left">
                            <img src="images/5.jpg" alt=" " class="img-responsive" />
                            <div class="w3layouts_work_grid_left_pos">
                                <img src="images/c1.jpg" alt=" " class="img-responsive" />
                            </div>
                        </div>
                        <div class="w3layouts_work_grid_right">
                            <h4>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                Worth to come again
                            </h4>
                            <p>Sed tempus vestibulum lacus blandit faucibus.
                                Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
                                at imperdiet urna. </p>
                            <h5>Julia Rose</h5>
                            <p>Germany</p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li>
                        <div class="w3layouts_work_grid_left">
                            <img src="images/5.jpg" alt=" " class="img-responsive" />
                            <div class="w3layouts_work_grid_left_pos">
                                <img src="images/c2.jpg" alt=" " class="img-responsive" />
                            </div>
                        </div>
                        <div class="w3layouts_work_grid_right">
                            <h4>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                Worth to come again
                            </h4>
                            <p>Sed tempus vestibulum lacus blandit faucibus.
                                Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
                                at imperdiet urna. </p>
                            <h5>Jahnatan Smith</h5>
                            <p>United States</p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li>
                        <div class="w3layouts_work_grid_left">
                            <img src="images/5.jpg" alt=" " class="img-responsive" />
                            <div class="w3layouts_work_grid_left_pos">
                                <img src="images/c3.jpg" alt=" " class="img-responsive" />
                            </div>
                        </div>
                        <div class="w3layouts_work_grid_right">
                            <h4>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                Worth to come again
                            </h4>
                            <p>Sed tempus vestibulum lacus blandit faucibus.
                                Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
                                at imperdiet urna. </p>
                            <h5>Rosalind Cloer</h5>
                            <p>Italy</p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                    <li>
                        <div class="w3layouts_work_grid_left">
                            <img src="images/5.jpg" alt=" " class="img-responsive" />
                            <div class="w3layouts_work_grid_left_pos">
                                <img src="images/c4.jpg" alt=" " class="img-responsive" />
                            </div>
                        </div>
                        <div class="w3layouts_work_grid_right">
                            <h4>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                Worth to come again
                            </h4>
                            <p>Sed tempus vestibulum lacus blandit faucibus.
                                Nunc imperdiet, diam nec rhoncus ullamcorper, nisl nulla suscipit ligula,
                                at imperdiet urna. </p>
                            <h5>Amie Bublitz</h5>
                            <p>Switzerland</p>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>
<!-- visitors -->