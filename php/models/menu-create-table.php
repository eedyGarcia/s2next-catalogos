<? 
class crear_tabla{
    public function __construct()
    {
        $this->sql = new conPDO;
        $this->fecha = date('Y-m-d H:i:s');
    }

    public function tabla_menu_existe()
    {
        $query="SHOW TABLES LIKE 'menu';";
        $tabla = $this->sql->query_simple($query);
        return $tabla;
    }

    public function crear_tabla_menu($poblar=false)
    {
        $tabla_exists = $this->tabla_menu_existe();

        if(!$tabla_exists)
        {

            $query="CREATE TABLE menu (
                id_menu int(11) NOT NULL,
                id_menu_padre int(11) NOT NULL,
                nombre varchar(50),
                descripcion varchar(250),
                fecha datetime NOT NULL,
                actualizacion datetime  NOT NULL);";
            $this->sql->query_simple($query);
            
            $query="ALTER TABLE menu ADD PRIMARY KEY (id_menu);";
            $this->sql->query_simple($query);
            
            $query="ALTER TABLE menu MODIFY id_menu int(11) NOT NULL AUTO_INCREMENT;";
            $this->sql->query_simple($query);

            if($poblar)
            {
                $this->poblar_tabla();

                setcookie("mensaje", "success.La fue creada y poblada exitosamente",
                time()+3600,'/');

                header('Location: ../');
            }
            
            else
            {
                setcookie("mensaje", "success.La fue creada exitosamente",time()+3600,'/');
                header('Location: ../');
            }

        }
        
        else
        {
            setcookie("mensaje", "warning.La tabla ya existía",time()+3600,'/');
            header('Location: ../');
        }

    }

    private function poblar_tabla()
    {
        $datos_iniciales = [];
        $datos_iniciales[]= [
            'nombre'=>'Catálogos',
            'id_menu_padre'=>'0',
            'descripcion'=>'Listado de Catálogos'
        ];

        $datos_iniciales[]= [
            'nombre'=>'Tipos archivos',
            'id_menu_padre'=>'1',
            'descripcion'=>'Catálogo de archivos'
        ];

        $datos_iniciales[]= [
            'nombre'=>'Profesiones',
            'id_menu_padre'=>'1',
            'descripcion'=>'Catálogo de profesiones'];

        $datos_iniciales[]= [
            'nombre'=>'Marcas',
            'id_menu_padre'=>'1'
            ,'descripcion'=>'Listado de marcas de autos'
        ];

        $datos_iniciales[]= [
            'nombre'=>'SEAT',
            'id_menu_padre'=>'4'
            ,'descripcion'=>'Marca Seat'
        ];

        $datos_iniciales[]= [
            'nombre'=>'BMW',
            'id_menu_padre'=>'4'
            ,'descripcion'=>'Marca BMW'
        ];

        $constructor_insert = [];
        foreach($datos_iniciales as $value)
        {
            $constructor_insert[]=" (0,
                                    '{$value['id_menu_padre']}',
                                    '{$value['nombre']}',
                                    '{$value['descripcion']}',
                                    '{$this->fecha}',
                                    '{$this->fecha}')";
        }

        $data = implode(',',$constructor_insert);

        $query = "INSERT INTO menu VALUES {$data};";
        $this->sql->query_simple($query);
    }
}
?>