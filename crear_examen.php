<section class='section_crear_examen'>
    <button onclick="getElementById('formulario').style.display = 'block'" class="btn-lg">Crear Nuevo Examen</button>

    <form id="formulario" style='display: none' class='formulario border border-4 p-5 bg-light' action="./index.php" method="post">
        <small id="emailHelp" class="form-text text-muted">Especifique datos del Examen</small>
        <div class="form-group">
            <label for="nombreExamen">Nombre Examen</label>
            <input type="text" class="form-control" placeholder="Nombre Examen" name="nombreExamen">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cantidad Preguntas</label>
            <select class="form-control" aria-label=".form-select-sm example" name="cantidad">
            <option value="1" selected>1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</section>