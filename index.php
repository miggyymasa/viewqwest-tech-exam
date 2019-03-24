<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="UTF-8" nam="viewport" content="width-device=width, initial-scale=1"/>
		<title>Registration</title>
		<link rel="stylesheet" type ="text/css" href="vendor/bootstrap-4.0.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="vendor/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery-validation-1.19.0/dist/jquery.validate.min.js"></script>
		<script type="text/javascript" src="vendor/jquery-validation-1.19.0/dist/additional-methods.js"></script>
    <script type="text/javascript" src="script.js"></script>
	</head>
<body class="container">

	<div class="row head">
		<h1>Registration Form</h1>
	</div>



	<?php if(isset($_GET['success'])): ?>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Success!</h4>
			  <p>User is now added to database.</p>
			  <hr>
			  <p class="mb-0">
			  	<button onclick="window.location = window.location.pathname">Reload</button>
			  </p>
			</div>
		</div>
	</div>

	<?php else: ?>
  <form method="POST" id="reg-form" action="save_query.php" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6 well">
				<div class="form-group row">
          <div class="col">
            <input type ="text" placeholder="First Name"  name="fname" class="form-control" required>
          </div>
          <div class="col">
            <input type ="text" placeholder="Last Name"  name="lname" class="form-control" required>
          </div>
				</div>
        <div class="form-group row">
          <div class="col">
            <input type="text" placeholder="NRIC/Passport Number" name="nric" class="form-control" required>
          </div>
				</div>
				<div class="form-group row">
          <div class="col">
            <input type="email" placeholder="Email" name="emailaddress" class="form-control" required>
          </div>
          <div class="col">
            <input type="text" placeholder="Mobile" name="mobilenumber" class="form-control" required>
          </div>
				</div>
				<div class="form-group row">
          <div class="col">
            <input type="text" placeholder="Address" name="address" class="form-control">
          </div>
				</div>
        <div class="form-group row">
          <div class="col">
            <input type ="text" placeholder="City"  name="city" class="form-control" required>
          </div>
          <div class="col">
            <input type ="text" placeholder="State"  name="state" class="form-control" required>
          </div>
				</div>
        <div class="form-group row">
          <div class="col">
            <input type ="text" placeholder="Country"  name="country" class="form-control" required>
          </div>
          <div class="col">
            <input type ="text" placeholder="Zip Code"  name="zipcode" class="form-control" required>
          </div>
				</div>
		</div>
    <div class="col-lg-6">
      <div class="form-group">
          <div class="img-preview">
            <img id="output_image" />
						<span class="fas fa-user"></span>
          </div>
          <input type="file" id="imgup" name="imgup" onchange="preview_image(this)" required>
      </div>
    </div>

    <div class="col">
      <input type="submit" class="btn btn-success" name="signup" value="Sign Up">
    </div>

	</div>
  <form>
	<?php endif; ?>

</body>
</html>
