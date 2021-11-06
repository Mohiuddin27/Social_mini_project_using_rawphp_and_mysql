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
              $name=$_POST['name'];
              $email=$_POST['email'];
              $cell=$_POST['cell'];
              $username=$_POST['username'];
              $age=$_POST['age'];
              $edu=$_POST['edu'];
              $gender=$_POST['gender'];
              $updated_at=date('Y-m-d h:m:s');

              if(empty($name) || empty($email) || empty($cell) || empty($username) || empty($age) || empty($edu) || empty($gender)){
                  $msg=validate('All fields are required','danger');
              }else{
                  connect()->query("UPDATE users SET name='$name',email='$email',cell='$cell',updated_at='$updated_at',age='$age',edu='$edu',gender='$gender',username='$username' WHERE id='$user_data->id'");
                  $msg=validate('Edit successful','success');
                  setmsg('success','Data updated successfully');
                  header('location:edit.php');
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
	

         <div style="display:block;margin:0 auto;margin-top:50px;border-radius:10px" class="card shadow edit">
         <h2 style="margin-left:10px;color:white;" class="text-center">Edit Details</h2><hr style="background-color:white">
         <?php
            if(isset($msg)){
                echo $msg;
            }else{
                getmsg('success');
            }

         ?>
             <div class="card-body">
                 <form action=" " method="POST">
                 <div class="form-group forme">
						<label for="">Name</label>
						<input name="name" class="form-control pa" value="<?php echo $user_data->name; ?>" type="text">
					</div>
                    <div style="margin-left:45px;"class="form-group forme">
						<label for="">Cell</label> 
						<input name="cell" class="form-control pa" value="<?php echo $user_data->cell; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control pa" value="<?php echo $user_data->email; ?>" type="text">
					</div>

                    <div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control pa" value="<?php echo $user_data->username; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control pa" value="<?php echo $user_data->age; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Education</label>
						<input name="edu" class="form-control pa" value="<?php echo $user_data->edu; ?>" type="text">
					</div>
                    <div class="form-group">
						<label for="">Gender</label><br>
						<span class="gender1"><label for="Male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="gender"id="Male" value="Male" type="radio"<?php echo($user_data->gender == 'Male') ?'checked':''; ?>></span>
						<span class="gender2"><label for="Female">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;<input name="gender"id="Female" value="Female"type="radio"<?php echo($user_data->gender == 'Female') ?'checked':''; ?>></span>
					</div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Edit Details">
                    </div>
                 </form>
             </div>
         </div>
     </section><br><br><br>






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>