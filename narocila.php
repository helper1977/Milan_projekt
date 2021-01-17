<html>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>

<body>


<?php  

if (isset($_COOKIE['login'])) {
   
    

   
    $_SESSION['logiran'] = true;
    $up_ime = $_COOKIE['login'];
    
    

} else {
   
   
    header("Location: prijava.php");
   
}


 include 'header-prijavljen.php';
?>


<div class="vsa-narocila">

<table class="tabela-narocil">
<tr>
    <th>Izdelek</th>
    <th>Količina</th>
    <th>Velikost</th>
    <th>Uporabnik</th>
    <th>Datum</th>
</tr>

 <?php 
 
 $dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM narocila WHERE uporabnik='$up_ime' ORDER BY datum DESC LIMIT 10";
    
$result = $conn->query($sql);

if ($result!=null) {
    

    while ($row = $result->fetch_assoc()) {


        ?>
        <tr>
        <td><?php echo $row['artikel']?></td>
        <td><?php echo $row['kolicina']?></td>
        <td><?php echo $row['velikost']?></td>
        <td><?php echo $row['uporabnik']?></td>
        <td><?php echo $row['datum']?></td>
        </tr>
    
    
    <?php


    }

}

else{

    ?> 
    <p>Ni naročil.</p>
    <?php

}

 ?>


</table>

</div>

<?php 

include 'footer.php';
?>

</body>

</html>
