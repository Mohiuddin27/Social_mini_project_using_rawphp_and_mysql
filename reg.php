<?php require_once "autoload.php"; 


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php

if(isset($_POST['add'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$cell=$_POST['cell'];
	$username=$_POST['username'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$gender=NULL;
	if(isset($_POST['gender'])){
		$gender=$_POST['gender'];
	}
	$hash_pass=password_hash($pass,PASSWORD_DEFAULT);
	if(empty($name) || empty($email) || empty($cell) || empty($username)||empty($pass) || empty($gender)){
		$msg=validate('All fields are required','danger');
	}else if (checkemail($email) == false) {
	   $msg = validate('Invalid email address ','danger');
   } else if (ceilcheck($cell) == false) {
	   $msg = validate('Invalid Cell number','danger');
   }else if(checkpass($pass,$cpass)==false){
	   $msg=validate('Confirm password does not match','warning');
   }else if(datacheck('users','email',$email)==false){
	   $msg=validate('Email already exist','warning');
   }else if(datacheck('users','cell',$cell)==false){
	   $msg=validate('Cell already exist','warning');
   }else if(datacheck('users','username',$username)==false){
	   $msg=validate('Username already exist','warning');
   }
   else{
	   connect()->query("INSERT INTO users(name,email,cell,username,password,gender)VALUES('$name','$email','$cell','$username','$hash_pass','$gender')");
	   $msg=validate('Your registration is successful','success');
   }
}




?>

	<section >
        <div class="container">
            <div class="row">
                <div class="col-md-6 facebook1">
                  <img style="width:30%;margin-top:200px;" src="media/users/fb.png">
                  <h5>Facebook helps you connect and share <br> with the people in your life.</h5>
                </div>
                <div class="col-md-6">
                <div class="wrap shadow">
		<div class="card" style="border-radius:10px;">
			<div class="card-body">
				<h2>Sign Up</h2>
                <p style="color:#858383;">It's quick and easy.</p><hr>
				<?php
                      if(isset($msg)){
						  echo $msg;
					  }
				?>
				<form class="form" action="" method="POST" entype="multipart/form-data">
					<div style="float:left" class="form-group w-45">

						<input name="name" style="background-color:#a1a1a11f;" class="form-control" placeholder="Name" value="<?php old('name'); ?>" type="text">
                        
					</div>
					<div style="float:left;margin-left:9%;" class="form-group w-45">
					
						<input name="cell" style="background-color:#a1a1a11f;"  class="form-control" placeholder="Cell" value="<?php old('cell'); ?>"type="text">
					</div>
					<div class="form-group">
						
						<input name="email" style="background-color:#a1a1a11f;" class="form-control"placeholder="Email..." value="<?php old('email'); ?>" type="text">
					</div>
					<div class="form-group">
						
						<input name="username" style="background-color:#a1a1a11f;" class="form-control"placeholder="username" value="<?php old('username'); ?>" type="text">
					</div>
					<div class="form-group">
						
						<input name="pass" placeholder="password" class="form-control" type="password">
					</div>
					<div class="form-group">
						
						<input name="cpass" placeholder="confirm password" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Gender</label><br>
						
						<span class="gender1"><label for="Male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="gender"id="Male" value="Male" type="radio"></span>
					
						<span class="gender2"><label for="Female">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="gender"id="Female" value="Female"type="radio"></span>
					
					</div>
					<p class="p">By clicking Sign Up, you agree to our <span class="sp">Terms, Data Policy</span> and <span class="sp">Cookie Policy</span>. You<br> may receive SMS notifications from us and can opt out at any time.</p>
					<div class="form-group buton">
						<input class="btn  btn1" type="submit"name="add" value="Sign Up">
					</div><hr>
					<a href="index.php" class="btn btn-primary d-flex justify-content-center">Login Now!</a>
				</form>
			</div>
		</div>
	</div>
	


                </div>
            </div>
        </div>
    </section><br><br><br><br><br>


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>