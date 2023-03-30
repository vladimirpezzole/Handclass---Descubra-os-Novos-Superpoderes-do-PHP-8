<?php
    declare(strict_types=1); //

    // MOSTRAR ERROS
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //

    echo "<hr><h2>PHP 7.2</h2>";
    echo "<h4>PARSE STR</h4>";

    $str = "title=Php8power&hosted=Robson&class[a]=update&class[b]=features";
    var_dump($str);

    parse_str($str, $result);
    var_dump($result);

    echo "<h4>NUMBER FORMAT:</h4>";

    $amount = "";
    // $amount = "String";

    // echo number_format($amount, 2, ',', '.');
    echo number_format(floatval($amount), 2, ',', '.');

    echo "<h4>OBJECT TYPEHINT</h4>";

    function user(object $user): object
    {
      return $user;
    }

    $user = new stdClass();
    $user->name = "Robson";
    $user->email = "contato@upinside.com.br";

    var_dump(
      user($user),
      user($user)->name
    );

    echo "<hr><h2>PHP 7.3</h2>";
     echo "<h4>LIST</h4>";

     $addr = ["Rua X", 255, "Floripa", "SC"];
     list($treet, $number, $city, $state, &$zipcode) = $addr;

     //Looping
     $addr[4] = "99.999-99";

     var_dump(
      [
        $treet, 
        $number, 
        $city, 
        $state, 
        $zipcode,
      ]
     );

     echo "<h4>COMPACT</h4>";

     $name = "Robson";
     $email = "robson@upinside.com.br";
     $userCompact = compact("name", "email");

     var_dump($userCompact);

     echo "<h4>SETCOOKIE</h4>";

     $cookieSetup = [
      "expires" => time() + 3600,
      "secure" => true
     ];

     setcookie("CookieA", "HANDCLASS - PHP 7.2", time() + 3600, "", "", true);
     setcookie("CookieB", "HANDCLASS - PHP 7.3", $cookieSetup);

     var_dump($_COOKIE);


    echo "<hr><h2>PHP 7.4</h2>";
    echo "<h4>TYPED PROPERTIES</h4>";

    echo "<<< underscore num separator >>> " . 1_000_000;
    echo "<br><br>"; 

    class UserNot
    {
      public $name;
      public $age;
      public $addr;
    }

    $userNote = new UserNot();
    $userNote->name = "Robson";
    $userNote->age = "idade";
    $userNote->addr = 44;

    var_dump($userNote);

    class Addr
    {
      public string $fullAddr;
    }

    class User
    {
      public string $name;
      public int $age;
      public Addr $addr;
    }

    $user = new User();
    $user->name = "Robson";
    $user->age = 36;
    $user->addr = new Addr();
    $user->addr->fullAddr = "Rua X, 255, Fpolis";

    var_dump($user);

    echo "<h4>ARROW FUNCTIONS</h4>";

    $firstName = function (string $fullName): string {
      return explode(" ", $fullName)[0]."<br>";
    };

    echo $firstName("Robson V, Leite");

    $fullName = "Graziele V. Leite";
    // echo $firstName($fullName);
    $firstName = fn() => explode(" ", $fullName)[0]."<br>";
    echo $firstName();

    $firstName = fn($fullName) => explode(" ", $fullName)[0]."<br>";
    echo $firstName("Pedro V. Leite");
    echo $firstName("Lucas V. Leite");


    echo "<hr><h2>PHP 8.0</h2>";
     echo "<h4>JIT</h4>";


     
     echo "<h4>CONSTRUCTOR PROPERTY PROMOTION</h4>";
     echo "<h4>NAMED PARAMS</h4>";

    echo "<hr><h2>PHP 8.1</h2>";
     echo "<h4>ENUMS</h4>";

    echo "<hr><h2>PHP 8.2</h2>";
     echo "<h4>TRAIT CONSTANT</h4>";
     echo "<h4>(!) DEPRECATIONS</h4>";





    echo "<hr><div style='margin-bottom: 500px;'></div>";
