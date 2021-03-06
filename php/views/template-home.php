<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/dbb0562f52.js" crossorigin="anonymous"></script>

        <? require('components/styles.php');?>

        <title>S2 Next</title>
    </head> 
    <body>
        <? require('components/navbar.php');?>
        
        <div class="container">
            <? require('components/listado-items-menu.php'); ?>
        </div>
        
        <? require('components/modal-nuevo-menu.php'); ?>

        <? require('components/toast.php');?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <? require('components/javascript.php');?>
    </body>
</html>