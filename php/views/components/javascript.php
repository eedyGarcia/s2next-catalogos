<?
if(isset($_COOKIE["mensaje"]) && $method=='GET')
{
    $mensaje = explode('.',$_COOKIE["mensaje"]);

    ?>
        <script>
            const header = document.getElementById('liveToastHeader');
            header.classList.add('bg-<? echo $mensaje[0]; ?>'); 

            const title = document.getElementById('liveToastTitle');
            title.innerHTML = '<? echo $mensaje[0]; ?>';

            const mensaje = document.getElementById('liveToastBody');
            mensaje.innerHTML = '<? echo $mensaje[1]; ?>';

            const toast = new bootstrap.Toast('#liveToast');
            toast.show();
            
            document.cookie = 'mensaje=; expires=Thu, 01 Jan 1970 00:00:00 UTC';
        </script>
    <?
    setcookie ("mensaje",'',time() - 3600);

    unset($_COOKIE['mensaje']);
}
?>