<div class="container">
  <h3>Administrator Panel: Welcome <?php echo $_SESSION['admin_name']; ?></h3>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <?php
  $mydb->setQuery("SELECT MONTH(trans_date) as month, COUNT(*) as reservation_count
                 FROM reservation
                 GROUP BY MONTH(trans_date)");

  $cur = $mydb->loadResultList();

  $data = array();
  foreach ($cur as $result) {
    $month = $result->month;
    $reservationCount = $result->reservation_count;
    $data[] = array('month' => $month, 'reservationCount' => (int)$reservationCount);
  }
  ?>

  <script>
    $(document).ready(function() {
      var chartData = <?php echo json_encode($data); ?>;

      var uniqueMonths = Array.from(new Set(chartData.map(item => item.month)));

      Highcharts.chart('container', {
        chart: {
          type: 'bar'
        },
        title: {
          text: 'Monthly Reservation Statistics',
          style: {
            fontSize: '24px' 
          }
        },
        xAxis: {
          categories: uniqueMonths.map(month => {
            return monthName(month);
          }),
          labels: {
            style: {
              fontSize: '16px' 
            }
          }
        },
        yAxis: {
          title: {
            text: 'Number of Reservations',
            style: {
              fontSize: '24px' 
            }
          },
          labels: {
            style: {
              fontSize: '16px' 
            }
          }
        },
        series: [{
          name: 'Reservations',
          data: uniqueMonths.map(month => {
            var dataForMonth = chartData.find(item => item.month === month);
            return dataForMonth ? dataForMonth.reservationCount : 0;
          })
        }]
      });
    });

    function monthName(monthNumber) {
      var monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
      ];
      return monthNames[monthNumber - 1];
    }
  </script>

  <!-- Container for the chart -->
  <div id="container" style="width: 100%; height: 400px;"></div>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            Rooms
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
          The guest house has got various rooms that are categorised accordion to types.
          Each room is of particular category and have a maximum number of Adults and Children that can be accomodated. Click<a href="<?php echo WEB_ROOT; ?>admin/mod_rooms/index.php"> HERE.</a>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            Accomodation
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          This consists of the categories of rooms that in this Hotel. Each Category of rooms Has got unique features different form the other. For view all of the categories of all types of rooms Click <a href="<?php echo WEB_ROOT; ?>admin/mod_accomodation/index.php">HERE.</a> </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            Reservation
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
          In this area, you can view all the reservation transaction of all guest. And this area allow the the receptionist confirm the request of guest or either to cancel the reservation. Click <a href="<?php echo WEB_ROOT; ?>admin/mod_reservation/index.php">HERE.</a>
        </div>
      </div>
    </div>

    <?php if ($_SESSION['admin_role'] == "Administrator") { ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
              Users
            </a>
          </h4>
        </div>
        <div id="collapsesix" class="panel-collapse collapse">
          <div class="panel-body">
            The system displays the list of all people that have been registered in to the system.If a particular user is logged in the system the, such as users record is does not appear in the list of records. To view all the registered other than the logged in user Click <a href="<?php echo WEB_ROOT; ?>admin/mod_users/index.php">HERE.</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<hr>
<div class="container">
</div>