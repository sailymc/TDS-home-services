<?php



require_once('config.php');
if (!isset($_SESSION['user'])) {
	echo redirect('login.php');
}
$service_id = $_GET['service_id'];

if (isset($_POST['submit'])) {
	$logged_in_user_id;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$your_email = $_POST['your_email_1'];
	$address = $_POST['address'];
	$seller_id = $_POST['seller_id'];
	$price = $_POST['price'];
	$date = $_POST['date'];
	$time = $_POST['time'];


	$data = [
		'first_name' => $first_name,
		'service_id' => $service_id,
		'last_name' => $last_name,
		'phone_number' => $phone,
		'email' => $your_email,
		'address' => $address,
		'client_id' => $logged_in_user_id,
		'seller_id' => $seller_id,
		'price' => $price,
		'date' => $date,
		'time' => $time

	];

	// echo "<pre>";
	// print_r($data);
	// die;

	$service = $db->insert('orders', $data);
	if ($service) {
		echo redirect('orders.php');
	}
}



// require_once('header.php');

$service = $db->query("SELECT
s.service_name, u.user_id as seller_id,  u.username as provider,s.seller_id,s.price 
from
service s, user u 
WHERE 
u.user_id=s.seller_id and s.service_id=$service_id")[0];


?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Solicitud de Servicio </title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="booking/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="booking/css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="booking/css/style.css" />
	<!-- Main Style -->

	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

</head>

<body style="background: #eee">

	<header>


		</nav>
	</header>
	<div class="page-content">
		<div class="wizard-heading text-dark" style="color: black;">Solicitud de Servicio</div>
		<div class="wizard-v6-content">
			<div class="wizard-form">
				<form class="form-register" id="form-register" action="#" method="post">
					<div id="form-total">
						<!-- SECTION 1 -->
						<h2>
							<p class="step-icon"><span>1</span></p>
							<span class="step-text">Información Personal</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Información Personal</h3>
									<span>1/3</span>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="first_name" name="first_name" required>
											<span class="label">Nombre</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="last_name" name="last_name" required>
											<span class="label">Apellido</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="phone" name="phone" required>
											<span class="label">Teléfono</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" name="your_email_1" id="your_email_1" class="form-control" required>
											<span class="label">E-Mail</span>
										</label>
									</div>
								</div>
								<!-- <div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label for="date" class="special-label">Date of Birth:</label>
										<select name="date" id="date" class="form-control">
											<option value="15" selected>15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="month" id="month" class="form-control">
											<option value="Jan" selected>Jan</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year" id="year" class="form-control">
											<option value="2018" selected>2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div> -->
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="address" name="address" required>
											<span class="label">Dirección</span>
										</label>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<p class="step-icon"><span>2</span></p>
							<span class="step-text">Solicitar Servicio</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Información de Solicitud</h3>
									<span>2/3</span>
								</div>
								<!-- <div class="form-images">
									<img src="booking/images/wizard_v6.jpg" alt="wizard_v6">
								</div> -->
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="room" class="special-label-1"> Servicio Seleccionado </label>
										<select name="room" id="room" class="form-control">
											<option value="<?= $service['service_name'] ?>" selected><?= $service['service_name'] ?></option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<?php
									// set timezone
									date_default_timezone_set('America/New_York'); 
									// get the current date 
									$formattedDate = date('F - l - Y');

									?>

									<div class="form-holder">
										<label for="date" class="special-label-1">Seleccionar Fecha</label>
										<input type="text" name="date" class="day" id="day" placeholder="<?= $formattedDate ?>">
									</div>
									<div class="form-holder">
										<label for="time" class="special-label-1">Horario Disponible </label>
										<select name="time" id="time" class="form-control">
											<option value="8:00am - 10.00am" selected>8:00am - 10.00am</option>
											<option value="9:00am - 21:00pm">9:00am - 21:00pm</option>
											<option value="10:00am - 22:00pm">10:00am - 22:00pm</option>
											<option value="12:00am - 24:00pm">12:00am - 24:00pm</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 3 -->
						<h2>
							<p class="step-icon"><span>3</span></p>
							<span class="step-text">Confirmar</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Comfirmar Detalles</h3>
									<span>3/3</span>
								</div>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Nombre de Proveedor: </th>
												<td id=""><?= $service['provider'] ?> </td>
											</tr>
											<tr class="space-row">
												<th>Nombre Completo: </th>
												<td id="fullname-val"></td>
											</tr>
											<tr class="space-row">
												<th>Servicio:</th>
												<td id="room-val"></td>
											</tr>
											<tr class="space-row">
												<th>Día:</th>
												<td id="day-val"></td>
											</tr>
											<tr class="space-row">
												<th>Hora:</th>
												<td id="time-val"></td>
											</tr>
											<tr class="space-row">
												<th>Precio:</th>
												<td id="price-val">$<?= $service['price'] ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div style="text-align: center;">
									<button type="submit" name="submit" id="confirm-button">Confirmar</button>
								</div>
							</div>
						</section>
					</div>
					<input type="hidden" value="<?= $service['seller_id'] ?>" name="seller_id">
					<input type="hidden" value="<?= $service['price'] ?>" name="price">
				</form>
			</div>
		</div>
	</div>
	<script src="booking/js/jquery-3.3.1.min.js"></script>
	<script src="booking/js/jquery.steps.js"></script>
	<script src="booking/js/jquery-ui.min.js"></script>
	<script src="booking/js/main.js"></script>

	<script>
		// Wait for the DOM to load
		document.addEventListener('DOMContentLoaded', function() {
			// Find the link element using querySelector
			var link = document.querySelector('a[href="#finish"][role="menuitem"]');

			// Check if the link is found and has the style attribute
			if (link && link.style.display === 'none') {
				// Hide the parent li element
				var parentLi = link.parentElement;
				if (parentLi) {
					parentLi.style.display = 'none';
				}
			}
		});
	</script>
</body>

<!--  HTML structure where the "Confirm" link will be generated -->



</html>