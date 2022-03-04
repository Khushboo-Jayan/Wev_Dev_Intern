<?php 

	session_start(); 
	$name_error = $password_error = "";

	include "database.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

    $user_name = validation($_POST['username']);
    $password = validation($_POST['password']);

    if (empty($user_name)) {
		$name_error = "UserName cannot be empty";
    }
	if(empty($password)){

        $password_error = "Please enter password";
    }
	if(empty($user_error) && empty($password_error)){

        $sql = "SELECT * FROM users WHERE UserName ='$user_name' AND Password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['UserName'] === $user_name && $row['Password'] === $password) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['UserName'];
                header("Location: home.php");
                exit();

            }else{

                header("Location: login2.html?error=Please enter some valid information!");
                exit();

            }

        }

    }

	}
	function validation($cleanData){
       $cleanData = trim($cleanData);
       $cleanData = stripslashes($cleanData);
       $cleanData = htmlspecialchars($cleanData);
       return $cleanData;

    }
	
	
	?>
	
	




<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<style>
body {background-color: #80d4ff;}
#login{
	width: 100%;
}
#login-form{
	width: 100%;
	border: solid black 2px;
	border-radius:5%;
	background: white;
	padding:3%;
	color: #007bff;
	margin-left: 52%;
	margin-top: 10%;}
.error{
	color: red;
	font-size: 10px;
}
.text-right{
	color: black;
}
footer{
	position:fixed;
	bottom:0;
	width:100%;
	background:#6cf
	padding: 25px;
	text-align: center;
	background-color: #cccccc;
	height: 25px;
  }
#footerEdit{
	background-color: #cccccc;
	color:white;
	
}
#footerEdit p{
	margin-right: 10px;
	font-size: 17px;
	color: black;
}
</style>

<body> 
<header>
	<nav id = "loginnnn"class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <?php 
			if(isset($_SESSION['user_name'])){
				echo '<a class="navbar-brand" href="logout.php">LOGOUT</a>'; 
			echo "</div>";
		  }
		  
			else{
				echo '<a class="navbar-brand" href="login2.php">LOGIN</a> <a class="navbar-brand" href="signup.php">		/	SIGNUP</a>
					</div>';
			}
		  ?>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="home.php">HOME</a></li>
			<li><a href="view.php">VIEW</a></li>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#">SEARCH BY
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="book_search.php">Book Title</a></li>
				<li><a class="dropdown-item" href="author_search.php">Author</a></li>
				<li><a class="dropdown-item" href="category2.php">Category</a></li>
			  </ul>
			</li>
		</div>
	  </div>
	</nav>
</header>
<br>
<br>
    <div id="login">
        <p id = "logintitle"><h3 class="text-center text-white pt-5">Login form</h3></p>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
								<?php if (isset($_GET['error'])) { ?>

								<p class="error"><?php echo $_GET['error']; ?></p>

								<?php } ?>
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
								<span class="error">*<br> <?php echo $name_error;?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
								<span class="error">*<br> <?php echo $password_error;?></span>
                            </div>
                   
                            <div id="register-link" class="text-right">
                                Dont have an account? <a href="signup.php" class="text-info">Register here</a>
                            </div>
							<div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="LOGIN">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer id="footer">
  <div id="footerEdit">
  <p>
    © 2020 Copyright: 
    <a class="text-white" href="https://ie.linkedin.com/in/khushboo-jayan">khushboojayan</a>
	</p>
  </div>
  <!-- Copyright -->
</footer>
</body>

</html>
	
	