<form action="insertar" method="POST" class="my-4">

    <div class="input-group mb-3">
        <span class="input-group-text" id="titulo">Titulo</span>
        <input name="titulo" type="text" class="form-control" placeholder="Titulo" aria-label="titulo" aria-describedby="titulo">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Descripcion</span>
        <textarea name="descripcion" class="form-control" aria-label="Descripcion"></textarea>
    </div>

    <select name="prioridad" class="form-select mb-3" aria-label="Default select example">
        <option selected>Prioridad</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">3</option>
        <option value="5">3</option>
    </select>

    <button type="submit" class="btn btn-dark">Guardar</button>

</form>