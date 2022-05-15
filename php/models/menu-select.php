<? 
class seleccionar{
    public function __construct()
    {
        $this->sql = new conPDO;
        $this->fecha = date('Y-m-d H:i:s');
    }
    

    
    public function todo()
    {   
        $query = "SELECT * FROM menu ORDER BY id_menu ASC;";
        $data = $this->sql->query_complex($query);

        $data = $this->agregar_padre($data);

        return $data;
    } 



    public function todo_distribucion_menu()
    {   
        $query = "SELECT * FROM menu ORDER BY id_menu_padre ASC, nombre ASC;";
        $data = $this->sql->query_complex($query);

        $data = $this->agregar_padre($data);
        $data = $this->limpiar_menu_sin_padres($data);

        $padre = '';
        $data_distribucion_menu = [];
        foreach($data as $k => $item){
            
            if($padre!=$item['padre']){
                $padre = $item['padre'];
                $data_distribucion_menu[$padre] = [];
            }

            $data_distribucion_menu[$padre][]=$item;
        }

        return $data_distribucion_menu;
    }



    public function por_menu_padre($id_menu_padre)
    {

        $query = "SELECT * FROM menu WHERE id_menu_padre='$id_menu_padre' 
        ORDER BY id_menu ASC;";
        
        $data = $this->sql->query_complex($query);

        $data = $this->agregar_padre_unico($id_menu_padre, $data);

        return $data;

    }

    
    public function catalogos(){
        
        $query = "SELECT * FROM menu WHERE id_menu_padre=0 ORDER BY id_menu ASC;";
        $data = $this->sql->query_complex($query);

        $data = $this->agregar_padre($data);

        return $data;

    }


    public function menu($id_menu){
        $query = "SELECT * FROM menu WHERE id_menu='$id_menu';";
        $data = $this->sql->query_simple($query);
        
        return $data;
    }


    private function limpiar_menu_sin_padres($data)
    {
        foreach($data as $k => $value)
        {
            if($value['id_menu_padre']==0)
            {
                unset($data[$k]);
            }
            
        }

        return $data;
    }


    private function agregar_padre($data)
    {
        $diccionario = [];
        foreach($data as $k => $value)
        {
            if(!array_key_exists($value['id_menu'],$diccionario))
            {
                $diccionario[$value['id_menu']] = $value['nombre'];   
            }
        }

        foreach($data as $k => $value)
        {
            $data[$k]['padre'] =    ((int)$value['id_menu_padre']>0)
                                    ?@$diccionario[$value['id_menu_padre']]
                                    :'';
        }

        return $data;
    }



    private function agregar_padre_unico($id_menu_padre, $data)
    {
        $menu_padre = $this->menu($id_menu_padre);
        $padre = $menu_padre['nombre'];

        foreach($data as $k => $value)
        {
            $data[$k]['padre'] = $padre;
        }

        return $data;
    }
}
?>