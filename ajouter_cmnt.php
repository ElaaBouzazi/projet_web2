<?php
include('connection_basedonnee.php');
session_start();
$messages = array();
// Réinitialiser les champs après la soumission du message
$email = $cmnt = $nom = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = htmlspecialchars($_POST['email']);
  $cmnt = htmlspecialchars($_POST['cmnt']);
  $nom = htmlspecialchars($_POST['nom']);

  try {
    
    $requete = "INSERT INTO utilisateurs (email, cmnt, nom) VALUES (:email, :cmnt, :nom)";
    $db = new base_donnees();
    $stmt = $db->connect->prepare($requete);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cmnt', $cmnt);
    $stmt->bindParam(':nom', $nom);

    $stmt->execute();

    header("Location: ajouter_cmnt.php");
    exit();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}

try {
  $requete = "SELECT * FROM utilisateurs ORDER BY id DESC";
  $db = new base_donnees();
  $stmt = $db->connect->prepare($requete);
  $stmt->execute();
  $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['cmnt'] = $_POST['cmnt'];
  $_SESSION['nom'] = $_POST['nom'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum de Discussion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor\twbs\bootstrap\dist\css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   
    <style>
        /* Styles personnalisés */
        .card-header.bg-custom {
            background-color: #5f8356;
        }
        .card-body.bg-custom {
            background-color: #faf0e6;
        }
        .message.bg-custom {
            background-color: #adc0a7;
        }
        /* Taille du texte personnalisée */
        .message p.nom {
            font-size: 14px; /* Taille de police plus petite pour le nom */
        }
        .message p.commentaire {
            font-size: 18px; /* Taille de police plus grande pour le commentaire */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="acceuiltry.php">C-Blog</a>
            <!-- Bouton pour ouvrir le menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card bg-light">
                    <div class="card-header bg-custom text-white text-center">
                        <h2>Forum de Discussion</h2>
                    </div>
                    <div class="card-body bg-custom">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email :</label>
                                <input type="email" id="email" name="email" class="form-control" required >
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control" required >
                            </div>
                            <div class="mb-3">
                                <label for="commentaire" class="form-label">Commentaire :</label>
                                <textarea id="commentaire" name="cmnt" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" name="poster" class="btn btn-success">Poster</button>
                        </form>

                        <hr>

                        <h2>Messages précédents :</h2>
                        <div class="messages">
                            <?php foreach ($messages as $message): ?>
                                <div class="message bg-custom text-white mb-3 p-3">
                                    <p class="nom"><strong>Nom:</strong> <?php echo $message['nom']; ?></p>
                                    <p class="commentaire"><strong>Commentaire:</strong> <?php echo $message['cmnt']; ?></p>
                          
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
