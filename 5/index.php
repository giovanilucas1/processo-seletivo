<?php

$string = "Olá, mundo!";

// Obtém o tamanho da string
$tamanho = strlen($string);

// Cria uma nova string vazia
$novaString = "";

// Percorre a string original de trás para frente
for ($i = $tamanho - 1; $i >= 0; $i--) {
  // Adiciona cada caractere na nova string
  $novaString .= $string[$i];
}

echo $novaString; // Exibe a nova string invertida
