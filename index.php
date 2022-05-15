<? 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('HTTP/1.1 200 OK');
date_default_timezone_set ('America/Mexico_City');

require("php/controllers/controller.php"); 

?>