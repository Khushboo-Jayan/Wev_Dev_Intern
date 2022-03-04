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
    <title>CATEGORY SEARCH</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  </head>
<style>
body {background-color: #cceeff;}
#frm{
	width: 30%;
	border: solid black 2px;
	border-radius:5%;
	background: white;
	padding:3%;
	color: #007bff;
	margin-left: 34%;
	margin-top: 6%;}
.error{
	color: red;
	font-size: 10px;
}
#table{
	border-collapse: collapse;
	width: 50%;
	align: center;.
	
	
}
 table.center {
    margin-left:auto; 
    margin-right:auto;
	margin-top: 10%;
	padding-top: 10px;
	margin-bottom: 50px;
	margin-bottom: 100px;
	
  }
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
td:hover {background-color: #cceeff;}
tr:hover {background-color: #33bbff;}
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

	
	//Database Connection
	$con = new PDO("mysql:host=localhost; dbname=library", 'root', '');
	
	if(isset($_POST['category'])){
		$str = $_POST["category"];
		$sql = $con -> prepare("SELECT * from books INNER JOIN category ON Books.Category = Category.CategoryID WHERE Category.CategoryDefinition = '$str'");
		//echo "$sql";
		$sql -> setFetchMode(PDO::FETCH_OBJ); 
		$sql -> execute();
		//$book_data = mysqli_fetch_array($re0sult);
		if ($sql->rowCount() > 0){
		?>
		
		
			<table border="" id = "table" class = "center">
			<tr>
			<th>ISBN</th>
			<th>Book Title</th>
			<th>Author</th>
			<th>Edition</th>
			<th>Year</th>
			<th>Category</th>
			<th>Reserved</th>
			<th>Category ID</th>
			<th>Category Type</th>
			<th>BOOK NOW!</th>
			
			</tr>
			<?php
				while($row = $sql->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>";
					foreach($row as $_column) {
						echo "<td>{$_column}</td>";
					}
					if($row['Reserved'] === 'N')
						{
							$ISBN = $row['ISBN'];
							//$_SESSION['ISBN'] = $ISBN;
							//echo "$_SESSION['ISBN']";
							echo '<td><a href="reserve_data.php?isbn='.htmlentities($row["ISBN"]).'">Reserve!!</a></td>';
						}
					else{						
							echo"<td>Already booked</td>";
						}
						echo "</tr>";
				}
				
		
		}
	
			
			
		else{
			echo '<div class ="center">
						No such Book in library!
						</div>';
			}
	}
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

<div id ="frm">
	<form  id = "search_bar" method = "post" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<label for="Category">Choose a Category:</label>
			<select name="category" id="category">
				<option value="Health">Health</option>
				<option value="business">Business</option>
				<option value="technology">Technology</option>
				<option value="travel">Travel</option>
				<option value="self_help">Self-Help</option>
				<option value="cookery">Cookery</option>
				<option value="fiction">Fiction</option>				
			</select>
			<br><br>
			<button type="submit">SEARCH</button>
    </form>
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

	
	