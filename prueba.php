<?php

$mysqli = new mysqli("172.16.100.28", "user_db_ost", "OST235pass", "ost"); //OST235pass 12345678


/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}



/* Consultas de selección que devuelven un conjunto de resultados */
if ($resultado = $mysqli->query("SELECT * FROM ost_staff LIMIT 10")) {

    if (mysqli_num_rows($resultado) > 0) {
    // Printing results in HTML
    echo "<table>\n";
    while ($line = mysqli_fetch_array($resultado, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
}
    /* liberar el conjunto de resultados */
    $resultado->close();
}

$mysqli->close();

?>