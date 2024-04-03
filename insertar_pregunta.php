<?php 
    require_once 'Metodos/crud.php';
    if(isset($_POST)){
        $data = file_get_contents("php://input");
        $pregunta = json_decode($data, true);
        //echo $pregunta["idexamen"];
        $id_pregunta=insert_pregunta($pregunta["idexamen"],$pregunta["pregunta"]);

        insert_respuesta($id_pregunta,$pregunta["respuesta1"],$pregunta["check1"]);
        insert_respuesta($id_pregunta,$pregunta["respuesta2"],$pregunta["check2"]);
        insert_respuesta($id_pregunta,$pregunta["respuesta3"],$pregunta["check3"]);
        // do whatever we want with the users array.
    }