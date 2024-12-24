<?php

    require "../../Assets/Functions/functions.php" ;

    $id = $_GET["idProduct"] ;

    if (hapus($id) > 0 ) {
        echo "
         <script>
                alert('data berhasil di hapus!') ;
                document.location.href = 'list_product.php';
            </script>" ;
    } else {
        echo"
            <script>
                alert('data gagal di hapus!') ;
                document.location.href = 'list_product.php';
            </script>" ;
    } ;

?>