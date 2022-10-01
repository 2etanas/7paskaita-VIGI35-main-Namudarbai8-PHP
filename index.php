<?php

//Darba su failais

//Masyvas x
//Funkcija x
//Programavimo budai x


//Dvieju skaiciu suma

//kodo lokalizacija

//suskaiciuojama masyvas kur kiekvienas elementas turi savo eiles numeri kuris prasideda nuo 0
$masyvas = array(1,2,3,4,5,6,7,8,9,10);
$masyvas1 = [1,2,3,4,5,6,7,8,9,10]; //klasikinis


//asociatyvus masyvas - kur kiekvienas elementas turi ne eiles numeri, o savo pavadinima
//array()

$asocmasyvas = array(
    'pirmas' => 1,
    'antras' => 2,
    'trecias' => 3,
    'ketvirtas' => 4,
    'penktas' => 5,
    'sestas' => 6,
    'septintas' => 7,
    'astuntas' => 8,
    'devintas' => 9,
    'desimtas' => 10
);

var_dump($masyvas);
var_dump($masyvas1);
var_dump($asocmasyvas);


//suskaiciuojamame masyve norime konkretu elementa

echo $masyvas[2];

//asociatyviame masyve norime konkretu elementa
echo $asocmasyvas["trecias"];//3

//kiek elemenentu yra masyve? count()
//javascript length
echo count($masyvas); //10
echo count($asocmasyvas); //10


//masyvo iteravimas(ejimas su ciklu per masyvo elementus)

//suskaiciuojamame masyve
echo "<br>";
for($i = 0; $i< count($masyvas); $i++){
    echo $masyvas[$i];
    echo "<br>";
}

//asociatyviu masyvu
//foreach - kiekvienam

//Funkcija - kodo blokas(gabaliukas), pakartotiniam veiksmui atlikti


//void funkcija, tuscia funkcija - ji neturi return(negrazina jokios reiksmes) ir tik atlieka tam tikra veiksma
//mes negalime priskirti kintamajam
//funkcijos deklravimas/aprasymas
function pasisveikink() {
    echo "Labas";
}

//funkcijos iskvietimas
pasisveikink();

//grazinanti reiksme funkcija
//gali buti priskirta kintamajam
function grazinkReiskme() {
    return "Labas";
}
echo "<h1>Grazinama reiksme";

echo grazinkReiskme();
echo "</h1>";


//misri funkcija
function grazinkReiksme2() {
    echo "Labas";
    return "Labas";
}

//funkcija su parametrais

//void funkcija tuscia
function suma($parametras1, $parametras2) {
    //$parametras1 = 4
    //$parametras2 = 25

    $suma = $parametras1 + $parametras2;

    echo $suma;
}
echo "<h1>Suma ";
    suma(4,25);////$parametras1 = 4 $parametras2 = 25 $suma = 29
echo "<br>";
    suma(3,2); // $parametras1 = 3 $parametras2 = 2 $suma = 5
echo "</h1>";
//4 ir 25
//3 ir 2

//grazinanti reiksme

// function sumaGrazinkReiksme( $parametras1, $parametras2) {
//    
//      $suma = $parametras1 + $parametras2;

//     return $suma;
// }

echo "<h1>Suma";


echo "</h1>";



foreach($asocmasyvas as $individualusElementas) {
//nereikia skaiciuoti kiek masyve elementu
//automatiskai suranda elemento pavadinima
//suskaiciuojamam masyvui

//$.each() - jquery
//forEach()

// $asocmasyvas = array(
//     'pirmas' => 1,
//     'antras' => 2,
//     'trecias' => 3,
//     'ketvirtas' => 4,
//     'penktas' => 5,
//     'sestas' => 6,
//     'septintas' => 7,
//     'astuntas' => 8,
//     'devintas' => 9,
//     'desimtas' => 10
// );

// $individualusElementas = $asocmasyvas["pirmas"]; 1 iteracija
// $individualusElementas = $asocmasyvas["antras"]; 2 iteracija
// $individualusElementas = $asocmasyvas["desimtas"]; 10 iteracija

    echo $individualusElementas;
    echo "<br>";

}


// ///////////////////////////////////////////////////////////
$c = "labas1";

class Skaiciuotuvas {


    //klases savybes(klases kintamieji)
    //jie egzistuos tik klaseje!!!!!!!!(klases skliausteliuose)
    
    public $a;
    public $b;
    public $c = "labas";

    //public, private, protected - savybes apsauga
    //public - gali buti pasiekiamas kintamasis uz klases
    //private - gali buti pasiekiamas tik klases viduje


    //*** */
    //protected - gali buti pasiekiamas tik klases viduje ir jos vaikiniais klases

    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function sudeti() {
        echo $c;//labas1 
        
        //kuris $c bus atvaizduotas? labas ar labas1?
        //labas
        echo $this->c; //labas
        $this->atimti();
        return $this->a + $this->b;
    }

    public function atimti() {
        return $this->a - $this->b;
    }

}


//echo $c;

$sumaObjekta = new Skaiciuotuvas(5, 10);
echo $sumaObjekta->sudeti();