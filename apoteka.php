<?php
$andol=filter_input(INPUT_POST,"andol",FILTER_SANITIZE_NUMBER_INT);
$aspirin=filter_input(INPUT_POST,"aspirin",FILTER_SANITIZE_NUMBER_INT);
$vitaminc=filter_input(INPUT_POST,"vitaminc",FILTER_SANITIZE_NUMBER_INT);
$magnezijum=filter_input(INPUT_POST,"magnezijum",FILTER_SANITIZE_NUMBER_INT);
$adresa=filter_input(INPUT_POST,"adresa",FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="slike/apoteka.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Apoteka</title>
</head>
<body>
<div id="logo">
        <img src="slike/apoteka2.jpg" alt="Slika logo-a" height="200px">
    </div>
<h1>Apoteka - narudzbina</h1>
 <h2>Fiskalni racun</h2>
 <hr>
 <?php
 echo "<p>Roba narucena u: ".date('H:i, jS F')."</p>";
 echo "<h3>Porudzbina </h3>";
 //$ukupnaKolicina=0;
 //$ukupnaCena=0.00;
 $ukupnaKolicina=$andol+$aspirin+$vitaminc+$magnezijum;
 echo "Ukupna kolicina: ".$ukupnaKolicina."<br><br>";
 if($ukupnaKolicina==0) echo "Niste narucili nista";
 else{
    echo "<h3>Narucili ste:</h3>";
    if($andol>0) echo $andol." andol/a<br>";
    if($aspirin>0) echo $aspirin." aspirin/a<br>";
    if($vitaminc>0) echo $vitaminc." vitamin/a C<br>";
    if($magnezijum>0) echo $magnezijum." magnezijum Direct/a<br>";
 }
 echo "<br><br><h3>Cena:</h3>";
 $ukupnaCena=$andol*350+$aspirin*450+$vitaminc*750+$magnezijum*1200;
 echo "Vas ukupni racun iznosi: ".$ukupnaCena.",00 dinara<br><br>";
 $dokument="narudzbenice.txt";
 if(file_exists($dokument)){
    $fajl=fopen($dokument,"a");
    $tekstZaIspis=date("Y-m-d H:i:s",time())."- Narucena kolicina: {$ukupnaKolicina} , Naruceni lekovi: Andola-{$andol}, Aspirina-{$aspirin}, Vitamina C-{$vitaminc},Magnezijuma Direct-{$magnezijum} , Ukupna cena narucenih lekova:{$ukupnaCena} , Adresa sa koje ste narucili lekove: {$adresa}\n";
    fwrite($fajl,$tekstZaIspis);
    fclose($fajl);
 }
 else echo "Porudzbina nije prosla,pokusajte ponovo!!!";

 if($adresa!=""){
     echo "<p style='color:green'>Uspesno ste narucili proizvod</p>";
 }
 else echo "<p style='color:red'>Neuspela narudzbina, morate uneti adresu!</p>";
 ?>
 <br><br>
 <a href="apoteka.html"><button>Vrati se u apoteku</button></a> 
 
</body>
</html>