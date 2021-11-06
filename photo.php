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
<body class="photoo">
	
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
     <section class="user-profile">
     
     <?php  if(isset($user_data->photo)) : ?>
         <img src="media/users/<?php echo  $user_data->photo; ?>" alt="photo">
         <?php  elseif($user_data->gender == 'Male'): ?>
         <img src="media/users/men.jpg" alt="photo">
         <?php  else: ?>
         <img src="media/users/female.jpg" alt="photo">
         <?php endif; ?>
        <br><br><br>
        <?php
          if(isset($_POST['upload'])){
              $user_id=$_SESSION['id'];
              if(empty($_FILES['photo']['name'])){
                  setmsg('warning','please select a photo');
                  header('location:photo.php');
              }else{
              $file=move($_FILES['photo'],'media/users/');
              update("UPDATE users SET photo='$file' WHERE id='$user_id'");
              setmsg('success','Photo uploaded successfully');
              header('location:photo.php');
              }
          }
          getmsg('warning');
          getmsg('success');


    ?>

         <div class="card">
             <div class="card-body">
                 <form action=" " method="POST" enctype="multipart/form-data">
                   <input type="file" name="photo">
                   <input type="submit" name="upload" value="Upload image">
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