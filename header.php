    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Munch & Crunch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Munch & Crunch</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Toutes les recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tous les programmes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tous les exercices
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Triceps</a></li>
                                <li><a class="dropdown-item" href="#">Biceps</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="dashboard.php" role="button" class="btn btn-outline-light mx-1">Dashboard</a>
                    <a href="logout.php" role="button" class="btn btn-outline-light mx-1">Déconnexion</a>
                    <?php else: ?>
                    <a href="connexion.php" role="button" class="btn btn-outline-light mx-1">Connexion</a>
                    <a href="inscription.php" role="button" class="btn btn-outline-light mx-1">Inscription</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

