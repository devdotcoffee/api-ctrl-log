<?php

try{
    $con = new PDO("mysql:dbname=projetologistica;host=localhost;","root","");
}   

catch(PDOException $e){

    echo"Erro no Banco de dados: " .$e ->getMesssage();
}
catch(Exception $e){
    
    echo "Erro Aleatório: " .$e ->getMessage();
}

?>