<html>

<head>
<link rel="stylesheet" type="text/css" href="dizajn.css">
</head>

<body>

<?php  

 include 'header-admin.php';
?>

<div class="home-main">

<?php

// preverjanje, če je uporabnik prijavljen



if (isset($_COOKIE['login-admin'])) {
    

} else {
   
    header("Location: prijava.php");

   
}





?>

<br><br>

<form method="POST">
    

<div class="home-main-iskanje">
<div class="home-main-iskanje-item1">
  <input  id="iskanje" type="text" name="iskanje" value="" placeholder="Iskanje...">
  <br>
</div>
<div class="home-main-iskanje-item2">
  <input type="submit" name="submit" value="Išči" />
</div>
</div>

<div class="home-main-page">
<div class="home-main-page-filtri">

</form> 

<h2>Filtri</h2>
<form method="POST">

<h3> Vrsta čevlja</h3>

<div class="inputCheck">
<p>Superge</p>
<input type="checkbox" name="vrsta[]" value="Superge">
</div>

<div class="inputCheck">
<p>Pohodniški</p>
<input type="checkbox" name="vrsta[]" value="Pohodniski">
</div>

<div class="inputCheck">
<p>Natikači</p>
<input type="checkbox" name="vrsta[]" value="Natikaci">
</div>

<div class="inputCheck">
<p>Gležnjarji</p>
<input type="checkbox" name="vrsta[]" value="Gleznjarji">
</div>
<div class="inputCheck">
<p>Čevlji</p>
<input type="checkbox" name="vrsta[]" value="Cevlji">
</div>



<h3>Firma čevlja</h3>
<div class="inputCheck">
<p>Nike</p>
<input type="checkbox" name="firma[]" value="Nike">
</div>

<div class="inputCheck">
<p>Adidas</p>
<input type="checkbox" name="firma[]" value="Adidas">
</div>

<div class="inputCheck">
<p>Puma</p>
<input type="checkbox" name="firma[]" value="Puma">
</div>

<div class="inputCheck">
<p>Converse</p>
<input type="checkbox" name="firma[]" value="Converse">
</div>

<div class="inputCheck">
<p>Cat</p>
<input type="checkbox" name="firma[]" value="Cat">
</div>


<h3>Cena</h3>

<select name="cena" id="cena">
    <option value="Najnizja">Naraščajoče</option>
    <option value="Najdrazja">Padajoče</option>
</select>
<br><br>
<input type="submit" name="filtri" value="Filtriraj">
</form>

</div>
<div  class="home-main-page-izdelki">
<?php 

$dbhost = 'localhost';
$user ='root';
$pass ='';
$db ='spletna_trgovina'; // databasename
$conn=mysqli_connect("$dbhost","$user","$pass","$db");

$sql = "SELECT * FROM artikli";
    
$result = $conn->query($sql);


if (isset($_POST['filtri'])) {


    $sql_filtri = "SELECT * FROM artikli";

    //filter za vsako vrsto ki se je izbrala
    if(isset($_POST['vrsta'])){

        $vrsta = $_POST["vrsta"];
        
        if(!empty($vrsta)) 

        {
            $sql_filtri .= " WHERE vrsta='";
        $N = count($vrsta);

        for($i=0; $i < $N; $i++)
        {
            $sql_filtri .= $vrsta[$i] . "'";

            if(($i+1)<$N){
                $sql_filtri .= " OR vrsta='";
            }
            
        }
        
        }
    }

    //filter za vsako firmo ki se je izbrala
    if(isset($_POST['firma'])){

        $firma = $_POST["firma"];

        if(!empty($firma)) 

        {
            if(!empty($vrsta)){
                $sql_filtri .= " AND firma='";
            }else{
                $sql_filtri .= " WHERE firma='";
            }
            
        $N = count($firma);

        for($i=0; $i < $N; $i++)
        {
            $sql_filtri .= $firma[$i] . "'";

            if(($i+1)<$N){
                $sql_filtri .= " OR firma='";
            }
            
        }
        
        }
    }

    if(isset($_POST['cena'])){

        $cena = $_POST["cena"];

        if(!empty($cena)) 

        {
            if($cena == "Najnizja"){
                $sql_filtri .= " ORDER BY cena ASC";
            }
            if($cena == "Najdrazja"){
                $sql_filtri .= " ORDER BY cena DESC";
            }
            

        }
    }

    //echo $sql_filtri;

    $result_filtri = $conn->query($sql_filtri);

    ?><br><br><?php

    if ($result_filtri!=null) {
    

        while ($row = $result_filtri->fetch_assoc()) {

            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="slike/<?php echo $row['slika']?>.png" alt="slika" width="270px" height="125px"/>
            <div class="ime-izdelka">
            <h4>
            <a href="/milan_projekt/izdelek-admin.php?izdelek=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
            </h4>

            <p>
            <?php echo $row['firma'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php

        }
      

        }
    }




else if (isset($_POST['submit'])) {

    $iskanje = $_POST["iskanje"];
    

    $sql2 = "SELECT * FROM artikli WHERE naziv LIKE '%{$iskanje}%'";
    
    $result2 = $conn->query($sql2);

    if ($result2!=null) {
        
        //ustvarjanje sej, da se bo na vsaki strani preverilo, če je uporabnik res prijavljen


       

        while ($row = $result2->fetch_assoc()) {

            

            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="slike/<?php echo $row['slika']?>.png" alt="slika" width="270px" height="125px"/>
            <div class="ime-izdelka">
            <h4>
            <a href="/milan_projekt/izdelek-admin.php?izdelek=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
            </h4>

            <p>
            <?php echo $row['firma'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php
        }
      

        }

       
    
} else{

   


    if ($result!=null) {
    


    

        while ($row = $result->fetch_assoc()) {
            ?>
            
            <div class="home-main-page-izdelki-posamezni">
            
            <img src="slike/<?php echo $row['slika']?>.png" alt="slika" width="270px" height="125px"/>
            <div class="ime-izdelka">
            <h4>
            <a href="/milan_projekt/izdelek-admin.php?izdelek=<?php echo $row['naziv']?>"><?php echo $row['naziv']?></a>
            </h4>

            <p>
            <?php echo $row['firma'] ?>
            </p>

             <h3>
            <a>
            <?php echo $row['cena'] ?>
            €
            </a>
            </h3>
            
            
           
            </div>
            </div>

            <?php
        }
       
        
    }


}





?>
</div>
</div>

</body>

<?php  

 include 'footer.php';
?>

</html>