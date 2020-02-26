
<?php

$arreglo = $_POST['mitexto'];
print_r($arreglo);
echo '</br>';
$count = array_sum(array_map("count", $arreglo));
$count2 = $count / 4;
//echo 'La longitud es: ' . $count . '</br>';
//echo 'La longitud2 es: ' . $count2 . '</br>';
$j = 0;
for ($i = 0; $i < $count2; $i++) {
    $codigo = $_POST['mitexto'][$j];
    $j = $j+1;
    $material = $_POST['mitexto'][$j];
    $j = $j+1;
    $cantidad = $_POST['mitexto'][$j];
    $j = $j+1;
    $precio = $_POST['mitexto'][$j];
    $j = $j+1;
    echo 'El codigo es: ' . $codigo . '</br>';
    echo 'El material es: ' . $material . '</br>';
    echo 'La cantidad es:' . $cantidad . '</br>';
    echo 'El precio es: ' . $precio . '</br>';
    echo '---------------------------'.'</br>';
}
?>