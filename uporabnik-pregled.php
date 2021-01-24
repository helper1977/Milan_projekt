<html>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />


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
$up_ime = $_GET['uporabnik'];

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='trgovina'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM uporabniki WHERE up_ime='$up_ime'";
    
$result = $conn->query($sql);

if($result!=null){



    while ($row = $result->fetch_assoc()) {

    
        ?>
            
        
        <div class="uporabnik">
        <div class="uporabnik-podatki">

        <p>
        <?php echo $row['ime'] ?>
        </p>
        <p>
        <?php echo $row['priimek'] ?>
        </p>
        <p>
        <?php echo $row['naslov'] ?>
        </p>
        <p>
        <?php echo $row['e_naslov'] ?>
        </p>
        <p>
        <?php echo $row['stevilka'] ?>
        </p>
        <h4>
        <a>
        <?php echo $row['up_ime'] ?>
        
        </a>
        </h4>

        </div>
        </div>
        

    
    

        <?php

    

    }


    }






?>

<?php  

 
?>

</body>



</html>
