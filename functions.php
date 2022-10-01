<?php 

//nuskaito infomracija json formatu ar pagamina masyva
function readJson($file) {
    $json = file_get_contents($file);
    $result = json_decode($json, true);
    return $result;

}

//kuri masyva pavercia i json ir iraso i faila
//void funkcija
function writeJson($file, $array) {
    $json = json_encode($array);
    file_put_contents($file, $json);
}

function addClient() {
    //1. readJson
    //2. papildysime nuskaityta masyva nauju klientu
    //3. writeJson
    $klientai=readJson("klientai.json");

    if(isset($_POST["addClient"])){
       
        //ilgai gaudyta klaida - jau egzistavo $file.
        $fileimg = $_FILES["nuotrauka"];
        $file_dir = "uploads/";
        $file_name_array = explode(".", $fileimg["name"]);
        $file_extension =  $file_name_array[1];
        $time = time();
        $new_name =$_POST["vardas"];
        $new_surname = $_POST["pavarde"];

        $random_string = $new_name.$new_surname.$time ;
        $file_name_generated = $random_string .".".$file_extension;
        // var_dump($file_name_generated); 
        $file_path = $file_dir . $file_name_generated;
        if(move_uploaded_file($fileimg["tmp_name"],$file_path)) {
            echo "Failas sekmingai ikeltas";
         } else {
            echo "Failo ikelti nepavyko";
            $file_path = "https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2574&q=80";
            
         }

        $naujasKlientas = array(
            "vardas" => $_POST["vardas"],
            "pavarde" => $_POST["pavarde"],
            "amzius" => $_POST["amzius"],
            "miestas" => $_POST["miestas"],
            "photo" => $file_path
        );
        $klientai[] = $naujasKlientas;
        writeJson("klientai.json", $klientai);
        $_SESSION["zinute"] ="Klientas sukurtas sėkmingai";

        header("Location: klientai.php");
        //nutraukia viso php failo veikima nuo sitos vietos
        exit();
    }
}

function showMessage() {
    if(isset($_SESSION["zinute"])){  
       echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION["zinute"];
            unset($_SESSION["zinute"]);
        echo '</div>';
    } 
}

//void tuscia
function getClients() {
    $klientai = readJson("klientai.json");
    
    krsort($klientai);


    foreach($klientai as  $i => $klientas) {
        if (empty($klientai[$i]["photo"])){
            $klientu_foto = "https://images.unsplash.com/photo-1611162616475-46b635cb6868?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2574&q=80";
           
        }else{
            $klientu_foto = $klientai[$i]["photo"];
        }

        echo "<tr>";
            echo "<td>$i</td>";
            echo "<td><img src=".$klientu_foto." "."width='150px' height='150px'></td>";
            echo "<td>".$klientas["vardas"]."</td>";
            echo "<td>".$klientas["pavarde"]."</td>";
            echo "<td>".$klientas["amzius"]."</td>";
            echo "<td>".$klientas["miestas"]."</td>";
            echo "<td>";
                echo "<a href='edit.php?id=$i' class='btn btn-secondary'>Edit</a>";
                echo "<form method='post' action='klientai.php'>
                        <button type='submit' name='delete' value='$i' class='btn btn-danger'>Delete</button>
                    </form>";
            echo "</td>";       
        echo "</tr>";
    }
}

function getClient($id) {
    $klientai = readJson("klientai.json");
    return $klientai[$id];
}

//trinti klientus
function deleteClient() {
    if(isset($_POST["delete"])) {
        $klientai = readJson("klientai.json");
        unset($klientai[$_POST["delete"]]);
        writeJson("klientai.json", $klientai);

        $_SESSION["zinute"] ="Ištrynėme klientą numeriu" . $_POST["delete"];

        header("Location: klientai.php");
        exit();
    }
}
//redaguoti klientus

function updateClient() {
    $klientai=readJson("klientai.json");

    if(isset($_POST["updateClient"])){
        $klientas = array(
            "vardas" => $_POST["vardas"],
            "pavarde" => $_POST["pavarde"],
            "amzius" => $_POST["amzius"],
            "miestas" => $_POST["miestas"]
        );
        //kliento numeris
        //$_GET["id"] - sitoje vietoje egzistuoja? nebeegzistuoja
        //jei ne, kaip gauti?
        //ir ar $_POST["id"] egzistuoja
        $klientai[$_POST["id"]] = $klientas;
        
        writeJson("klientai.json", $klientai);
        $_SESSION["zinute"] ="Klientas atnaujintas sėkmingai ". $_POST["id"];

        header("Location: klientai.php");
        //nutraukia viso php failo veikima nuo sitos vietos
        exit();
    }
}

//rikiuoti klientus

//filtruoti klientus

?>