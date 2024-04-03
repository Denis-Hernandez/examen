<?php

require_once 'conexion.php';

function insert_examen($cod_examen,$titulo_examen,$cantidad_de_preguntas){
    $sql = "INSERT INTO examen (cod_examen, texto_examen, cant_preguntas) VALUES ('$cod_examen', '$titulo_examen', $cantidad_de_preguntas)";
    return insertar_sql($sql);
}

function insert_pregunta($id_examen,$texto_pregunta){
    $sql = "INSERT INTO pregunta (id_examen, texto_pregunta) VALUES ($id_examen, '$texto_pregunta')";
    return insertar_sql($sql);
}

function insert_respuesta($id_pregunta,$texto_respuesta,$correcto){
    $sql = "INSERT INTO respuesta (id_pregunta, texto_respuesta,correcto) VALUES ($id_pregunta, '$texto_respuesta',$correcto)";
    return insertar_sql($sql);
}

function find_examen($id_examen){
    $sql = "SELECT * FROM examen WHERE id_examen = $id_examen";
}

function find_pregunta($id_pregunta){
    $sql = "SELECT * FROM pregunta WHERE id_pregunta = $id_pregunta";
}

function find_respuesta($id_respuesta){
    $sql = "SELECT * FROM respuesta WHERE id_respuesta = $id_respuesta";
}
?>