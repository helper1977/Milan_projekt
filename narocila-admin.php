<html>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>

<body>


<?php  

 include 'header-admin.php';

 if (isset($_COOKIE['login-admin'])) {
   

} else {

    header("Location: prijava.php");

}
?>


<div class="vsa-narocila">

<div class="narocila-filtri">
</div>

<div class="tabela">
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

$sql = "SELECT * FROM narocila";
    
$result = $conn->query($sql);

if ($result!=null) {
    

    while ($row = $result->fetch_assoc()) {


        ?>
        <tr>
        <td class="tabela-link-brez"><a href="/milan_projekt/izdelek-admin.php?izdelek=<?php echo $row['artikel']?>"><?php echo $row['artikel']?></a></td>
        <td><?php echo $row['kolicina']?></td>
        <td><?php echo $row['velikost']?></td>
        <td class="tabela-link"><a href="/milan_projekt/uporabnik-pregled.php?uporabnik=<?php echo $row['uporabnik']?>"><?php echo $row['uporabnik']?></a></td>
        <td><?php echo $row['datum']?></td>
        </tr>
    
    
    <?php


    }

}

 ?>


</table>
</div>
</div>


</body>

</html>
