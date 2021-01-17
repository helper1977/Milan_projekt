<html>
<head>

<link rel="stylesheet" type="text/css" href="dizajn.css">

</head>
<body>
<div  style="background-color:#fffcf2">
<div class="nav-main">

<div class="nav-item">

<a href="/milan_projekt/home-prijavljen.php"><img src="slike/logo_helper_small.jpg" alt="logo" width="100px" height="100px"></img></a>

</div>
<div class="nav-item">

<p><a href="/milan_projekt/home.php">Ponudba</a></p>


</div>
<div class="nav-item">

<p><a href="/milan_projekt/narocila.php">Moja naročila</a></p>

</div>
<div class="nav-item">


<p><a href="/milan_projekt/kontakt-prijavljen.php">Kontakt</a></p>



</div>

<div class="nav-item-odjava">

<?php session_start(); ?>

<p class="odjava"><a href="/milan_projekt/odjava.php">Odjava (<?php echo $_SESSION['up_ime'] ?>)</a></p>

<?php  ?>

</div>




</div>
</div>
</body>
</html>