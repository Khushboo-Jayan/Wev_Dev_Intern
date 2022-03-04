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
	//border-collapse: collapse;
	background-color: white;
	width: 50%;
	align: center;.
	
	
}
 table.center {
      margin-left:auto; 
    margin-right:auto;
	margin-top: 10%;
	padding-top: 10px;
	margin-bottom: 100px;
	
  }
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
td:hover {background-color: #4dffc3;}
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
	
	if(empty($_SESSION['user_name'])){
		header("Location: login2.php");
	}
	else{
	
	//initialize the error variable
	$author_error= "";
	
	if ($_SERVER['REQUEST_METHOD'] == "POST" ){
		
	
		
		if(empty($_POST['author_name'])){
			$author_error = "AuthorName is required";
		}
		else{
			$an = $_POST['author_name'];
			
		
			
			$sql = "SELECT * from books WHERE Author like '%$an%'";			
			$result = $conn->query($sql);
			if ((mysqli_query($conn,$sql)) > 0){
?>
				<table border="" id = "" class = "center">
				<tr>
				<th>ISBN</th>
				<th>Book Title</th>
				<th>Author</th>
				<th>Edition</th>
				<th>Year</th>
				<th>Category</th>
				<th>Reserved</th>
				<th>BOOK NOW!!</th>
				</tr>
			<?php
				while($row = $result->fetch_assoc())
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
				
			?>
				
<?php
				
			}
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
			  <a class="dropdown-toggle" data-toggle="dropdown" href="">SEARCH BY
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
        <input type="text" placeholder="AUTHOR" name="author_name"></input>
		<span class="error">*<?php echo $author_error;?></span>
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
<?php
	}
?>
	
	