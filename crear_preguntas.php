<section class="section_crear_preguntas">
    <script>
        function onlyOne(checkbox,name) {
            var checkboxes = document.getElementsByName(name)
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false
            })
        }
    </script>
    <div class='border border-4 p-5 bg-light'>
        <div class="row">
            <?php
            require_once 'Metodos/crud.php';

            $cod_examen = date("Y").date("m").date("d").date("H").date("i").date("s");
            $nombreExamen=$_POST["nombreExamen"];
            $cantidad=intval($_POST["cantidad"]);

            //echo $cod_examen;

            $idExamen=insert_examen($cod_examen,$nombreExamen,$cantidad);

            for ($i=1; $i <= $cantidad; $i++) {
                ?>
                <div class='border border-4 p-5 bg-light col-sm-4'>
                    <div class="form-group">
                        <label>Pregunta <?php echo $i;?></label>
                        <input type="text" class="form-control" placeholder="Pregunta <?php echo $i;?>" name="pregunta">
                    </div>
                    <div class='border border-4 p-5 bg-light'>
                        <div class="form-group">
                            <label>Respuesta 1</label>
                            <input type="text" class="form-control" placeholder="Respuesta 1" name="respuesta<?php echo $i;?>">
                            <input type="checkbox" name="check<?php echo $i;?>" onclick="onlyOne(this,'check<?php echo $i;?>')">
                        </div>
                        <div class="form-group">
                            <label>Respuesta 2</label>
                            <input type="text" class="form-control" placeholder="Respuesta 2" name="respuesta<?php echo $i;?>">
                            <input type="checkbox" name="check<?php echo $i;?>" onclick="onlyOne(this,'check<?php echo $i;?>')">
                        </div>
                        <div class="form-group">
                            <label>Respuesta 3</label>
                            <input type="text" class="form-control" placeholder="Respuesta 3" name="respuesta<?php echo $i;?>">
                            <input type="checkbox" name="check<?php echo $i;?>" onclick="onlyOne(this,'check<?php echo $i;?>')">
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        
        <button class="btn btn-primary" onClick="insertar()">Guardar</button>

        <form class="formulario border border-4 p-5 bg-light" style='display: none' id="popup">
        <label id="link_test"></label>
        </form>
    </div>
    <script>
        function insertar(){
            preguntas = document.getElementsByName("pregunta");
            check = document.getElementsByName("check");
            var httpc = new XMLHttpRequest();
            var url = "insert_pregunta.php";
            for (let index = 0; index < preguntas.length; index++) {
                //console.log(preguntas[index].value);
                respuesta = document.getElementsByName("respuesta"+(index+1));
                check = document.getElementsByName("check"+(index+1));
                let pregunta = {
                    "idexamen" : "<?php echo $idExamen;?>",
                    "pregunta" : preguntas[index].value,
                    "respuesta1" : respuesta[0].value,
                    "check1": check[0].checked.toString(),
                    "respuesta2" : respuesta[1].value,
                    "check2": check[1].checked.toString(),
                    "respuesta3" : respuesta[2].value,
                    "check3": check[2].checked.toString(),
                };

                //console.log(check[0].checked);

                fetch("insertar_pregunta.php",{
                    "method": "POST",
                    "headers": {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    "body": JSON.stringify(pregunta)
                }).then(function(response){
                    return response.text();
                }).then(function(data){
                    console.log(data);
                });
            }

            popup = document.getElementById("popup");
            popup.style.display = 'block';
            document.getElementById("link_test").innerHTML="http://localhost/examen/examen/<?php echo $cod_examen;?>";
        }
        
    </script>
</section>
