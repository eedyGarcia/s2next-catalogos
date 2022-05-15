<?
require("{$_SERVER["DOCUMENT_ROOT"]}/php/class/con_pdo.php");
$sql = new conPDO;

require("{$_SERVER["DOCUMENT_ROOT"]}/php/class/shield.php");
$shield = new shield;

require("{$_SERVER["DOCUMENT_ROOT"]}/php/models/menu-create-table.php");
$crear_tabla = new crear_tabla;


$route = $_GET['url'] ?? '/';
$route = explode('?',$route)[0];

$method = $_SERVER['REQUEST_METHOD'];
if(isset($_GET['_METHOD']))
{
	$method = $_GET['_METHOD'];
}

if($method==='GET')
{

	require("{$_SERVER["DOCUMENT_ROOT"]}/php/models/menu-select.php");
	$seleccionar = new seleccionar;

	switch ($route) {

		case '':
			require("php/views/template-home.php");
		break;


		case 'editar-menu':
			if(isset($_GET['id_menu']))
			{
				$id_menu 	= $shield->NoInjection($_GET['id_menu']);
				$menu = $seleccionar->menu($id_menu);
				require("php/views/template-editar-menu.php");
			}

			else
			{
				header('Location: ../../');
			}
		break;


		case 'lista-filtrada':
			
			if(isset($_GET['id_menu_padre']))
			{
				$id_menu_padre 	= $shield->NoInjection($_GET['id_menu_padre']);
				require("php/views/template-lista-filtrada.php");
			}

			else
			{
				header('Location: ../');
			}

		break;
		

		default;
			require("php/views/template-home.php");
		break;

	}
}



if($method==='POST')
{	

	if(isset($_POST['create_table']))
	{
		if(isset($_POST['populate_table']))
		{
			$crear_tabla->crear_tabla_menu(1);
		}
		
		else
		{
			$crear_tabla->crear_tabla_menu();
		}
	}
	
	else
	{
		require("php/models/menu-insert.php");
		$insertar = new insertar;

		$id_menu_padre 	= $shield->NoInjection($_POST['id_menu_padre']);
		$nombre 		= $shield->NoInjection($_POST['nombre']);
		$descripcion 	= $shield->NoInjection($_POST['descripcion']);
		$insertar->registro($id_menu_padre,$nombre,$descripcion);
	}
}

else if($method==='PUT')
{
	require("php/models/menu-update.php");
	$actualizar = new actualizar;

	$id_menu 	= $shield->NoInjection($_GET['id_menu']);
	$nombre 	= $shield->NoInjection($_GET['nombre']);
	$descripcion 	= $shield->NoInjection($_GET['descripcion']);
	$id_menu_padre 	= $shield->NoInjection($_GET['id_menu_padre']);
	$actualizar->registro($id_menu,$id_menu_padre,$nombre,$descripcion);
}

else if($method==='DELETE')
{

	require("php/models/menu-delete.php");
	$eliminar = new eliminar;

	if(isset($_GET['delete_table']))
	{
		$eliminar->borrar_tabla();
	}
	
	else
	{
		$id_menu 	= $shield->NoInjection($_GET['id_menu']);
		$eliminar->registro($id_menu);
	}
	
}

else
{
	http_response_code(405);
}
?>