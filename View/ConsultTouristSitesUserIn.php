<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


?>

<html>
<title>Tu destino soñado </title>
<head>
     <meta content="text/html; charset=UTF-8" http-equiv="content-type">
 <style>
 .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #2874A6;
}
</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    
</head>
    
  <body style="background-color:#273746;">
  <?php
include '../View/MenuLogedInUser.php';
?>
<br>
<center>
<div class="container">
    <h2 style="color:white">Sitios turisticos </h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	  <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
	  <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        
      <div class="item active">
          <img src="../Images/1.jpg" alt="Volcán Irazú" style="width:50%;height:50%;">
      </div>

      <div class="item">
        <img src="../Images/2.jpg" alt="Playa Conchal" style="width:50%;height:50%;">
      </div>
    
      <div class="item">
        <img src="../Images/3.jpg" alt="Playa Manzanillo" style="width:50%;height:50%;">
      </div>
       <div class="item">
        <img src="../Images/4.jpg" alt="Volcán Poas" style="width:50%;height:50%;">
      </div>
    
      <div class="item">
          <img src="../Images/5.jpeg" alt="Sanatorio duran" style="width:50%;height:50%;">
      </div>
	   <div class="item">
        <img src="../Images/6.jpg" alt="Paseo de los turistas, puntarenas" style="width:50%;height:50%;">
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</center>
<div class="footer">
  <p>Tu destino soñado</p>
	 <p>Versión 1.0</p>
</div>
</body>
</html>