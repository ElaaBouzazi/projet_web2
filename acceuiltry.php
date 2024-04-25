<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_acceuil.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor\twbs\bootstrap\dist\css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    

<nav class="navbar navbar-expand-lg fixed-top">

  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="#">C-Blog</a>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">C-Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2  active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 custom-link" href="#">About</a> <!-- Ajout de la classe custom-link -->
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 custom-link" href="#">Service</a> <!-- Ajout de la classe custom-link -->
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 custom-link" href="#">Contact</a> <!-- Ajout de la classe custom-link -->
          </li>
         
        </ul>
      </div>
    </div>
    <a href="s_inscrire.php" class="login-button" style="background-color:#026701; color: #fff; font-size: 14px; padding: 8px 20px; border-radius: 50px; text-decoration: none; transition: 0.3s  background-color;">Login</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<section class="hero-section mt-5 mb-5 shadow">
  <!-- Contenu de votre section -->
</section>
<div class="container">
        <div class="row">
            <!-- Premier article -->
            <div class="col-md-6">
                <div class="article shadow">
                    <img src="war.jpg" alt="Article 1">
                    <h2>Femmes Palestiniennes Victimes de la Violence : L'Appel à la Justice et à la Paix</h2>
                    <p>Dans le contexte du conflit israélo-palestinien, les femmes palestiniennes continuent d'être touchées de manière tragique par la violence et les décès. Ces incidents, souvent passés sous silence, soulignent la vulnérabilité et les défis auxquels sont confrontées les femmes dans les zones de conflit.

Témoignages Poignants
Des cas récents ont mis en lumière la dure réalité des femmes palestiniennes qui ont été ...</p>
                    <form action="article.php" method="POST">
                    <button type="submit" name="article_id" value="1" class="btn btn-primary btn-read-more">Lire la suite</button>
                    </form>                
              </div>
            </div>
            <!-- Deuxième article -->
            
        </div>
    </div>
    
    <div class="message" id="message">
        Si vous voulez participer au forum de discussion, connectez-vous !
        <span class="close-icon" onclick="closeMessage()">X</span>
    </div>
    
    <script>
        let prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.querySelector(".navbar").style.top = "0"; /* Affiche la barre de navigation lorsque vous faites défiler vers le haut */
            } else {
                document.querySelector(".navbar").style.top = "-56px"; /* Masque la barre de navigation lorsque vous faites défiler vers le bas */
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <script>
        // Afficher le message après 3 secondes
        setTimeout(() => {
            const message = document.getElementById('message');
            message.style.display = 'block';
        }, 3000); // 3 secondes en millisecondes

        // Fonction pour fermer le message
        function closeMessage() {
            const message = document.getElementById('message');
            message.style.display = 'none';
        }
    </script>
    
</body>
</html>
