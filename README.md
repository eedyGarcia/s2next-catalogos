# Evaluación técnica S2 Next.

Se requiere realizar un catálogo para el alta de menús de un sistema que contemple las siguientes
características:

#### Creación de un menú (Alta, Edición, Eliminar).

En esta sección debe existir un formulario que permita dar de alta los siguientes datos para un menú:

- Nombre del campo (Opcional)
- Nombre del menú (No opcional)
- Descripción del menú (No opcional)
- Dependencia a otro menú (Opcional)

#### Consulta de menú.
- Generar una pantalla donde se muestre el menu generado (Menus y Submenus)
- Al dar click en el item mostrar el texto ingresado en descripcion en el centro de la pagina.

En esta sección se listarán los menú dados de alta y se podrán realizar las siguientes acciones:
- Editar.
- Eliminar.

#### Nota 1:

I. Para que un menú dependa de otro, el menú principal (padre) esté deberá estar previamente
registrado, de lo contrario el sistema no le permitirá hacer la relación entre menús.

II. Una vez que se hayan creado el menú al dar clic sobre los elementos que este contiene se deberá
mostrar la descripción.

##### Nota 2:
- El desarrollo debe de generarse integrando el modelo MVC
- Desarrollarlo con php puro (No Frameworks)
- Desarrollarlo 100% OOP
- Coneccion a base de datos mediante PDO.

___

El proyecto en ejecución se puede consultar en: [https://test.hadronti-s1.com/](https://test.hadronti-s1.com/)