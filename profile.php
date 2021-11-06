<?php require_once "autoload.php";

if(userlogincheck()==false){
    header('location:index.php');
}else{
    if(isset($_GET['user_id'])){
        $user_data=loginuserdata('users',$_GET['user_id']);
    }else{
    
        $user_data=loginuserdata('users',$_SESSION['id']);
    }
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
<body class="pro">
	

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
         <h3 class="text-center mt-3 mb-3" style="color:white;text-transform: uppercase;"><?php echo $user_data->name; ?></h3>
         <div class="card shadow pro-card">
             <div class="card-body">
                 <table class="table table-striped">
                     <tr>
                         <td>Name :</td>
                         <td><?php echo $user_data->name; ?></td>
                     </tr>
                     <tr>
                         <td>Email :</td>
                         <td><?php echo $user_data->email; ?></td>
                     </tr>
                     <tr>
                         <td>Cell :</td>
                         <td><?php echo $user_data->cell; ?></td>
                     </tr>
                     <tr>
                         <td>Gender :</td>
                         <td><?php echo $user_data->gender; ?></td>
                     </tr>
                     <?php if($user_data->age != NULL): ?>
                     <tr>
                         <td>Age</td>
                         <td><?php echo  $user_data->age;   ?></td>
                     </tr>
                     <?php endif; ?>
                     <?php if($user_data->edu != NULL): ?>
                     <tr>
                         <td>Education</td>
                         <td><?php echo  $user_data->edu;   ?></td>
                     </tr>
                     <?php endif; ?>
                 </table>
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