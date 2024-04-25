<?php
class base_donnees
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "blog_info";
    public $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
class blog extends base_donnees
{
    public function inserer_donnees($nom, $email, $mot_de_passe)
    { 
        try { 
            // Vérifier si l'e-mail existe déjà
            if ($this->mail_exist($email)) {
                $Message_erreur = "L'e-mail '$email' existe déjà. Veuillez utiliser un autre e-mail.";
                echo $Message_erreur;
                return;
            }

            // Préparer et exécuter la requête d'insertion
            $requete = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
            $inserer_donnees = $this->connect->prepare($requete);
            $inserer_donnees->execute([$nom, $email, $mot_de_passe]);

            // Stocker les données dans la session
            $_SESSION['nom'] = $nom;
            $_SESSION['email'] = $email;
            $_SESSION['mot_de_passe'] = $mot_de_passe;

            // Rediriger vers la page d'affichage
            header("location: ajouter_cmnt.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function mail_exist($email)
    {
        $requete = "SELECT COUNT(*) FROM utilisateurs WHERE email = ?";
        $resultat = $this->connect->prepare($requete);
        $resultat->execute([$email]);
        $count = $resultat->fetchColumn();
        return $count > 0;
    }



    public function ajout_message($email, $cmnt)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cmnt'])) {
            // Assurez-vous de valider et de nettoyer les données du formulaire
            $email = htmlspecialchars($_POST['email']);
            $cmnt = htmlspecialchars($_POST['cmnt']);
          
            // Insérer les données dans la base de données
            try {
                $requete = "INSERT INTO utilisateurs ( cmnt) VALUES ( :cmnt)";
                $db = new base_donnees();
                $stmt = $db->connect->prepare($requete);
    
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':cmnt', $cmnt);
                    
                $stmt->execute();
                
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
    
}





?>


