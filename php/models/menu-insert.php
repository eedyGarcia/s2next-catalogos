<? 
class insertar{
    public function __construct()
    {
        $this->sql = new conPDO;
        $this->fecha = date('Y-m-d H:i:s');
        $this->crear_tabla = new crear_tabla;
    }
    

    
    public function registro($id_menu_padre,$nombre,$descripcion)
    {
        $tabla_existe = $this->crear_tabla->tabla_menu_existe();

        if($tabla_existe){

            $ya_existe = $this->verificar_si_existe_otro($nombre);
        
            if(!$ya_existe)
            {
                $query = "INSERT INTO menu VALUES (
                    0,
                    '$id_menu_padre',
                    '$nombre',
                    '$descripcion',
                    '{$this->fecha}',
                    '{$this->fecha}'
                    );";

                $this->sql->query_simple($query);

                setcookie("mensaje", "success.Se ha insertado correctamente el menú",
                time()+3600,'/');

                header('Location: ./');
            }

            else
            {
                setcookie("mensaje", "warning.El menú no pudo ser insertado por que ya existe otro con el mismo nombre",time()+3600,'/');
                header('Location: ./');
            }

        }

        else
        {
            $this->crear_tabla->crear_tabla_menu();
            $this->registro($id_menu_padre,$nombre,$descripcion);

            setcookie("mensaje", "success.Se ha creado la tabla y se ha insertado correctamente el menú",
            time()+3600,'/');

            header('Location: ./');
        }
    }



    private function verificar_si_existe_otro($nombre)
    {
        $query="SELECT COUNT(*) AS similares FROM menu WHERE nombre='$nombre';";
        $consulta = $this->sql->query_simple($query);

        if((int)$consulta['similares']>0)
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}
?>