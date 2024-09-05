	<!-- header -->
	<div class="banner-top">
		<div class="contact-bnr-w3-agile">
			<ul>
				<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:midway1115@yahoo.com">midway1115@yahoo.com</a></li>
				<li><i class="fa fa-phone" aria-hidden="true"></i>0975-081-5326 | 0927-285-5608</li>
				<li class="s-bar">
					<a data-toggle="tooltip" data-placement="bottom" title="Booking Cart" href="<?php echo WEB_ROOT . 'booking/index.php';  ?>">
						<i class="fa fa-shopping-cart" style="font-size:35px;"><?php echo  isset($cart) ? $cart : ''; ?> </i>
					</a>
				</li>
				<!-- if the guest user is naka log in this icon will be hide -->
				<?php
				$userLoggedIn = isset($_SESSION['guest_id']) && $_SESSION['guest_id'];

					if (!$userLoggedIn) {
					?>
						<li>
							<a data-toggle="tooltip" data-placement="bottom" title="Log In as Guest" href="<?php echo WEB_ROOT; ?>booking/index.php?view=logininfo">
								<i class="fa fa-user" style="font-size:35px;"></i>
							</a>
						</li>
					<?php
					}
				?>
				<li>
					<a data-toggle="tooltip" data-placement="bottom" title="Log In as Admin" href="<?php echo WEB_ROOT; ?>admin/index.php">
						<i class="fa fa-user-secret" style="font-size:35px;"></i>
					</a>
				</li>
				<?php if (isset($_SESSION['guest_id'])) {
					# code...
				?>
					<!-- Messages: style can be found in dropdown.less-->
					<?php
					$sql = "SELECT count(*) as MSG FROM `payment` WHERE status<>'Pending'  AND  `msg_view`=0 AND `guest_id`=" . $_SESSION['guest_id'];
					$mydb->setQuery($sql);
					$res = $mydb->executeQuery();

					$msgCnt = $mydb->fetch_array($res);
					?>
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-envelope-o"></i>
							<span class="label label-success"><?php echo $msgCnt['MSG']; ?></span>
							<i class="fa fa-caret-down fa-fw"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have <?php echo $msgCnt['MSG']; ?> messages</li>
							<?php
							$sql = "SELECT  *  FROM `payment` WHERE status<>'Pending' AND `msg_view`=0 AND `guest_id`=" . $_SESSION['guest_id'];
							$mydb->setQuery($sql);
							$res = $mydb->executeQuery();
							while ($row = $mydb->fetch_array($res)) {
							?>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li><!-- start message -->
											<a class="read" href="<?php echo WEB_ROOT;  ?>guest/readmessage.php?code=<?php echo  $row['confirmation_code']; ?>" target="_blank" data-id="<?php echo  $row['confirmation_code']; ?> ">
												<div class="pull-left">
													<img src="<?php echo WEB_ROOT;  ?>images_copy/images/2page-img8.jpg" class="img-circle" alt="Admin">
												</div>
												<h4>
													Admin
													<!--<small><i class="fa fa-clock-o"><span id="received-time"></i></small>-->
												</h4>
												<h6>Reservation is already <?php echo   $row['status']; ?>.. </h6>
											</a>
										</li>


									</ul>
								</li>
							<?php } ?>
						</ul>
					</li>

					<?php
					$g = new Guest();
					$result = $g->single_guest($_SESSION['guest_id']);

					?>

					<!-- User Account: style can be found in dropdown.less -->

					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user fa-fw"></i><?php echo $_SESSION['name'] . ' ' . $_SESSION['last']; ?> <i class="fa fa-caret-down fa-fw"></i>
						</a>
						<ul class="dropdown-menu nav nav-stacked">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<li class="widget-user-header bg-yellow">
								<div class="widget-user-image">
									<img class="img-circle" style="cursor:pointer;width:150px;height:150px;padding:10px;" data-target="#myModalPhoto" data-toggle="modal" src="<?php echo WEB_ROOT . $result->photo;  ?>" alt="User Avatar">
								</div>
								<!-- /.widget-user-image -->
								<h3 class="widget-user-username"><?php echo $_SESSION['name'] . ' ' . $_SESSION['last']; ?> </h3>
							</li>
							<!-- <li class="box-footer no-padding">  -->
							<li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT;  ?>guest/profile.php" data-toggle="lightbox">Account<!--  <span class="pull-right badge bg-blue">31</span> --></a></li>
							<li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT;  ?>guest/bookinglist.php" data-toggle="lightbox">Bookings <!-- <span class="pull-right badge bg-green">12</span> --></a></li>
							<li><a style="color:#000;text-align:left;border-bottom:1px solid #fff;" href="<?php echo WEB_ROOT . 'logout.php';  ?>">Logout </a></li>

							<!-- </li>  -->
						</ul>

					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //header -->