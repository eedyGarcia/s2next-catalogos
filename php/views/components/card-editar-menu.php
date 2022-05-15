<div class="row justify-content-center">
    <div class="col-md-4">
        <form class="card mt-5" action="./" method="PUT">
            <input type="hidden" name="id_menu" value="<? echo $menu['id_menu']; ?>">
            <input type="hidden" name="_METHOD" value="PUT">
            <div class="card-header"> 
                <div class="card-title">Editar item</div>
            </div>
            <div class="card-body">
                <input type="hidden" name="id_menu" value="<? echo $menu['id_menu'];?>">
                <div class="row justify-content-center">
                    <div class="col-10 my-2">
                        <label for="id_menu_padre">Menú padre</label>
                        <select name="id_menu_padre" id="id_menu_padre" class="form-control form-control-sm">
                            <?
                                $sin_padre = true;
                                $items = $seleccionar->todo();
                                foreach($items as $data)
                                {

                                    $selected = '';
                                    if($menu['id_menu_padre']==$data['id_menu'])
                                    {
                                        $selected = 'selected';
                                        $sin_padre = false;
                                    }

                                    if($menu['id_menu']!=$data['id_menu'])
                                    {
                            ?>
                                    <option  
                                        <? echo $selected;?>
                                        value="<? echo $data['id_menu']?>"
                                    >
                                        <? echo $data['nombre']?>
                                    </option>
                            <?
                                    }

                                }

                            ?>
                            <option <? echo ($sin_padre)?'selected':''; ?> value=""></option>
                        </select>
                    </div>

                    <div class="col-10 my-2">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" maxlength="50"  value="<? echo $menu['nombre'];?>">
                    </div>

                    <div class="col-10 my-2">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" maxlength="250"><? echo $menu['descripcion'];?></textarea>
                    </div>

                    <div class="col-10 text-end mt-3">
                        <a href="../" class="btn btn-sm btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>