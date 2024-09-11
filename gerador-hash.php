<?php

$senha = "123456";
$senhaCripo = hash('sha256' , $senha);

var_dump($senha);
echo "<br>";
var_dump($senhaCripo);


?>