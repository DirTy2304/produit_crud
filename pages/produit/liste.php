<?php
require_once(realpath(__DIR__ . '/../../part/head.php'));
require_once(realpath(__DIR__ . '/../../part/header.php'));

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sql = "SELECT * from produit ORDER BY id_produit DESC";
$rq = $db->query($sql);
$resultat = $rq->fetchAll();
?>
<div class="container">
    <h1 class="text-center my-4">Mes produits</h1>
    <table class="table table-sm table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            foreach ($resultat as $produit) :
            ?>
                <tr>
                    <td><?= $produit['id_produit']; ?></td>
                    <td><?= $produit['nom']; ?></td>
                    <td><?= $produit['prix']; ?></td>
                    <td><?= $produit['quantite']; ?></td>
                    <td>
                        <a href="<?= SITE_URL; ?>/pages/produit/edit.php?id=<?= $produit['id_produit']; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="<?= SITE_URL;?>/pages/produit/resultat.php">
                            <input type="hidden" name="id" value="<?= $produit['id_produit'];?>">
                            <button type="submit" name="type" value="supprimer">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    
</div>
<?php
require_once(realpath(__DIR__ . '/../../part/footer.php'));
