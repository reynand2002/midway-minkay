<?php

if (isset($_GET['id'])) {
  removetocart($_GET['id']);
}


if (isset($_POST['clear'])) {
  unset($_SESSION['pay']);
  unset($_SESSION['monbela_cart']);
  redirect(WEB_ROOT . "booking/");
}

?>
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
        <li class="active">Booking Cart</li>
      </ol>
    </div>


    <table class="table table-hover">

      <thead>
        <tr bgcolor="#999999">
          <th align="center" width="120">Room</th>
          <th align="center" width="120">Check In</th>
          <th align="center" width="120">Check Out</th>
          <th width="120">Price</th>
          <th align="center" width="120">Nights</th>
          <th align="center" width="90">Amount</th>
          <th align="center" width="90">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $payable = 0;
        if (isset($_SESSION['monbela_cart'])) {


          $count_cart = count($_SESSION['monbela_cart']);

          for ($i = 0; $i < $count_cart; $i++) {
            $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id` AND room_id=" . $_SESSION['monbela_cart'][$i]['monbelaroomid'];
            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {

              echo '<tr>';
              echo '<td>' . '[' . $result->room . ']' . ' | ' . $result->room_description . ' </td>';
              echo '<td>' . date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckin']), "m/d/Y") . '</td>';
              echo '<td>' . date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckout']), "m/d/Y") . '</td>';
              echo '<td>₱ ' . number_format($result->price, 2) . '</td>';
              echo '<td>' . $_SESSION['monbela_cart'][$i]['monbeladay'] . '</td>';
              echo '<td > &#8369 ' . $_SESSION['monbela_cart'][$i]['monbelaroomprice'] . '</td>';
              echo '<td ><a href="index.php?view=processcart&id=' . $result->room_id . '">Remove</td>';
            }


            $payable += $_SESSION['monbela_cart'][$i]['monbelaroomprice'];
          }

          $_SESSION['pay'] = $payable;
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">
            <h4 align="right">Total:</h4>
          </td>
          <td colspan="5">
            <h4><b><?php echo isset($_SESSION['pay']) ? '₱ ' . number_format($_SESSION['pay'], 2) : 'Your booking cart is empty.'; ?></b></h4>
          </td>
        </tr>
      </tfoot>
    </table>
    <form method="post" action="">
      <div class="col-xs-12 col-sm-12" align="right">
        <?php
        if (isset($_SESSION['monbela_cart'])) {
        ?>
          <a href="<?php echo WEB_ROOT; ?>index.php?p=rooms" class="btn btn-primary" align="right" name="clear">Add Another Room</a>
          <button type="submit" class="btn btn-primary" align="right" name="clear">Clear Cart</button>
          <?php

          if (isset($_SESSION['guest_id'])) {
          ?>
            <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=payment" class="btn btn-primary" align="right" name="continue">Continue Booking</a>
          <?php
          } else { ?>
            <a href="<?php echo WEB_ROOT; ?>booking/index.php?view=logininfo" class="btn btn-primary" align="right" name="continue">Continue Booking</a>
        <?php
          }
        } else {
        }

        ?>

      </div>
    </form>
  </div>
</div>