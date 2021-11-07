<?php require_once "autoload.php"; 
if(userlogincheck()==true){
    header('location:profile.php');
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/forget.css">
    <link rel="stylesheet" href="font/font-awesome/css/all.css">
</head>
<body>

<?php
	   if(isset($_POST['signup'])){
		    $login= $_POST['login'];
		    $pass= $_POST['password'];
		   if(empty($login) || empty($pass)){
			   $msg=validate('All fields are required','danger');
		   }else{
			   $login_user_data=authcheck('users','email',$login);
               if($login_user_data !== false){
				   if(password_verify($pass,$login_user_data->password) == true){
					   $_SESSION['id']=$login_user_data->id;
					   $_SESSION['name']=$login_user_data->name;
					   $_SESSION['email']=$login_user_data->email;
					   $_SESSION['username']=$login_user_data->username;
					   $_SESSION['cell']=$login_user_data->cell;
					   $_SESSION['gender']=$login_user_data->gender;
					   $_SESSION['photo']=$login_user_data->photo;
					   header('location:profile.php');
				   }else{
					   $msg=validate('Password is incorrect','warning');
				   }
			   }
			   else{
				   $msg=validate('Email is invalid','warning');
			   }
		   }
	   }
    ?>
    <?php

            if(isset($_POST['submit'])){
                $email=$_POST['email'];
                $npass=$_POST['npass'];
                $hash_pass=gethash($npass);
                if(empty($email) || empty($npass)){
                $msg=validate('All fields are required','danger');
            }else{
                $login_user_data=authcheck('users','email',$email);
                if($login_user_data !== false){
                    $_SESSION['id']=$login_user_data->id;
                    connect()->query("UPDATE users SET password='$hash_pass' WHERE id='$login_user_data->id'");
                    $msg=validate("Password change successfully",'success');
                }
                else{
                    $msg=validate('Email is invalid','warning');
                }
            }

            }



?>

   <header class="shadow">

    <div class="row">
        <div class="col-md-3">
        <img class="w-50 mt-3 ml-2"src="media/users/fb.png" alt="photo">
        </div>
        <div class="col-md-9 forget">
            <form action="" method="POST">
            <div class="form-group">
						
					<input name="login" style="width:20%;float:left;margin-left:270px"class="form-control in" type="text" value="<?php old('login') ?>"placeholder="Email">
					</div>
					<div class="form-group">
						
						<input name="password"style="width:20%;float:left;margin-left:10px;" class="form-control in" type="password" placeholder="password">
					</div>
					
					<div  class="form-group">
						<input name="signup"  style="width:10%;float:left;padding:5px 0px;margin-left:10px;" class="btn btn-primary" type="submit" value="Log In">
					</div>
                    <a href="forgetpass.php" style="float:left;margin-left:10px;margin-top:5px">forgotten account<i class="fas fa-question"></i></a>
            </form>
        </div>
        
    </div>
    </header>



    <section class="setpass"> 
       <div class="container">
           <div class="row">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <h4 class="mt-4 ml-4" style="font-weight:600">Find Your Account</h4>
                       <?php 
                           if(isset($msg)){
                               echo $msg;
                           }
                       
                       ?>
                       <hr>
                       <p class="mt-2 ml-4" style="font-size:17px">Please enter your email address or mobile number to search for your account.</p>
                       <div class="card-body">
                       <form action="" method="POST">
            <div class="form-group">
						
					<input name="email" class="form-control in" type="text" value="<?php old('login') ?>"placeholder="Email">
					</div>
					<div class="form-group">
						
						<input name="npass" class="form-control in" type="password" placeholder=" New password">
					</div>
					
					<div  class="form-group">
						<input name="submit" class="btn btn-primary  justify-content-end" type="submit" value="Submit">
					</div>
                 
            </form>

                       </div>
                   </div>
               </div>
           </div>
       </div>
       
    </section>
        <div class="container">
    <div class="row">
        <div class="col-md-2 offset-md-5 mt-3">
            <a href="index.php" class="text-center">Back to Login page</a>
            </div>
        </div>
        </div>
        

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>