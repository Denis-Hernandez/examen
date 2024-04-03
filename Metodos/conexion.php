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

function existe_registro($sql){
    $conn = conectar();

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    mysqli_close($conn);
}

function lista_preguntas($sql){
    $conn = conectar();
    $preguntas = array();
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($preguntas, $row);
        }
    }
    mysqli_close($conn);
    return $preguntas;
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