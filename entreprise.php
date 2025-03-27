<?php

// Liste des entreprises simulée
$company = [
    "Entreprise 1", "Entreprise 2", "Entreprise 3", "Entreprise 4", "Entreprise 5",
    "Entreprise 6", "Entreprise 7", "Entreprise 8", "Entreprise 9", "Entreprise 10",
    "Entreprise 11", "Entreprise 12", "Entreprise 13", "Entreprise 14", "Entreprise 15",
];

// Nombre d'entreprises par page
$companyPerPage = 5;

// Détermination de la page actuelle
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, $page); // Assure que la page ne soit jamais inférieure à 1

// Calcul du nombre total de pages
$totalPages = ceil(count($company) / $companyPerPage);

// Assurer que la page demandée n'excède pas le nombre total de pages
$page = min($page, $totalPages);

// Déterminer les entreprises à afficher pour la page actuelle
$start = ($page - 1) * $companyPerPage;
$printedCompanies = array_slice($company, $start, $companyPerPage);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Entreprises</title>
    <link rel="stylesheet" href="entreprise.css">
</head>
<body>
    <header>
        <h1 class="title">Liste des Entreprises</h1>
    </header>
    <main>
        <section class="companies-list">
            <?php
            if (empty($printedCompanies)) {
                echo "<p>Aucune entreprise trouvée.</p>";
            } else {
                foreach ($printedCompanies as $companyItem) {
                    echo "<div class='company-item'>$companyItem</div>";
                }
            }
            ?>
        </section>

        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page - 1 ?>" class="prev">Précédent</a>
            <?php else: ?>
                <span class="disabled">Précédent</span>
            <?php endif; ?>

            <span class="current-page">Page <?= $page ?> sur <?= $totalPages ?></span>

            <?php if ($page < $totalPages): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page + 1 ?>" class="next">Suivant</a>
            <?php else: ?>
                <span class="disabled">Suivant</span>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
