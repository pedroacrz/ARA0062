<?php
session_start();

if ( ! isset($_SESSION["autenticado"]) ){
    echo "
    <script>
    window.location.replace('');
    </script>
    ";
    
}

?>