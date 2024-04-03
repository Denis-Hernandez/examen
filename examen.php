<?php
require_once 'Metodos/crud.php';
//echo $_GET["examen"];

if(!find_examen_by_cod($_GET["examen"])){
    header("Location: index.php");
}else{
    ?>
    <section class="section_crear_preguntas">
        <div>
        <?php
        $preguntas=find_preguntas($_GET["examen"]);
        ?>
        <script>
            document.getElementsByClassName("header__title")[0].innerHTML="<?php echo $preguntas[0]["texto_examen"];?>";
        </script>
        <?php
        $pregunta_actual=-1;
        foreach ($preguntas as $respuesta) {
            if($pregunta_actual!=$respuesta["id_pregunta"]){
                ?>
                </div>
                <div class='border border-4 p-5 bg-light'>
                <label><?php echo $respuesta["texto_pregunta"];?></label>
                </div>
                <div class='p-5 bg-light' style="display: flex">
                <?php
                $pregunta_actual = $respuesta["id_pregunta"];
            }
            ?>
            <div class='p-5 bg-light'>
            <label>
            <input type="checkbox" name="check<?php echo $i;?>" onclick="onlyOne(this,'check<?php echo $i;?>')">
                <?php echo $respuesta["texto_respuesta"];?>
            </label>
            </div>
            <?php
        }
        ?>
        </div>
    </section>
    <?php
}
?>