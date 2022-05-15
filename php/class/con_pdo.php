<?
class conPDO{
	public function __construct() {
		$this->bdhost = 'localhost';
		$this->bdname = 'hadronti_test';
		$this->bduser = 'hadronti_test';
		$this->bdpass = 'NkBgkoYYB1quQKH';
	}
	private function On(){
		$log = new PDO('mysql:host='.$this->bdhost.';dbname='.$this->bdname,$this->bduser,$this->bdpass);
		return $log;
	}
	private function Off(){
		$log = new PDO('mysql:host='.$this->bdhost.';dbname='.$this->bdname,$this->bduser,$this->bdpass);
		$log=null;
	}
	public function query_complex($query){
		$res = array();
		$query = utf8_decode($query);
		$consulta = $this->On()->query($query);
		if($consulta){
			foreach($consulta as $q){
				$q = array_map('utf8_encode',$q);
				foreach($q as $k => $v){
					if(strlen($k)<=2){
						unset($q[$k]);
					}
				}
				$res[]= $q;
			}
		}
		$this->Off();
		return $res;
	}
	
	public function query_simple($query){
		$query = utf8_decode($query);
		$sql = $this->On()->prepare($query);
		$sql->execute();
		$array = array();
		$res = $sql->fetch(PDO::FETCH_OBJ);
		if(is_object($res)){
			$array = (array)$res;
			$array = array_map('utf8_encode',$array);
			
			foreach($array as $k => $v){
				if(strlen($k)<=2){
					unset($array[$k]);
				}
			}
		}
		$this->Off();
		return $array;
	}
}
?>