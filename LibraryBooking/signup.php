<?php
	session_start();
	require_once "database.php";
	// initialize the variables
	$name_error = $password1_error = $password2_error = $firstname_error = $lastname_error = $address1_error = $address2_error = $city_error = $telephone_error = $mobile_error = "";
	
	
	if ($_SERVER['REQUEST_METHOD'] == "POST" ){
		
		$u = $_POST['username'];
		$p1 = $_POST['password1'];
		$p2 = $_POST['password2'];
		$f = $_POST['firstname'];
		$l = $_POST['lastname'];
		$a1 = $_POST['address1'];
		$a2 = $_POST['address2'];
		$c = $_POST['city'];
		$t = $_POST['telephone'];
		$m = $_POST['mobile'];
		
		//Check Username
		if (empty($u)) {
			$name_error = "Name is required";
		  } else {
			$u = validation($_POST["username"]);		//if error change u to username	
		  }
		  
		  //check password
		  if (empty($p1)) {
			$password1_error = "You need to set a password";
		  }else if(strlen($p1) != 6)
			   {
			   $password1_error = "Password should be 6 digit";
			   }
		  
		  //check if password match
		  if (empty($p2)) {
		  $password2_error = "You need to confirm the password";
		  }
			else{
				if($_POST['password1'] != $_POST['password2'])
				{
					$password2_error = "Passwords do not match";
				}
			}
		  
		  
		  //check firstname
		  if (empty($f)) {
			$firstname_error = "Firstname is required";
		  } else {
			$name = validation($_POST["firstname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			  $firstname_error = "Only letters & whitespaces";
			}
		  }
		  
		  //check firstname
		  if (empty($l)) {
			$lastname_error = "Lastname is required";
		  } else {
			$name = validation($_POST["lastname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			  $lastname_error = "Only letters & whitespaces";
			}
		  }
		  
		  //check Address line1
		  if (empty($a1)) {
			$address1_error = "Please enter the address";
		  }
		  
		  if (empty($a2)) {
			$address2_error = "Please enter the address line2";
		  }
		  
		  //check City
		  if (empty($c)) {
		  $city_error = "City cannot be blank";}
		  
		  
		  //check mobile number and length
		  if (empty($m)) {
			$mobile_error = "Mobile number is required";
		  } else{
			  if(strlen($m) != 10)
			   {
			   $mobile_error = "Mobile  no. length should be 10";
			   }
			   else{
				   if(!is_numeric($_POST['mobile']))
					$mobile_error="Must be numbers";
			   }
			  
		  }
		  
		  //check telephone number and length
		  //I have considered telephone length of 7
		  if (empty($t)) {
			$telephone_error = "Telephone number is required";
		  } else{
			  if(strlen($t) != 7)
			   {
			   $telephone_error = "Telephone  no. length should be 7";
			   }
			   else{
				   if(!is_numeric($t))
					$telephone_error="Must be numbers";
			   }
			  
		  }
		  
	
		
		if(empty($name_error) && empty($password1_error) && empty($password2_error) && empty($firstname_name) && empty($lastname_name) && empty($aaddres1_error) && empty($address2_error) && empty($city_error) && empty($telephone_error) && empty($mobile_error))
		{
			$sql = "SELECT * from books WHERE Reserved = 'N'";	
			$result = $conn->query($sql);
			if(mysqli_num_rows($result) > 0){
				while($row = $result->fetch_assoc()){
					if($row['UserName'] = $u){
						$user_error = "Username already exists";
					}
				}
			}
			//save to database
			$sql = "INSERT into users(UserName, Password, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile) values('$u', '$p2', '$f', '$l', '$a1', '$a2', '$c', '$t', '$m')";
			//mysqli_query($conn, $sql);
			echo "$sql";
			
			if($conn->query($sql) === TRUE){
				echo "New record created successfully";
			}
			
			else{
				echo "ERROR: ". $sql."<br>" . $conn->error;
			}
			
			header("Location: login2.php");
			die;
		}
		
		
		$conn->close();
	}
	
	 function validation($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;

    }
	

	function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool 
	{
		return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
	}
	?>



<html>
<head>
<title>Registration Portal</title>
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
	margin-top: 14%;}
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


<div id="login">
        <p id = "logintitle"><h3 class="text-center text-white pt-5">Login form</h3></p>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                         <form method= "post" id = "login-form"  class= "form"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						 <span class = "error">* is required field</span>
							<br><br>
							<p>Username:
							<input type= "text" name="username">
							<span class="error">*<br> <?php echo $name_error;?></span></p>
							<p>Password:
							<input type="password" name="password1">							
							<span class="error">*<br> <?php echo $password1_error;?></span></p>
							<p>Confirm Password:
							<input type="password" name="password2">
							<span class="error">*<br> <?php echo $password2_error;?></span></p>
							<p>Firstname:
							<input type= "text" name="firstname">
							<span class="error">*<br> <?php echo $firstname_error;?></span></p>
							<p>Lastname:
							<input type= "text" name="lastname">
							<span class="error">*<br> <?php echo $lastname_error;?></span></p>
							<p>
							<p>Address Line1:
							<input type= "text" name="address1">
							<span class="error">*<br> <?php echo $address1_error;?></span></p>
							<p>
							<p>Address Line2:
							<input type= "text" name="address2">
							<br>
							<p>City:
							<input type= "text" name="city">
							<span class="error">*<br> <?php echo $city_error;?></span></p>
							<p>Telephone:
							<input type= "number" name="telephone">
							<span class="error">*<br> <?php echo $telephone_error;?></span></p>
							<p>Mobile:
							<input type= "number" name="mobile">
							<span class="error">*<br> <?php echo $mobile_error;?></span></p>
							<p>
							<div id="register-link" class="text-right">
                                Already have an account? <a href="login2.php" class="text-info">LOGIN here</a>
                            </div>
							<div class = "form-group">
							<input type= "submit" name = "create" value="Create" class="btn btn-info btn-md"></p>
							</br></br>
							</div>				
							</form>
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