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
                        $stmt = $db->prepare("INSERT INTO utilisateur(email,password,admin) VALUES (:email,:password,:admin)");
                        $stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                        $stmt->bindValue(":password", password_hash($_POST['password'], PASSWORD_DEFAULT));
                        $stmt->bindValue(":admin", $_POST['admin'], PDO::PARAM_INT);
                        $stmt->execute();
                        echo "<i class='fa-solid fa-check'></i> L'utilisateur à bien été ajouté !";
                        break;
                    case 'modifier':
                        if (isset($_POST['password'])) {
                            $stmt = $db->prepare("UPDATE utilisateur SET email=:email, password=:password, admin=:admin WHERE id_utilisateur=:id_utilisateur");
                            $stmt->bindValue(":password", password_hash($_POST['password'], PASSWORD_DEFAULT));
                        } else {
                            $stmt = $db->prepare("UPDATE utilisateur SET email=:email, admin=:admin WHERE id_utilisateur=:id_utilisateur");
                        }
                        $stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
                        $stmt->bindValue(":admin", $_POST['admin'], PDO::PARAM_INT);
                        $stmt->bindValue(":id_utilisateur", $_POST['id'], PDO::PARAM_INT);
                        $stmt->execute();
                        echo "<i class='fa-solid fa-check'></i> L'utilisateur à bien été modifié !";
                        break;
                    case 'supprimer':
                        $db->exec('DELETE FROM utilisateur WHERE id_utilisateur = ' . $_POST['id']);
                        echo "<i class='fa-solid fa-check'></i> L'utilisateur à bien été supprimé !";
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