<? 
class eliminar{
    public function __construct()
    {
        $this->sql = new conPDO;
    }

    public function registro($id_menu)
    {
        $hijos = $this->verificar_hijos($id_menu);

        if(!$hijos)
        {
            $query="DELETE FROM menu WHERE id_menu='$id_menu';";
            $this->sql->query_simple($query);

            setcookie("mensaje", "success.Se ha eliminado correctamente el item",
            time()+3600,'/');

            header('Location: ./');
        }
        
        else
        {
            setcookie("mensaje", "warning.El item no pudo ser eliminado por que tiene items hijos",
            time()+3600,'/');

            header('Location: ./');
        }
    }



    private function verificar_hijos($id_menu)
    {
        $query="SELECT COUNT(*) AS hijos FROM menu WHERE id_menu_padre='$id_menu';";
        $consulta = $this->sql->query_simple($query);

        if((int)$consulta['hijos']>0)
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }


    public function borrar_tabla()
    {
        $query="DROP TABLE menu;";
        $this->sql->query_simple($query);
        
        setcookie("mensaje", "success.La tabla ha sido eliminada exitosamente",
        time()+3600,'/');
        
        header('Location: ../');
    }
}

?>