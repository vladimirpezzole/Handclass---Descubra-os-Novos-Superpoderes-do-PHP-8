<?php
  declare(strict_types=1); //

  // MOSTRAR ERROS
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //

  // **** PHP 7.2 ****
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

  // **** PHP 7.3 ****
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

  // **** PHP 7.4 ****
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

  // **** PHP 8.0 ****
    echo "<hr><h2>PHP 8.0</h2>";
     echo "<h4>JIT</h4>";
     echo "<code>
      /*
      <br>* JIT: Compilação Just-In-Time: 0 JIT compila e armazena em cache as instruções nativas do PHP
      <br>* PS.1 Para Web não faz tanta diferença, o impacto é maior quanto uso de alto processamento *PS.2 Evite usar OPCACHE e JIT em localhost, o cache vai atrapalhar
      <br>*
      <br>* Enabling JIT in php.ini
      <br>* opcache.enable=1
      <br>*  opcache.jit_buffer_size=100M
      <br>*/</code><br><br>";

     echo "<h4>CONSTRUCTOR PROPERTY PROMOTION</h4>";

     class CarA
     {
      public string $model;
      public int $year;

      public function __construct(string $model, int $year)
      {
        // Corpo do construtor
        $this->model = $model;
        $this->year = $year;
      }
      // Corpo da Classe
     }

     $carrA = new CarA("Tiguan", 2021);
     var_dump($carrA);

     class CarB
     {
      public function __construct(
        public string $model,
        public int $year
      )
      {
        // Corpo do construtor
      }
      // Corpo da Classe
     }

     $carrB = new CarB("Amarok", 2021);
     var_dump($carrB);

     echo "<h4>NAMED PARAMS</h4>";
     class CarC
     {
      public function __construct(
        public string $model,
        public string $brand = "VW",
        public ?int $year = null
      )
      {
        // Corpo do construtor
      }
      // Corpo da Classe
     } 

     $carrC = new CarC("Golf", year:2022);
     var_dump($carrC);

     function myCar(
      string $model,
      string $brand = "VW",
      ?int $year = null
      ): array{
        return compact("model", "brand", "year");
      }

      var_dump(myCar("Taos", year: 2023));

  // **** PHP 8.1 ****
    echo "<hr><h2>PHP 8.1</h2>";
    echo "<h4>ENUMS</h4>";

    class OrderTest
    {
      private int $id;
      private int|float $amount;
      private int $status;

      public function createOrder(int $id, float|int $amount, int $status): self
      {
        $this->id = $id;
        $this->amount = $amount;
        $this->status = $status;
        return $this;
      }
    }

    $orderTeste = new OrderTest();
    $orderTeste->createOrder(22, 105.50, 1);
    var_dump($orderTeste);

    enum PaymentStatus: int
    {
      case approved = 1;
      case billet_printed = 2;
      case cancelled = 3;
      case chargeback = 4;
      case complete = 5;

      public function isPay(): bool
      {
        return match($this){
          PaymentStatus::approved,
          PaymentStatus::complete => true,
          default => false
        };
      }
    }

    class Order
    {
      public function __construct(
        private readonly int $id,
        private int|float $amount,
        private PaymentStatus $status
      )
      {
      }

      public function getStatus(): PaymentStatus
      {
        return $this->status;
      }
    }

    $order = new Order( 23, 299.50, PaymentStatus::complete);
    var_dump(
      $order,
      $order->getStatus()->isPay(),
      [
        PaymentStatus::cases(),
        PaymentStatus::from(2),
        PaymentStatus::from(3)->name,
        PaymentStatus::tryFrom(6),
        PaymentStatus::approved->value,

      ]
    );

  // **** PHP 8.2 ****
    echo "<hr><h2>PHP 8.2</h2>";
    echo "<h4>TRAIT CONSTANT</h4>";

    const DB_HOST = "localhost";
    const DB_NAME = "fsphp";

    var_dump(
       get_defined_constants(true)['user']
    );
    
    class ObConstants
    {
      public function __construct(
        private string $host = DB_HOST,
        private string $name = DB_NAME,
      ){
      }
    }

    var_dump(new ObConstants());

    trait ObConfig
    {
      protected const HOST = "localhost";
      protected const NAME = "fsphp";
      protected const USER = "root";
      protected const PASS = "handclassphp8";
    }

    class Connect
    {
      use ObConfig;

      public function __construct()
      {
        var_dump(
          [
            self::HOST,
            self::NAME,
            self::USER,
            self::PASS
          ]
          );
      }
    }

    var_dump(new Connect);

    echo "<h4>(!) DEPRECATIONS</h4>";
    echo "<h5>DYNAMIC PROPERTIES</h5>";

    #[AllowDynamicProperties]
    class House
    {
      public string $addr;
    }

    $house = new House();
    $house->city = "Fpolis";
    $house->addr = "Rua X, 255, Fpolis";
    $house->addrs = "Rua X, 255, Fpolis";

    var_dump($house);

    echo $house->addr;

    echo "<br><br><h5>UTF& ENCODING & DECODING</h5>";

    $string = 'Crase não é acento, é um sinal que indica a fusão do artigo "a" com a preposição "a".';
    $encode = mb_convert_encoding($string, "UTF-8", "ISO-8859-1" );
    $decode = mb_convert_encoding($string, "ISO-8859-1", "UTF-8");

    // var_dump(
    //   [
    //     $string,
    //     utf8_encode($string),
    //     utf8_decode($string),
    //     $encode = mb_convert_encoding($string, "UTF-8", "ISO-8859-1" ),
    //     $decode = mb_convert_encoding($string, "ISO-8859-1", "UTF-8"),
    //     utf8_decode($encode),
    //     utf8_encode($decode),
    //   ]
    //   );

      var_dump(
        [
          $encode,
          $decode,
          mb_convert_encoding($encode, "ISO-8859-1", "UTF-8"),
          mb_convert_encoding($decode, "UTF-8", "ISO-8859-1" ),
        ]
        );







    echo "<hr><div style='margin-bottom: 500px;'></div>";
