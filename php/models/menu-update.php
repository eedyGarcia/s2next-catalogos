<? 
class actualizar{
    public function __construct()
    {
        $this->sql = new conPDO;
        $this->fecha = date('Y-m-d H:i:s');
    }
    
    
    public function registro($id_menu,$id_menu_padre,$nombre,$descripcion)
    {
        $ya_existe = $this->verificar_si_existe_otro($id_menu,$nombre);
        
        if(!$ya_existe)
        {
            $query = "  UPDATE menu SET
                        nombre='$nombre',
                        descripcion='$descripcion',
                        id_menu_padre='$id_menu_padre',
                        actualizacion='{$this->fecha}'
                        WHERE id_menu = $id_menu";
            $this->sql->query_simple($query);

            setcookie("mensaje", "success.El item se ha actualizado exitosamente",
            time()+3600,'/');
            
            header("Location: ../");
            return true;
            
        }

        setcookie("mensaje", "warning.El item no pudo ser actualizado con el nombre <b>{$nombre}</b> por que ya existe otro item con ese nombre",
        time()+3600,'/');

        header("Location: ../");
    }



    private function verificar_si_existe_otro($id_menu,$nombre)
    {
        $query="SELECT COUNT(*) AS similares 
        FROM menu WHERE id_menu != '$id_menu' 
        AND nombre='$nombre';";
        
        $consulta = $this->sql->query_simple($query);

        if((int)$consulta['similares']>0)
        {
            return true;
        }

        else{
            return false;
        }
    }
}
?>