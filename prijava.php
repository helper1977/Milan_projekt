<html>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<head>

<link rel="stylesheet" type="text/css" href="dizajn.css">

</head>

<body>
<?php  include 'login-header.php'; ?>

<div class="prijava-form">
    <div>
<h1>Prijava</h1>
<br>

<!-- Prijavna forma -->
<form method="POST">

   <p>Uporabnisko ime:</p><br>
  <input  id="up_ime" type="text" name="up_ime" value="" placeholder="...">
  <br><br> 
   <p>Geslo:</p> <br>
  <input  id="geslo" type="password" name="geslo" value="" placeholder="...">
  <br><br>

  <div class="prijava-submit">
  <input type="submit" name="registracija" value="Registracija" />
  <input type="submit" name="submit" value="Prijava" />
</div>
</form> 
</div>
</div>

<?php


// povezava s podatkovno bazo, da se preveri vnešeno uporabniško ime in geslo

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='trgovina'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

//ko uporablik klikne "Prijava" 

if (isset($_POST['registracija'])) {

    header("Location: registracija.php");

}


if (isset($_POST['submit'])) {


    $up_ime = $_POST["up_ime"];
    
    $geslo = $_POST["geslo"];
   
    //poizvedba, če je uporabnik admin
    $sql = "SELECT vrsta FROM uporabniki WHERE geslo='$geslo' AND up_ime='$up_ime'";
    
    $result = $conn->query($sql);
    
  
    
    
    if ($result!=null) {
        
        //ustvarjanje sej, da se bo na vsaki strani preverilo, če je uporabnik res prijavljen


        while ($row = $result->fetch_assoc()) {
            if($row['vrsta'] == 'admin'){
                session_start();
                $_SESSION['up_ime'] = $up_ime;
                setcookie("login-admin",$up_ime, time() + 3600);

                header("Location: home-admin.php");
            }
            else{

                session_start();

                $_SESSION['logiran'] = true;
                $_SESSION['up_ime'] = $up_ime;


                
                setcookie("login",$up_ime, time() + 3600);

                header("Location: home-prijavljen.php");
            }
        }
    } else {
        echo "0 results";
    }
    
      
    $conn->close();
}


?>

<?php  

 include 'footer.php';
?>

</body>
</html>
