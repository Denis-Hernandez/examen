<?php

function insertar_sql($sql){
    $conn = conectar();
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        //echo "New record created successfully. Last inserted ID is: " . $last_id;
        return $last_id;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    mysqli_close($conn);
}

function ejecutar_sql($sql){
    $conn = conectar();
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    mysqli_close($conn);
}

function conectar(){
    $servername = "localhost";
    $database = "examen";
    $username = "usuario_lectura_escritura";
    $password = "C0ntras3#a1_examen";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        echo "error";
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

?>