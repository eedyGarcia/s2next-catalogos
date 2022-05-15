<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="../" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    
                    <div class="col-10 my-2">
                        <label for="id_menu_padre">Menú padre</label>
                        <select name="id_menu_padre" id="id_menu_padre" class="form-control form-control-sm">
                            <option value=""></option>

                            <?
                                $items = $seleccionar->todo();
                                foreach($items as $data)
                                {
                            ?>
                                    <option value="<? echo $data['id_menu']?>"><? echo $data['nombre']?></option>
                            <?
                                }
                            ?>

                        </select>
                    </div>
 
                    <div class="col-10 my-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" maxlength="50">
                    </div>

                    <div class="col-10 my-2">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" maxlength="250"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-primary">Agregar</button>
            </div>
        </div>
    </form>
</div>