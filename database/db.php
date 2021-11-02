<?php
session_start();
$connection = mysqli_connect(
    'localhost',
    'root', 
    '',
    'fixpoint'
);

if (isset($connection)){
    echo '
        <script type="text/JavaScript">
            console.log("DB is connected");
        </script>
        ';
}

?>