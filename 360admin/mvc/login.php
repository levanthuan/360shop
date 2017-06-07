<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
#login{
	float:none;
	margin:50px auto;}
</style>
</head>

<body>

<?php
if(isset($_POST['submit'])){
	
	$User = new User();
	$User->set_user_name($_POST['user']);
	$User->set_user_pass($_POST['pass']);
	if($User->login() == 'login fail'){
		$_SESSION['error'] = '<div class="alert alert-danger">Account not valid!</div>';
	}
	else{
		header('location:index.php');	
	}
}
?>
<div class="container">
	<div class="row">
    	<div id="login" class="col-xs-4">
            <?php
            if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			?>
        	<form method="post">
            	<div class="form-group">
                	<label>Username</label>
                    <input required type="text" name="user" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input required type="text" name="pass" class="form-control" placeholder="Password" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
