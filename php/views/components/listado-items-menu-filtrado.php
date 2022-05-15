<div class="row mt-5">
    <div class="col-md-12">
        <h4>Listado de un catálogo</h4>
    </div>
</div>
<div class="row bg-info py-3">
    <div class="col-md-6 text-white">
        Menú
    </div>
    <div class="col-md-6 text-end">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Nuevo
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Menú Padre</th>
                    <th>Descripción</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>

            
                <?
                    $items = $seleccionar->por_menu_padre($id_menu_padre);
                    foreach($items as $data)
                    {
                ?>
                        <tr>
                            
                            <td><? echo $data['id_menu']; ?></td>
                            <td><? echo $data['nombre']; ?></td>
                            <td><? echo $data['padre']; ?></td>
                            <td><? echo $data['descripcion']; ?></td>
                            <td class="text-end">
                                <a href="../editar-menu/?id_menu=<? echo $data['id_menu']; ?>" class="btn btn-sm btn-outline-dark">Editar</a>

                                <form class="form-inline" action="../" method="DELETE">
                                    <button class="btn btn-sm btn-outline-dark">Eliminar</button>
                                    <input type="hidden" name="id_menu" value="<? echo $data['id_menu']; ?>">
                                    <input type="hidden" name="_METHOD" value="DELETE">
                                </form>
                            </td>
                        </tr>
                <?
                    }
                ?>


            </tbody>
        </table>
    </div>
</div>