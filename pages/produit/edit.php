<?php
require_once(realpath(__DIR__ . '/../../part/head.php'));
require_once(realpath(__DIR__ . '/../../part/header.php'));

if (isset($_GET['id'])) {
    if ($_GET['id'] === "new") {
    } else {
        $id_prod =  $_GET['id'];
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $stmt = $db->prepare("SELECT * FROM produit WHERE id_produit = ?");
        $stmt->execute([$id_prod]);
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
<div class="container">
    <h1 class="text-center my-4">
        <?php if (isset($id_prod)) { ?>
            Modifier le produit : <?= $produit['nom']; ?>
        <?php } else { ?>
            Ajouter un produit
        <?php } ?>
    </h1>
    <form action="<?= SITE_URL; ?>/pages/produit/resultat.php" method="POST">
        <div class="card">
            <div class="card-header">
                Informations du produit
            </div>
            <div class="card-body">
                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label for="nom" class="col-form-label">Nom</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= $produit['nom'] ?? ""; ?>" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label for="prix" class="col-form-label">Prix</label>
                    </div>
                    <div class="col-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="prix" name="prix" value="<?= $produit['prix'] ?? ""; ?>" required>
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-2">
                        <label for="quantite" class="col-form-label">Quantité</label>
                    </div>
                    <div class="col-10">
                        <input type="number" min="0" class="form-control" id="quantite" value="<?= $produit['quantite'] ?? ""; ?>" name="quantite" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?php if (isset($id_prod)) { ?>
                    <input type="hidden" name="id" value="<?= $id_prod; ?>">
                    <button type="submit" class="btn btn-primary" name="type" value="modifier">Modifier</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary" name="type" value="ajouter">Ajouter</button>
                <?php } ?>
            </div>
        </div>
    </form>
</div>
<?php
require_once(realpath(__DIR__ . '/../../part/footer.php'));