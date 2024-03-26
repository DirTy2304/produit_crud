<?php
require_once(realpath(__DIR__ . '/../../part/head.php'));
require_once(realpath(__DIR__ . '/../../part/header.php'));
?>
<div class="container">
    <h1 class="text-center my-4">Resultat</h1>
    <div class="card">
        <div class="card-body">
            <?php
            if (isset($_POST['type'])) :
                $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                switch ($_POST['type']):
                    case 'ajouter':
                        $stmt = $db->prepare("INSERT INTO produit(nom,prix,quantite) VALUES (:nom,:prix,:quantite)");
                        $stmt->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
                        $stmt->bindValue(":prix", $_POST['prix']);
                        $stmt->bindValue(":quantite", $_POST['quantite'], PDO::PARAM_INT);
                        $stmt->execute();
                        echo "<i class='fa-solid fa-check'></i> Le produit à bien été ajouté !";
                        break;
                    case 'modifier':
                        $stmt = $db->prepare("UPDATE produit SET nom=:nom, prix=:prix, quantite=:quantite WHERE id_produit=:id_produit");
                        $stmt->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
                        $stmt->bindValue(":prix", $_POST['prix']);
                        $stmt->bindValue(":quantite", $_POST['quantite'], PDO::PARAM_INT);
                        $stmt->bindValue(":id_produit", $_POST['id'], PDO::PARAM_INT);
                        $stmt->execute();
                        echo "<i class='fa-solid fa-check'></i> Le produit à bien été modifié !";
                        break;
                    case 'supprimer':
                        $db->exec('DELETE FROM produit WHERE id_produit = ' . $_POST['id']);
                        echo "<i class='fa-solid fa-check'></i> Le produit à bien été supprimé !";
                        break;
                    default:
                        echo "Ne correspond à aucune route";
                        break;
                endswitch;
            else :
                echo "Vous ne devriez pas être ici. Oust !";
            endif;
            ?>
        </div>
    </div>
</div>
<?php
require_once(realpath(__DIR__ . '/../../part/footer.php'));
?>