<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOCALHOST - PHP INFO</title>
    <link rel="shortcut icon" href="../favicon.png">
    <style media="screen">
      .header, header > pre > hr{margin: auto; width: 45%;}
    </style>
  </head>
  <body>

    <header class="header">
      <img src="../favicon.png" alt="LOCALHOST">
        <h2>
          <a href='/'>
            <b>VIRTUAL HOST :: <?php echo "".$_SERVER['SERVER_NAME'] ?></b>
          </a>
        </h2><br/>
      <pre>

<?php
echo "Server Name: &#09&#09"."<b>"      .$_SERVER['SERVER_NAME']        ."</b>"."</br></br>";
echo "Server Adress: &#09&#09"."<b>"      .$_SERVER['SCRIPT_FILENAME']        ."</b>"."</br></br>";
echo "Server ADDR: &#09&#09"."<b>"      .$_SERVER['SERVER_ADDR']        ."</b>"."</br>";
echo "Server Gateway: &#09"."<b>"   .$_SERVER['GATEWAY_INTERFACE']  ."</b>"."</br>";
echo "Server Software: &#09"."<b>"  .$_SERVER['SERVER_SOFTWARE']    ."</b>"."</br>";
echo "Server Protocol: &#09"."<b>"  .$_SERVER['SERVER_PROTOCOL']    ."</b>"."</br>";
echo "Request Method: &#09"."<b>"   .$_SERVER['REQUEST_METHOD']     ."</b>"."</br></br>";
echo "<b>" . __DIR__ . "</b><br><br><hr>";

echo "<a href='#module_xdebug'><center><b>>> XDEBUG PHP</b></center></a><hr>";
echo "<a href='./index.php'><center><b>>> HOME</b></center></a><hr>";
echo "<hr><h2><u>PHP INFO</u></h2></pre>";
echo "</header>";

phpinfo();
?>

  </body>
</html>
