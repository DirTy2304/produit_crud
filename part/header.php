<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= SITE_URL; ?>">Gestion Produits</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= SITE_URL; ?>">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produit
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= SITE_URL; ?>/pages/produit/liste.php">Liste</a></li>
                            <li><a class="dropdown-item" href="<?= SITE_URL; ?>/pages/produit/edit.php?id=new">Ajouter</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Utilisateur
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= SITE_URL; ?>/pages/utilisateur/liste.php">Liste</a></li>
                            <li><a class="dropdown-item" href="<?= SITE_URL; ?>/pages/utilisateur/edit.php?id=new">Ajouter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
</header>

<body>