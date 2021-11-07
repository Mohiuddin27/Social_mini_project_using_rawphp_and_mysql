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
	
     <section class="users">
         <div class="container">
             <div class="row mb-3">
                 <?php
                   $all_uses=all('users');
                   while($user=$all_uses->fetch_object()):
                 ?>
                 <?php if($user->id != $_SESSION['id']): ?>
                 <div class="col-md-4">
                     <div class="user-item">
                         <div class="card shadow ca">
                             <div class="card-body">
                                 <img  src="media/users/<?php echo $user->photo; ?>" alt="">
                                 <h4><?php echo $user->name; ?></h4>
                                 <a href="profile.php?user_id=<?php echo $user->id; ?>"class="btn btn-primary">View Profile</a>
                             </div>
                         </div>
                     </div>

                 </div>
                 <?php endif; ?>
                 <?php endwhile; ?>
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