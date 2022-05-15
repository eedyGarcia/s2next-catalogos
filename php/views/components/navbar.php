<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Evaluación - <span class="text-primary">S2Next</span></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://github.com/eedyGarcia/s2next-catalogos" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">

                <?
                    $distribucion_menu = $seleccionar->todo_distribucion_menu();
                    $ids_padres = $seleccionar->ids_padres();

                    if($distribucion_menu){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Todo</a>
                    </li>
                <?
                    }

                    foreach($distribucion_menu as $padre => $grupo)
                    { 
                ?>

                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" 
                        href="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        <? echo $padre; ?>
                    </a> 
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <?      foreach($grupo as $k2 => $item)
                        {

                            if(in_array($item['id_menu'],$ids_padres))
                            {
                ?>
                            <li>
                                <a 
                                class="dropdown-item" 
                                href="../lista-filtrada/?id_menu_padre=<? echo $item['id_menu']; ?>"
                                >
                                    <i class="fas fa-list text-xs"></i> <b><? echo $item['nombre']; ?></b>
                                </a>
                            </li>
                        
                <?
                            }

                            else
                            {
                ?>
                            <li>
                                <a 
                                class="dropdown-item" 
                                href="../editar-menu/?id_menu=<? echo $item['id_menu']; ?>"
                                >
                                    <i class="fas fa-pencil-alt text-xs"></i> <? echo $item['nombre']; ?>
                                </a>
                            </li>
                <?
                            }
                        } 
                ?>

                    </ul>   
                </li> 

                <?  } ?>



            </ul>



            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
            <?  
                    $tabla_existe = $crear_tabla->tabla_menu_existe();
                    if($tabla_existe){
            ?>      
                    <form class="form-inline" action="../" method="DELETE">
                        <button class="btn btn-sm btn-outline-dark">Eliminar tabla</button>
                        <input type="hidden" name="_METHOD" value="DELETE">
                        <input type="hidden" name="delete_table" value="true">
                    </form>
            <?
                    }
                    else
                    {
            ?>
                    <form class="form-inline" action="../" method="POST">
                        <button class="btn btn-sm btn-outline-dark">Crear tabla</button>
                        <input type="hidden" name="_METHOD" value="POST">
                        <input type="hidden" name="create_table" value="1">
                    </form>

                    <form class="form-inline" action="../" method="POST">
                        <button class="btn btn-sm btn-outline-dark">Crear y poblar tabla</button>
                        <input type="hidden" name="_METHOD" value="POST">
                        <input type="hidden" name="create_table" value="1">
                        <input type="hidden" name="populate_table" value="1">
                    </form>
            <?
                    }
            ?>
                </li>
            </ul>


        </div>
    </div>
</nav>