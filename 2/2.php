<?php

$num = 8; // número informado
$fib = array(0, 1);

while ($fib[count($fib) - 1] < $num) {
    $new_num = $fib[count($fib) - 1] + $fib[count($fib) - 2];
    array_push($fib, $new_num);
}

if (in_array($num, $fib)) {
    echo "O número " . $num . " pertence à sequência de Fibonacci";
} else {
    echo "O número " . $num . " não pertence à sequência de Fibonacci";
}

?>
