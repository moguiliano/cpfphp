<?php

//require_once '../coinpourphone/admin/database.php'; //je require la page ou se trouve ma connection de la base de données
require_once($_SERVER['DOCUMENT_ROOT'] . '/coinpourphone/admin/database.php');
class articles
{
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /** 
     * Retoune la liste de tous les articles
     */

    public function selectAll(string $table)
    {
        $statement = $this->db->query("SELECT * from {$table}"); //je selectionne toutes les marques
        $marques = $statement->fetchAll(); //je stocke toutes les lignes de la table marques dans une variable marques
        return $marques;
    }
    public function selectAllByColonne(string $table, string $colonne)
    {

        $stm = $this->db->query("SELECT {$colonne} from {$table}");
        $item = $stm->fetchAll();
        return $item;
    }

    /**
     * recupere un article grace a l'id
     */
    public function selectById(string $table, string $id_sup, int $id)
    {
        $statement = $this->db->prepare("SELECT * from {$table} WHERE {$id_sup} = ?");
        $statement->execute(array($id));
        $item = $statement->fetchAll();
        return $item;
    }

    public function Idaleatoir($table)
    {
        $nombresLignes = $this->db->query("SELECT COUNT(*) FROM {$table}");

        $results = $nombresLignes->fetchAll();
        foreach ($results as $result) {

            $idAleatoirTable = rand(0, $result['COUNT(*)']);
        }


        return $idAleatoirTable;
    }
    public function deleteArticle($id)
    {
        $statement = $this->db->prepare('DELETE from articles WHERE id=?');
        $statement->execute(array($id));
    }
    public function xmlPostValue(string $requete)
    {

        if (isset($_POST['valeur']) && $_POST['valeur'] !== "") //ok fonctionnel 
        { //pour detruire le cookie existant des qu'il y un nouveau post
            setcookie('valeur', ($_POST['valeur']));
            //var_dump($_COOKIE['valeur']);
            $marque = ($_POST['valeur']);
            //echo ($marque); " ceci est un echo de marque ligne 16";
            if ($marque != null) {
                $statement = $this->db->prepare(
                    $requete
                );
                $statement->execute(array($marque));
                $tab = array();

                while ($item = $statement->fetch()) {
                    array_push($tab, ($item));
                }
                //echo json_encode($tab);
            }
            return $tab;
        };
    }
};
class panier
{
    public function __construct()
    {
        if (empty($_SESSION['panier'])) {
            session_start();
        }
    }
}
