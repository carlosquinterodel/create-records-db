<?

    $nombre = $_REQUEST("nombre");
    $apellido = $_REQUEST("apellido");
    $sexo = $_REQUEST("sexo");
    $email = $_REQUEST("email");
    $telefono = $_REQUEST("telefono");
    $edad = $_REQUEST("edad");
    $tipo = $_REQUEST("tipo");

    $host = "localhost";
    $dbname = "lunatic";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname:$dbname;", $username, $password);

    //  Se crea la persona
    $sql = "INSERT INTO persona (nombres, apellidos, sexo_id, email, telefono, edad) VALUES ($nombre, $apellido, $sexo, $email, $telefono , $edad, $tipo)";

    $q = $cnx->prepare($sql);

    $result = $q->execute();

    //Se crea el cliente
    $id_person =  "SELECT id from person ORDER BY id DESC LIMIT 1";

    $sql = "INSERT INTO clientes (id_persona, saldo, id_tipo) VALUES ($id_person, 0, $tipo)";

    $q = $cnx->prepare($sql);

    $result = $q->execute();

    header("Location: ".$_SERVER['HTTP_REFERER']);
  
?>