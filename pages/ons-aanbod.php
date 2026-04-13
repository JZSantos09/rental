<?php require "includes/header.php" ?>

<?php
$pdo = new PDO("mysql:host=localhost;dbname=rydr", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// filter ophalen
$categorie = $_GET['categorie'] ?? '';

// query met filter
if ($categorie) {
    $stmt = $pdo->prepare("SELECT * FROM cars WHERE type = :type");
    $stmt->execute(['type' => $categorie]);
} else {
    $stmt = $pdo->query("SELECT * FROM cars");
}

$autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h2 class="section-title">Ons aanbod</h2>

    <!-- FILTER -->
    <form method="GET">
        <select name="categorie">
            <option value="">Alle</option>
            <option value="Sport" <?= $categorie == 'Sport' ? 'selected' : '' ?>>Sport</option>
            <option value="SUV" <?= $categorie == 'SUV' ? 'selected' : '' ?>>SUV</option>
            <option value="Sedan" <?= $categorie == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <!-- AUTO'S -->
    <div class="cars">
        <?php foreach ($autos as $auto): ?>
            <div class="car-details">
                <div class="car-brand">
                    <h3><?= $auto['brand'] ?></h3>
                    <div class="car-type"><?= $auto['type_car'] ?></div>
                </div>

                <img src="assets/images/products/<?= $auto['Afbeeldingen'] ?>" alt="">

                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg">90l</span>
                    <span><img src="assets/images/icons/car.svg">Schakel</span>
                    <span><img src="assets/images/icons/profile-2user.svg">2 Personen</span>
                </div>

                <div class="rent-details">
                    <span><strong>€<?= $auto['price'] ?></strong> / dag</span>
                    <a href="/car-detail?id=<?= $auto['id'] ?>" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>

<?php require "includes/footer.php" ?>