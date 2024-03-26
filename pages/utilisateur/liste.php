<?php
require_once(realpath(__DIR__ . '/../../part/head.php'));
require_once(realpath(__DIR__ . '/../../part/header.php'));

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sql = "SELECT id_utilisateur,email,admin from utilisateur ORDER BY id_utilisateur DESC";
$rq = $db->query($sql);
$resultat = $rq->fetchAll();
?>
<div class="container">
    <h1 class="text-center my-4">Mes utilisateurs</h1>
    <table class="table table-sm table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>email</th>
            <th>admin</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            foreach ($resultat as $utilisateur) :
            ?>
                <tr>
                    <td><?= $utilisateur['id_utilisateur']; ?></td>
                    <td><?= $utilisateur['email']; ?></td>
                    <td><?= $utilisateur['admin']; ?></td>
                    <td>
                        <a href="<?= SITE_URL; ?>/pages/utilisateur/edit.php?id=<?= $utilisateur['id_utilisateur']; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="<?= SITE_URL;?>/pages/utilisateur/resultat.php">
                            <input type="hidden" name="id" value="<?= $utilisateur['id_utilisateur'];?>">
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
