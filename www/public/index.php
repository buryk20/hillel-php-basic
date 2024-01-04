
<?php

    $integerNumber = 10;
    $floatNumber = 10.0;
    $stringValue = "10";
    $booleanValue = true;
    $arrayValue = [1, 2, 3];


    echo "Nonsensitive Comparison: </br>";
    var_dump('$integerNumber == $floatNumber', $integerNumber == $floatNumber);
    echo '</br>';
    var_dump('$stringValue == $integerNumber', $stringValue == $integerNumber);
    echo '</br>';
    var_dump('$booleanValue == $integerNumber', $booleanValue == $integerNumber);
    echo '</br>';
    var_dump('$arrayValue == $integerNumber', $arrayValue == $integerNumber);
    echo '</br>';
    echo '</br>';
    echo '</br>';


    echo "\nSensitive Comparison: </br>";
    var_dump('$integerNumber === $floatNumber', $integerNumber === $floatNumber);
    echo '</br>';
    var_dump('$stringValue === $integerNumber', $stringValue === $integerNumber);
    echo '</br>';
    var_dump('$booleanValue === $integerNumber', $booleanValue === $integerNumber);
    echo '</br>';
    var_dump('$arrayValue === $integerNumber', $arrayValue === $integerNumber);
    echo '</br>';

?>