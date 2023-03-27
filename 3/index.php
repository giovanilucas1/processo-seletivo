<?php

// Recebe o vetor de faturamento diário em formato JSON
$json_string = file_get_contents('dados.json');
$dados = json_decode($json_string, true);

$faturamento_diario = array_column($dados, 'valor');

// Remove os dias sem faturamento do cálculo da média
$faturamento_diario_sem_zeros = array_filter($faturamento_diario, function($valor) {
    return $valor != 0;
});

$media_mensal = array_sum($faturamento_diario_sem_zeros) / count($faturamento_diario_sem_zeros);

$menor_valor = min($faturamento_diario);
$maior_valor = max($faturamento_diario);

$dias_acima_da_media = count(array_filter($faturamento_diario, function($valor) use ($media_mensal) {
    return $valor > $media_mensal;
}));

echo "Menor valor de faturamento: " . $menor_valor . "<br>";
echo "Maior valor de faturamento: " . $maior_valor . "<br>";
echo "Número de dias com faturamento acima da média: " . $dias_acima_da_media . "<br>";

?>
