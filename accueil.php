<?php
require_once "inc/header.inc.php";
$r = execute_requete(" SELECT * FROM advert order by id desc  limit 15");

//$content .= "<div class='mt-3 mb-2 bg-info'><h2>Liste des annonces</h2>";
//$content .= "<p>Nombre d'annonces : ". $r->rowCount() ."</p></div>";

$content .= "<table class='table table-bordered table-striped mt-3'>";
$content .= "<tr>";
$nombre_colonne = $r->columnCount();

for( $i = 0; $i < $nombre_colonne; $i++ ){

    $titre = $r->getColumnMeta( $i );
    //debug( $titre );

    $content .= "<th> $titre[name] </th>";
}
$content .= "<th>consulter</th>";
$content .= "<th>reserver</th>";
$content .= "</tr>";

while( $ligne = $r->fetch( PDO::FETCH_ASSOC ) ){
    if (!empty($ligne['reservation_message'])){
        $content .= "<tr class='bg-secondary'>";
    }else{
        $content .= "<tr>";
    }

    //debug( $ligne );

    foreach( $ligne as $indice => $valeur ){
        //debug($indice);
        if (isset($indice) && $indice === 'title'){
            $content .= "<td>". strtoupper($valeur) ."</td>";
        }else{
            $content .= "<td> $valeur </td>";
        }

    }

    $content .= "<td>
                                <a href='annonce.php?action=consulter&id=$ligne[id]' style='text-decoration: none;  color: black'>
                                    Consulter l'annonce
                                </a>
                            </td>";
    if (empty($ligne['reservation_message'])){
        $content .= "<td>
                                <a href='annonce.php?action=reserver&id=$ligne[id]' style='text-decoration: none; color: black;' class='btn bg-primary'>
                                    Reserver
                                </a>
                            </td>";
    }else{
        $content .= "<td>
                                <a href='?action=reserver&id=$ligne[id]' style='text-decoration: none; color: black;' class='invisible'>
                                    Reserver
                                </a>
                            </td>";
    }



    $content .= "</tr>";
}
$content .= "</table>";

?>
<h1 class="text-center">Le Bon Appart</h1>
<main class="container">
    <?= $content; ?>
</main>
<?php
require_once "inc/footer.inc.php";
?>