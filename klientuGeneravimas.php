<?php 

//$_GET -  laikini 
//$_POST - laikini
//$_COOKIE - galioja tam tikra laika
//$_SESSION - serveris leidzia arba kol sunaikinama

//Kur pasideti pastovia informacija
//1. Duomenu baze
//2. Failas

//nuskaityti is failo informacija(read)
//file_get_contents(is failo gauti turini)
//tekstinio failo informacija pavercia i string(tekstini kintamaji)

$failas = file_get_contents("tekstas.txt");

echo $failas;

//irasyti i faila informacija(write)
//file_put_contents()
//string irasoma i pasirinka faila

//file_put_contents pries irasant i faila, ji isvalo !!!!!!!!!!!!
//iraso nauja informacija
//sukuria nauja faila jeigu jo nera


$tekstasKuriNoriuIrasyti = "Labas rytas";

// for($i=1; $i<=10; $i++) {
//     $tekstasKuriNoriuIrasyti .= "Labas rytas";
//     file_put_contents("tesktas$i.txt",$tekstasKuriNoriuIrasyti);

// }

//galime tik skaiciu, skaiciu po kablelio, ir teksta
//masyvo ir objekto mes irasyti negalime


 $klientas = array(
    "vardas" => "Jonas",
    "pavarde" => "Jonaitis",
    "amzius" => 25,
    "miestas" => "Vilnius"
);


$klientas1 = array(
    "vardas" => "Petras",
    "pavarde" => "Petraitis",
    "amzius" => 28,
    "miestas" => "Kaunas"
);

//masyvas - kintamuju sarasas su eiles numeriu
//masyvas = [$klientas, $klientas1];

$klientai = [$klientas, $klientas1]; //tuscias masyvas

for($i=0; $i<100;$i++) {


    //masyvo pildymo komandos
    //array_push() - prideda elementa i masyvo pabaiga
    //$klientai = array_push($klientas);
    //[] = array_push - prideda elementa i masyvo pabaiga

    $naujasKlientas = array(
        "vardas" => "Petras$i",
        "pavarde" => "Petraitis$i",
        "amzius" => rand(18,65),
        "miestas" => "Kaunas"
    );


    $klientai[] = $naujasKlientas;
}


var_dump($klientai);


//var_dump($klientas);

 file_put_contents("klientai.json", json_encode($klientai));
// file_put_contents("klientai.json", json_encode($klientas1));



$atkurtasKlientai = file_get_contents("klientai.json");
$atkurtasKlientai = json_decode($atkurtasKlientai, true);

var_dump($atkurtasKlientai);

//kaip irasyti 100 klientu i faila?

?>