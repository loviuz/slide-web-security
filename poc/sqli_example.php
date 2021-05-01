<?php


if( !isset($_GET['id'])) {
    echo '
    <form action="" method="GET">
        <input type="text" name="id" placeholder="Cerca un cliente tramite ID...">
        <br>
        <button type="submit">Cerca anagrafica</button>

    </form>';
} else {
    $dblink = mysqli_connect("localhost", "root", "mysql", "osm_master");

    /* If connection fails throw an error */

    if (mysqli_connect_errno()) {

        echo "Could  not connect to database: Error: ".mysqli_connect_error();

        exit();
    }

    $sqlquery = "SELECT * FROM an_anagrafiche WHERE idanagrafica='".$_GET['id']."'";

    if ($result = mysqli_query($dblink, $sqlquery)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "#".$row["idanagrafica"]." - ".$row["ragione_sociale"].", ".$row['citta']."<br />";
        }

        mysqli_free_result($result);
    }

    mysqli_close($dblink);
}