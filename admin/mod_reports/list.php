 <div class="wrapper">


   <form action="" method="POST">
     <!-- Main content -->
     <section class="invoice">
       <!-- title row -->
       <div class="row">
         <div class="col-xs-12">
           <h2 class="page-header">
             <i class="fa fa-globe"></i>Midway Minkay Report
             <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
           </h2>
         </div>
         <!-- /.col -->
       </div>
       <!-- info row -->
       <div class="row invoice-info">
         <div class="col-sm-2 invoice-col">

         </div>
         <div class="col-sm-2 invoice-col">
           Room
           <address>
             <input class="form-control" size="20" type="text" value="" Placeholder="Search For...." name="txtsearch" id="txtsearch">
           </address>

         </div>
         <div class="col-sm-2 invoice-col">
           Status
           <address>
             <div class="form-group">
               <select name="categ" class="form-control">
                 <option value="Checkedin">Checkedin</option>
                 <option value="Checkedout">Checkedout</option>
                 <option value="Arrival">Arrival</option>
                 <option value="Pending">Pending</option>
                 <option value="Confirmed">Confirmed</option>
               </select>
             </div>
           </address>
         </div>

         <!-- /.col -->
         <div class="col-sm-2 invoice-col">
           Checkedin
           <address>
             <div class="form-group">
               <input class="form-control date start " size="20" type="text" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] : date('Y-m-d'); ?>" Placeholder="Check In" name="start" id="from" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
             </div>
           </address>
         </div>
         <!-- /.col -->
         <div class="col-sm-2 invoice-col">
           Checkedout
           <address>
             <div class="form-group">
               <input class="form-control date end " size="20" type="text" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] : date('Y-m-d'); ?>" name="end" id="end" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd">
             </div>

           </address>

         </div>
         <!-- /.col -->
         <!-- /.col -->
         <div class="col-sm-2 invoice-col">
           <br />
           <address>
             <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
             </div>

           </address>

         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
       <!-- title row -->
       <div class="row">
         <div class="col-xs-12">
           <h2 class="page-header">
             <i class="fa fa-globe"></i><?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>
             <small class="pull-right"> <?php echo (isset($_POST['start'])) ? 'Checkedin Date :' . $_POST['start'] : ''; ?> <?php echo (isset($_POST['end'])) ? ' Checkedout Date :' . $_POST['end'] : ''; ?> </small>
           </h2>
         </div>
         <!-- /.col -->
       </div>


       <!-- Table row -->
       <div class="row">
         <div class="col-xs-12 col-md-12 table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>Guest</th>
                 <th>Room</th>
                 <th>Price</th>
                 <th>Arrival</th>
                 <th>Departure</th>
                 <th>Night(s)</th>
                 <th>Subtotal</th>
               </tr>
             </thead>
             <tbody>
               <?php
                if (isset($_POST['submit'])) {


                  $sql = "SELECT * 
		 FROM  `accomodation` A,  `room` RM,  `reservation` RS,  `payment` P,  `guest` G
		 WHERE A.`accomodation_id` = RM.`accomodation_id` 
		 AND RM.`room_id` = RS.`room_id` 
		 AND RS.`confirmation_code` = P.`confirmation_code` 
     AND P.`guest_id` = G.`guest_id`  
     AND DATE(`arrival`) >=  '" . $_POST['start'] . "'
		 AND DATE(`departure`) <=  '" . $_POST['end'] . "' AND P.status='" . $_POST['categ'] . "'
     AND CONCAT( `accomodation_name`, ' ', `room` , ' ' , `room_description`) LIKE '%" . $_POST['txtsearch'] . "%'";


                  $mydb->setQuery($sql);
                  $res = $mydb->executeQuery();
                  $row_count = $mydb->num_rows($res);
                  $cur = $mydb->loadResultList();


                  if ($row_count > 0) {
                    foreach ($cur as $result) {
                      $days =  dateDiff(date($result->arrival), date($result->departure));
                ?>
                     <tr>
                       <td><?php echo $result->firstname . ' ' .  $result->lastname; ?></td>
                       <td><?php echo $result->accomodation_name . ' [' . $result->room . ']'; ?></td>
                       <td> &#8369 <?php echo $result->price; ?></td>
                       <td><?php echo date_format(date_create($result->arrival), 'm/d/Y'); ?></td>
                       <td><?php echo date_format(date_create($result->departure), 'm/d/Y'); ?></td>
                       <td><?php echo ($days == 0) ? '1' : $days; ?></td>
                       <td> &#8369 <?php echo $result->r_price; ?></td>
                     </tr>
               <?php
                      @$tot += $result->r_price;
                    }
                  }
                }
                ?>
             </tbody>
           </table>
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->

       <div class="row">
         <!-- accepted payments column -->
         <div class="col-xs-6">
           <!-- <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->
         </div>
         <!-- /.col -->
         <div class="col-xs-6">
           <p class="lead">Total Amount</p>

           <div class="table-responsive">
             <table class="table">
               <tr>
                 <th style="width:50%">Total:</th>
                 <td> &#8369 <?php echo @$tot; ?></td>
               </tr>
             </table>
           </div>
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
   </form>
   <form action="printreport.php" method="POST" target="_blank">
     <input type="hidden" name="txtsearch" value="<?php echo (isset($_POST['txtsearch'])) ? $_POST['txtsearch'] : ''; ?>">
     <input type="hidden" name="categ" value="<?php echo (isset($_POST['categ'])) ? $_POST['categ'] : ''; ?>">
     <input type="hidden" name="start" value="<?php echo (isset($_POST['start'])) ? $_POST['start'] :  date('Y-m-d'); ?>">
     <input type="hidden" name="end" value="<?php echo (isset($_POST['end'])) ? $_POST['end'] :  date('Y-m-d'); ?>">
     <!-- this row will not appear when printing -->
     <div class="row no-print">
       <div class="col-xs-12">
         <span class="pull-right"> <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button></span>
       </div>
     </div>
     </section>
   </form>
   <!-- /.content -->
   <div class="clearfix"></div>

 </div>
 <!-- ./wrapper -->