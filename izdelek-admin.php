<html>


<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>

<body>

<?php  



if (isset($_COOKIE['login-admin'])) {
   


} else {
   
   
    header("Location: prijava.php");

    
   
   
}

include 'header-admin.php';

// <a href="/milan_projekt/izdelek.php?izdelek=<?php echo $row['naziv']">


// preverba, kateri izdelek moramo preveriti
$izdelek = $_GET['izdelek'];

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM artikli WHERE naziv='$izdelek'";
    
$result = $conn->query($sql);

if($result!=null){



    while ($row = $result->fetch_assoc()) {

    
        ?>
            
        <div class="izdelek">
        <div class="izdelek-slika">
        <img src="slike/<?php echo $row['slika']?>.png" alt="slika" width="400px" height="200px"/>
        </div>
        <div class="izdelek-podatki">

        <p>
        <?php echo $row['firma'] ?>
        </p>
        <p>
        <?php echo $row['vrsta'] ?>
        </p>
        <h4>
        <a>
        <?php echo $row['naziv'] ?>
        
        </a>
        </h4>

        

         <h3>
        <a style="font-size:30;">
        <?php echo $row['cena'] ?>
        €
        
        </a>
        </h3>
        

    
    

        <?php

    

    }


    }






?>

<?php  

 
?>

</body>



</html>