<?php require_once "autoload.php";
if(userlogincheck()==false){
    header('location:index.php');
}else{
    $user_data=loginuserdata('users',$_SESSION['id']);
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
<body class="friends">
	<?php
          if(isset($_POST['submit'])){
              $old=$_POST['old'];
              $new=$_POST['new'];
              $cnew=$_POST['cnew'];
              $hash_pass=gethash($new);

              if(empty($old) || empty($new) || empty($cnew)){
                   $msg=validate('All fields are required','danger');
              }else if($new!=$cnew){
                   $msg=validate('password confirmation faild','warning');
              }else if(password_verify($old ,$user_data->password)==false){
                   $msg=validate('Old pass is wrong','warning');
              }else{
                  connect()->query("UPDATE users SET password='$hash_pass' WHERE id='$user_data->id'");
                  session_destroy();
                  header('location:index.php');
              }
          }



    ?>
	<div class="profile-menu shadow-sm">
            <div class="row .pro-nav">
                <div class="col-md-8 offset-2">
                    <ul class="nav nav-tab justify-content-center pro-nav">
                        <li class="nav-item"><a class="nav-link link1" href="profile.php">My profile</a></li>
                        <li class="nav-item"><a class="nav-link link2" href="friends.php">Friends</a></li>
                        <li class="nav-item"><a class="nav-link link3" href="edit.php">Edit profile</a></li>
                        <li class="nav-item"><a class="nav-link link4" href="photo.php">Profile Photo</a></li>
                        <li class="nav-item"><a class="nav-link link5" href="pass.php">Password Change</a></li>
                        <li class="nav-item"><a class="nav-link link6" href="logout.php">Log out</a></li>
                    </ul>
                </div>
        </div>
    </div>
	

         <div style="display:block;margin:0 auto;margin-top:120px;border-radius:10px;"class="card ca text-center shadow">
         <?php if(isset($msg)){
               echo $msg;

         }
         ?>
             <div class="card-body">
                 <form action=" " method="POST">
                   <div class="form-group">
                   <input type="password" name="old" class="form-control pa1" placeholder="old password">
                   </div>
                   <div class="form-group">
                   <input type="password" name="new" class="form-control pa1" placeholder="new password">
                   </div>
                   <div class="form-group">
                   <input type="password" name="cnew" class="form-control pa1" placeholder="confirm password">
                   </div>

                   <div class="form-group">
                   <input class="btn btn-primary" type="submit" name="submit" value="Change password">
                   </div>
                   
                 </form>
             </div>
         </div>
     </section>






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>