<?php
$connexion=mysqli_connect(
    'localhost',
    'root', 
    '',
    'fixpoint'
);

if (isset($connexion)){
    echo '
        <script type="text/JavaScript">
            console.log("DB is connected");
        </script>
        ';
}

?>