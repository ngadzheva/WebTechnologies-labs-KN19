<?php
    echo 5 + '5a'; // >> WARNING + 10

    $variable = 'asd';
    $b = 6;

    function add($a) {
        global $b;

        static $c = 9;

        echo $a + $b + $c;
    }

    add(8);

    echo "Your mark is $b!"; // interpolation

    $arr = [1, 2, 3, 4]; 

    var_dump($arr);
    print_r($arr);

    echo implode(", ", $arr); // converting array to string

    $str = 'a, b, d';
    $strToArr = explode(', ', $str); // converting string to array, splitting by ,
    var_dump($strToArr);

    setcookie('test', 'cookie'); // setting cookie test with value cookie
    echo $_COOKIE['test'];
?>