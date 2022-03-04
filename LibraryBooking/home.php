<?php
	session_start();
	require_once "database.php";
		
	
?>
<html>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>TUD LIBRARY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <style>
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: black;
  }
  
  .carousel-caption p {
    color: black;
  }
  
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
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
	<nav class="navbar navbar-default navbar-fixed-top">
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="photos/pic1.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3><?php if(isset($_SESSION['user_name'])){
			  echo 'Hi ';
			  echo $_SESSION["user_name"];
			  echo '!!!';
		  } 
		  else{
			  echo "Hello! Please login";
		  }?></h3>
          <p>To use the serrvices register today!</p>
        </div>      
      </div>

      <div class="item">
        <img src="photos/pic3.jpg" alt="Chicago" width="1200" height="700">
		<div class="carousel-caption">
          <h3>Use Facilities</h3>
          <p>Book a study space Now!</p>
        </div>		
      </div>
    
      <div class="item">
        <img src="photos/pic2.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Golbal Exposure</h3>
          <p>Meet and learn with peoople from different ethnicity.</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
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


