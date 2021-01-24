<html>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>
<body>

<?php  include 'login-header.php'; ?>
<div class="prijava-form">
    <div>
<h1>Registracija</h1>


<form method="POST">
  <div class="register-column">
  <div class="register-column-vmesni">
   <p>Uporabniško ime</p></br>
  <input  id="lastname" type="text" name="up_ime" value=""  required>
  <br><br>
</div>
<div class="register-column-vmesni">
  <p>Ime</p></br>
  <input  id="u_ime" type="text" name="ime" value=""  required>
  <br><br>
  </div>
</div>
  <div class="register-column">
  <div class="register-column-vmesni">
  <p>Priimek</p></br>
  <input   type="text" name="priimek" value=""  required>
  <br><br>
  </div>
  <div class="register-column-vmesni">
  <p>Telefonska številka</p></br>
  <input   type="text" name="stevilka" value="" required>
  <br><br>
</div>
  </div>

  <div class="register-column">
  <div class="register-column-vmesni">
  <p>Naslov</p></br>
  <input  type="text" name="naslov" value="" required>
  <br><br>
  </div>
  <div class="register-column-vmesni">
  <p>E-pošta</p></br>
  <input   type="text" name="e-posta" value="" required>
  <br><br>
</div>
  </div>
  

  <div class="register-column">
  <div class="register-column-vmesni">
  <p>Geslo</p></br>
  <input  type="password" class="form-control" id="password"  name="geslo" value="" required>
  <br><br>
  </div>

  </div>
  <div class="register-column">
      
    <input type="radio" name="status" value="uporabnik"><p>Navaden uporabnik</p></br>
  
  <input type="radio" name="status" value="admin" style="margin-left:1rem;" ><p>Admin</p></br>
  </div>
  
  
 
  <input type="submit" id="submit" class="gumb" name="submit" value="Registriraj!" />
  
</form> 
</div>
</div>
<?php




if (isset($_POST['submit'])) {
    
    $dbhost = 'localhost';
    $user ='root';
    $pass ='';
    $db ='trgovina'; // databasename
    $conn=mysqli_connect("$dbhost","$user","$pass","$db");
    


    //pridobivanje podatkov iz forme
    $up_ime = $_POST["up_ime"];
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];
    $geslo = $_POST["geslo"];
    $naslov = $_POST["naslov"];
 
    $e_posta = $_POST["e-posta"];
    $stevilka = $_POST["stevilka"];
 
    $status_value = $_POST["status"];
 
    
    
    $sql = "SELECT up_ime FROM uporabniki WHERE up_ime='$up_ime' ";
    
    $result = $conn->query($sql);
   
    if (mysqli_num_rows($result) == 0) {
        
        $sql = "INSERT INTO uporabniki ( up_ime, geslo, ime, priimek, vrsta, naslov, e_naslov, stevilka )
            VALUES ( '$up_ime', '$geslo', '$ime','$priimek', '$status_value', '$naslov', '$e_posta', '$stevilka')";
        
        if($conn->query($sql) === TRUE){
          header("Location: prijava.php");
        }
        else{
          echo "Prišlo je do napake";
        }
        
        
           
    }
    else{
        
        echo "To uporabniško ime ali email že obstajata";
        }

    
    $conn->close();
    exit;
  
}

   
?>
<?php  

include 'footer.php';
?>

</body>
</html>




