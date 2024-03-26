<?php
require_once(realpath(__DIR__ . '/../../part/head.php'));
require_once(realpath(__DIR__ . '/../../part/header.php'));

if (isset($_GET['id'])) {
    if ($_GET['id'] === "new") {
    } else {
        $id_u =  $_GET['id'];
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $stmt = $db->prepare("SELECT id_utilisateur, email, admin FROM utilisateur WHERE id_utilisateur = ?");
        $stmt->execute([$id_u]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
<div class="container">
    <h1 class="text-center my-4">
        <?php if (isset($id_u)) { ?>
            Modifier l'utilisateur : <?= $utilisateur['email']; ?>
        <?php } else { ?>
            Ajouter un utilisateur
        <?php } ?>
    </h1>
    <form action="<?= SITE_URL; ?>/pages/utilisateur/resultat.php" method="POST">
        <div class="card">
            <div class="card-header">
                Informations du utilisateur
            </div>
            <div class="card-body">
                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $utilisateur['email'] ?? ""; ?>" required>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-2">
                        <label for="password" class="col-form-label">Mot de Passe</label>
                    </div>
                    <div class="col-10">
                        <input type="password" class="form-control" id="password" name="password" <?= !isset($utilisateur['password']) ? "required" : ""; ?>>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-2">
                        <label for="quantite" class="col-form-label">Admin ?</label>
                    </div>
                    <div class="col-10">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="admin" id="radioAdminOui" value="1"  <?= (isset($utilisateur['admin']) && $utilisateur['admin'] == 1) ? "checked" : ""; ?> required>
                            <label class="form-check-label" for="radioAdminOui">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="admin" id="radioAdminNon" value="0" <?= (isset($utilisateur['admin']) && $utilisateur['admin'] == 0) ? "checked" : ""; ?>>
                            <label class="form-check-label" for="radioAdminNon">Non</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <?php if (isset($id_u)) { ?>
                    <input type="hidden" name="id" value="<?= $id_u; ?>">
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
