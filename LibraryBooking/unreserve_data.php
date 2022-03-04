<?php
	session_start();

	require_once "database.php";
	
	if(empty($_SESSION['user_name'])){
		header("Location: login2.php");
	}
	else{
		
	
?>


<html>

<head>
    <title>AUTHOR SEARCH</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</head>
<style>
body {background-color: #cceeff;}
#main{
	border: solid black 2px;
	border-radius:5%;
	background: white;
	width:45%;
	padding:3%;
	font-size: 25px;
	margin-left: auto;
	margin-right:auto;
	margin-top:100px;
	}
	.error{
	color: red;
	font-size: 10px;
	
}
#table{
	//border-collapse: collapse;
	background-color: white;
	width: 50%;
	align: center;.
	
	
}
 table.center {
    margin-left:auto; 
    margin-right:auto;
	margin-top: 13%;
	padding-top: 10px;
	
  }
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
td:hover {background-color: #cceeff;}
tr:hover {background-color: #00aaff;}
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

<?php 

	session_start(); 
	include "database.php";

	

	if (isset($_GET['isbn']) ) {
				$ISBN = $_GET['isbn'];
				$user_name = $_SESSION['user_name'];
				$date = $conn -> real_escape_string(date('Y-m-d'));

				$sql = "Delete from reservedbooks WHERE ISBN = '$ISBN'";
				$result = $conn->query($sql);
				
				if($conn->query($sql) === TRUE){
					?>
					<h1>
					<p id = "main">Deleted successfully</p>
					<?php $query = "UPDATE books SET Reserved = 'N' WHERE ISBN = '$ISBN'";
					$conn->query($query);?>
					</h1><?php
				}
				else{
					?>
					<h1>
					<p id = "main"><?php echo "ERROR: ". $sql."<br>" . $conn->error;?></p>
					</h1><?php
					
				}			
		
		$conn->close();
	}
	

?>
	

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

<?php
	}
?>
	






	
	