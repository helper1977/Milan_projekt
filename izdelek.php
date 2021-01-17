<html>


<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>

<body>

<?php  



if (isset($_COOKIE['login'])) {
   
 $up_ime = $_COOKIE['login'];

} else {
   
   
    header("Location: prijava.php");

    
   
   
}

include 'header-prijavljen.php';

// <a href="/Milan_projekt/izdelek.php?izdelek=<?php echo $row['naziv']">


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
        <p>Vključno z ddv.<br>
        Cena se lahko razlikuje od cene v trgovini.</p>

        <form method="POST">
            <h3>VELIKOST</h3>
            <select name="velikost" id="velikost">
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            <option value="43">43</option>
			<option value="43">44</option>
			<option value="43">45</option>
			<option value="43">46</option>
            </select>
            <br><br>
            <h3>KOLIČINA</h3>
            <select name="kolicina" id="kolicina">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
            <br><br>
            <input type="submit" name="naroci" value="Naroči">
        </form>
    

        <?php

    if (isset($_POST['naroci'])) {

        

        if(isset($_POST['velikost']) && isset($_POST['kolicina'])){

            $velikost = $_POST["velikost"];
            $kolicina = $_POST["kolicina"];

            $sql = "INSERT INTO  narocila (uporabnik, artikel, velikost, kolicina, datum) VALUES ('$up_ime','$izdelek','$velikost','$kolicina', now())";
            
    
            if ($conn->query($sql) === TRUE) {
                header("Location: narocila.php");
              } else {
                echo "Prišlo je do napake.";
              }
              
            $conn->close();

            

        }
        else{
            echo "Vsi parametri niso izbrani.";
        }

    }

    }


    }






?>

<?php  

 include 'footer.php';
?>

</body>



</html>