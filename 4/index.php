<?php

// Carrega o arquivo XML
$xml = simplexml_load_file("dados.xml");

// Inicializa as variáveis de menor e maior valor de faturamento
$menor_valor = PHP_FLOAT_MAX;
$maior_valor = 0;

// Inicializa as variáveis para calcular a média mensal
$soma_valores = 0;
$numero_dias = 0;

// Loop para percorrer os valores de faturamento diário
foreach ($xml->row as $row) {
    // Obtém o valor de faturamento do dia
    $valor = (float) $row->valor;

    // Atualiza o menor e o maior valor de faturamento
    if ($valor < $menor_valor) {
        $menor_valor = $valor;
    }
    if ($valor > $maior_valor) {
        $maior_valor = $valor;
    }

    // Soma o valor de faturamento para calcular a média mensal
    $soma_valores += $valor;
    $numero_dias++;
}

// Calcula a média mensal
$media_mensal = $soma_valores / $numero_dias;

// Inicializa a variável para contar os dias com faturamento acima da média mensal
$dias_acima_media = 0;

// Loop para percorrer os valores de faturamento diário novamente
foreach ($xml->row as $row) {
    // Obtém o valor de faturamento do dia
    $valor = (float) $row->valor;

    // Verifica se o valor de faturamento é superior à média mensal
    if ($valor > $media_mensal) {
        $dias_acima_media++;
    }
}

// Exibe os resultados
echo "Menor valor de faturamento: R$ " . number_format($menor_valor, 2, ',', '.') . "<br>";
echo "Maior valor de faturamento: R$ " . number_format($maior_valor, 2, ',', '.') . "<br>";
echo "Número de dias com faturamento acima da média mensal: " . $dias_acima_media . "<br>";

?>
