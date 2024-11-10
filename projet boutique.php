<?php
// 1. Initialiser les articles et les stocks

$articles = ["Chaussettes", "T-shirts", "Chaussures", "Chapeaux", "Jeans"];

$quantites = [10, 5, 8, 3, 12];


echo "Articles et quantités en stock :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$i - $articles[$i] : $quantites[$i] unités\n";
}

// 2. Faire une vente

function vendre(&$articles, &$quantites)
{

    $index = (int) readline("\nEntrez le numéro de l'article à vendre : ");
    $quantiteVendue = (int) readline("Entrez la quantité à vendre : ");


    if ($index < 0 || $index >= count($articles)) {
        echo "Cet article n'existe pas.\n";
    } elseif ($quantites[$index] >= $quantiteVendue) {

        $quantites[$index] -= $quantiteVendue;
        echo "Vente réussie : $quantiteVendue $articles[$index] vendus.\n";
    } else {
        echo "Pas assez de stock pour $articles[$index].\n";
    }
}


vendre($articles, $quantites);

// 3. Réapprovisionner un article
function reapprovisionner(&$articles, &$quantites)
{
    $index = (int) readline("\nEntrez le numéro de l'article à réapprovisionner : ");
    $quantiteAjoutee = (int) readline("Entrez la quantité à ajouter : ");


    if ($index < 0 || $index >= count($articles)) {
        echo "Cet article n'existe pas.\n";
    } else {

        $quantites[$index] += $quantiteAjoutee;
        echo "Réapprovisionnement réussi pour $articles[$index]. Nouveau stock : $quantites[$index]\n";
    }
}


reapprovisionner($articles, $quantites);

// 4. Afficher le stock actuel
echo "\nStock actuel :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$articles[$i] : $quantites[$i] unités\n";
}

// 5. Supprimer un article
function supprimer(&$articles, &$quantites)
{
    $index = (int) readline("\nEntrez le numéro de l'article à supprimer : ");


    if ($index < 0 || $index >= count($articles)) {
        echo "Cet article n'existe pas.\n";
    } else {

        array_splice($articles, $index, 1);
        array_splice($quantites, $index, 1);
        echo "Article supprimé.\n";
    }
}


supprimer($articles, $quantites);


echo "\nStock après suppression :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$articles[$i] : $quantites[$i] unités\n";
}
