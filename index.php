<?php require_once "autoload.php"; 


 if(isset($_GET['rlc_id'])){

	  $rlc_id=$_GET['rlc_id'];
	  $rl_arr=json_decode($_COOKIE['recent_login_id'],true);
	  $rlu_arr=array_unique($rl_arr);
	  $index=array_search($rlc_id,$rlu_arr);
	  array_splice($rlu_arr,$index,1);
	  if(count($rlu_arr) > 0){
		setcookie('recent_login_id',json_encode($rlu_arr),time()+(60*60*24));
	  }else{
		setcookie('recent_login_id',' ',time()-(60*60*24));
	  }
	 
	  header('location:index.php');
 }
 if(userlogincheck()==true){
	 header('location:profile.php');
 }
 if(isset($_COOKIE['login_user_cookie_id'])){
	 $login_cookie_id=$_COOKIE['login_user_cookie_id'];
	 $_SESSION['id']= $login_cookie_id;
	 header('location:profile.php');
 }
 if(isset($_GET['recent_login_now'])){
	 $login_now=$_GET['recent_login_now'];
	 setcookie('login_user_cookie_id',$login_now,time()+(60*60*24*365));
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
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
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
					   setcookie('login_user_cookie_id',$login_user_data->id,time()+(60*60*24*365));
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
	<section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-7 facebook">
                  <img style="width:40%;" src="media/users/fb.png">
                  <h5>Facebook helps you connect and share <br> with the people in your life.</h5>
                </div>
                <div class="col-md-5">
                    <div class="card shadow" style="border-radius:10px;">
					<?php
                    if(isset($msg)){
						echo $msg;
					}
				?>
                        <div class="card-body">
                        <form action="" method="POST">
					<div class="form-group">
						
						<input name="login" class="form-control in" type="text" value="<?php old('login') ?>"placeholder="Email or Cell or Username">
					</div>
					<div class="form-group">
						
						<input name="password" class="form-control in" type="password" placeholder="password">
					</div>
					
					<div  class="form-group">
						<input name="signup"  class="btn btn-primary w-100" type="submit" value="Log In">
					</div>
                    <a href="forgetpass.php" class=" d-block text-center">Forgotten password?</a><hr>
                    <div class="reg">
                        <a href="reg.php" class="btn w-100">Create New Account</a>
                    </div>

				</form>
                        </div>
                    </div><br>
                    <p class="text-center"><span style="font-weight:700">Create a Page </span>for a celebrity, brand or business.</p>

                </div>
            </div>
        </div>
    </section>
	<div class="wrap rlogin">
	<h2>Recent Login:</h2><br>
		 <div class="row">
			 <?php 
			 if(isset($_COOKIE['recent_login_id'])):
			 $recent_login_user_arr=json_decode($_COOKIE['recent_login_id'],true);
			 $users_id=implode(',',$recent_login_user_arr);
			 $sql="SELECT * FROM users where id in ($users_id)";
			 $data=connect()->query($sql); 
			 
			 while($user=$data->fetch_object()):
			 
			 
			 ?>
			  
			 <div class="col-md-4">
			
				 <div  class="card"style="margin-bottom:15px;">
					 
					 <div class="card-body rlc-div">
						 <a class="close rlc" href="?rlc_id=<?php echo $user->id; ?>">&times;</a>
						 <a href="?recent_login_now=<?php echo $user->id; ?>">
						 <img style="width:100%;height:120px;border-radius:50%;object-fit:cover" src="media/users/<?php echo $user->photo; ?>">
						 <h4 style="margin-top:10px"><?php echo $user->name; ?></h4>
						 </a>
						
					 </div>
				 </div>
			 </div>
			 <?php endwhile; endif;?>
			 
		 </div>
		 
	 </div>
	
	 


	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>