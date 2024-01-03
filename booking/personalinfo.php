<?php
if (isset($_POST['submit'])) {
	$arival   = $_SESSION['from'];
	$departure = $_SESSION['to'];
	$room_id = $_SESSION['room_id'];

	$_SESSION['name']   		= $_POST['name'];
	$_SESSION['last']   		= $_POST['last'];
	$_SESSION['email']   		= $_POST['email'];
	$_SESSION['dbirth']   		= $_POST['dbirth'];
	$_SESSION['nationality']   = $_POST['nationality'];
	$_SESSION['city']   		= $_POST['city'];
	$_SESSION['address'] 		= $_POST['address'];
	$_SESSION['zip']   		= $_POST['zip'];
	$_SESSION['phone']   		= $_POST['phone'];
	$_SESSION['username']		= $_POST['username'];
	$_SESSION['pass']  		= $_POST['pass'];
	$_SESSION['pending']  		= 'pending';

	redirect('index.php?view=payment');
}
?>

<?php
if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
	echo '<ul class="err">';
	foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>', $msg, '</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}
?>

<form class="form-horizontal" action="index.php?view=logininfo" method="post" name="personal">
	<h2>Personal Details</h2>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="name">First Name:</label>
			<div class="col-md-8">
				<input name="" type="hidden" value="">
				<input name="name" type="text" class="form-control input-sm" id="name" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="last">Last Name:</label>
			<div class="col-md-8">
				<input name="last" type="text" class="form-control input-sm" id="last" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="last">Email:</label>
			<div class="col-md-8">
				<input name="email" type="email" class="form-control input-sm" id="email" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="city">City/Province:</label>
			<div class="col-md-8">
				<input name="city" type="text" class="form-control input-sm" id="city" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="address">Address:</label>
			<div class="col-md-8">
				<input name="address" type="text" class="form-control input-sm" id="address" required />
			</div>
		</div>
	</div>
	<div class="form-group  ">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="dbirth">Date of Birth:</label>

			<div class="col-md-8">
				<input type="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="dbirth" id="dbirth" value="" class="dbirth form-control  input-sm " required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="phone">Phone:</label>

			<div class="col-md-8">
				<input name="phone" type="text" class="form-control input-sm" id="phone" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="nationality">Nationality:</label>

			<div class="col-md-8">
				<input name="nationality" type="text" class="form-control input-sm" id="nationality" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="username">Username:</label>
			<div class="col-md-8">
				<input name="username" type="text" class="form-control input-sm" id="username" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="password">Password:</label>

			<div class="col-md-8">
				<input name="pass" type="password" class="form-control input-sm" id="password" minlength="8" required />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="zip">Zip Code:</label>

			<div class="col-md-8">
				<input name="zip" type="text" class="form-control input-sm" id="zip" required />
			</div>
		</div>
	</div>

	&nbsp; &nbsp;
	<div class="form-group">
		<div class="col-md-6">
			I <input type="checkbox" name="condition" value="checkbox" id="agreeCheckbox" />
			<small>Agree the <a class="toggle-modal" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">TERMS AND CONDITION</a> of this Hotel</small>
			<br>
			<div class="col-md-4">
				<input name="submit" type="submit" value="Confirm" class="btn btn-primary" onclick="return personalInfo();" />
			</div>
		</div>

		<script>
			function personalInfo() {
				var agreeCheckbox = document.getElementById('agreeCheckbox');

				if (!agreeCheckbox.checked) {
					alert("Please agree to the terms and conditions before submitting the form.");
					return false; // prevent form submission
				}

				return true; // allow form submission
			}
		</script>

		<div class="col-md-6">
			<h4>NOTE:<br>
				We strongly recommend that your password be a minimum of 8 characters long and should not match your username.<br><br>

				Please ensure your email address is accurate and valid. We use email for essential communication such as order notifications. Providing a valid email address is crucial for using our services effectively.<br><br>

				Rest assured, all your private data is kept confidential. We have a strict policy against selling, exchanging, or marketing your personal information in any way. For more details on the responsibilities of both parties, please refer to our terms and conditions.<br>
			</h4>
		</div>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<!-- Modal1 -->
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4>MIDWAY <span>MINKAY</span></h4><br>
						<h5>NOTE:</h5>
						<p>
						<div class="view">
							<p>
								TERMS & CONDITIONS
							<ul>
								<h4>Reservations</h4><br>
								Through our online booking system, you will be able to check room availability (for most hotels) and make your booking. For peace of mind, you will receive by email a reservation confirmation, including the details of your reservation. It is recommended that you keep a copy of this reservation confirmation, preferably by printing the page.

								In the event that you have to modify or cancel your booking, please contact our reservation office as specified in your reservation confirmation.

								<h4> Guaranteed Reservations</h4>
								By securing your onlinebooking with Gcash, your booking is guaranteed. All reservations made through our website must be guaranteed by Gcash payment.



								<h4>Cancellation </h4><br>
								<li>If there is a cancellation of a room reservation within 24hours prior to the arrival date, but the payments cannot refund once you already booking for the reservation.
								<li>Additional Requests
								<li>All additional or special requests are subject to availability and we cannot guarantee the provision for special requests. Any additional requests made should be prior to your arrival at the hotel, giving reasonable advance notice.
								<li>General Information
								<li>Accommodation: As a minimum, all bedrooms feature a private ensuite bathroom with either a bath & shower or a shower and colour television.
								<li>Opening hours: Our reception is open 24hours. If you wish to check-in to the hotel out of these hours, please discuss with reception at the time of booking.
								<li>Payment Methods: We accept most major credit and debit cards, cash.

									<h4>Price Guarantee</h4><br>
								<li>On receipt of written confirmation the prices quoted and confirmed in writing by the Hotel remain fixed except for any alterations in the Government rates of taxation and/or duty such as VAT, for which we reserve the right to alter pricing to take account of any variation.
								<li>Making a booking
								<li>By making a booking you are confirming that you are authorised to do so on behalf of all persons named in the booking and you are acknowledging that all members of your party agree to be bound by these Booking Terms & Conditions.
								<li>When your booking has been made a confirmation can be sent to you by email using the email address that you have supplied, or by post. Booking confirmations are subject to the availability of accommodation at the hotel.
								<li>You should carefully check the details of your confirmation as soon as you receive it. You must contact Midway Minkay Restobar and Catering Services immediately if any of the details are incorrect or incomplete.
								<li>We will always endeavour to rectify any inaccuracies or accommodate any alterations you wish to make to your booking. We cannot accept liability for any inaccuracies that are not brought to our attention within seven days of issuing your confirmation, nor can we accept responsibility for inaccurate information that you have supplied.

									<h4>Circumstances beyond our control</h4><br>
								<li>We cannot accept responsibility for unforeseen circumstances beyond our control. These include (but are not limited to) adverse weather conditions, fire, riot, war, terrorist activity (or threat of such activity), industrial dispute, natural disaster, or injuries and death of an individual(s) through accidental circumstances unconnected with the hotel.
								<li>By making a booking you are accepting responsibility for any damage or loss caused by yourself or a member of your party. Full payment for any such damage or loss must be paid to the hotel owner or manager on demand. If you fail to do so, you will be responsible for meeting any claims subsequently made (together with our own and the other party's full legal costs) as a result of your actions.

									<h4>Complaints</h4><br>
								<li>If you are dissatisfied with any aspect of your stay you should bring the problem or issue to the attention of the duty manager or senior member of staff at the hotel as soon as possible so that all reasonable efforts can be made to rectify the situation. If, for any reason, the issue cannot be resolved to your satisfaction and you wish to make a complaint, you should put it in writing and send it to the owner at: Midway Minkay, Initao, Mis. Or.


									If you have any questions, please email at midway1115@yahoo.com or call 0975-081-5326 | 0927-285-5608

									Thank you for choosing Midway Minkay Restobar and Catering Services

									Respectfully your,

									Midway Minkay
							</ul>

						</div>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>