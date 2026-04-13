<?php require "includes/header.php" ?>

<?php
require_once "database/connection.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    echo "Geen auto geselecteerd.";
    exit;
}

try {
    $sql = "SELECT * FROM cars WHERE id = :idph";

    $query = $conn->prepare($sql);
    $query->execute([
        "idph" => $id
    ]);

    $car = $query->fetch(PDO::FETCH_ASSOC);

    if (!$car) {
        echo "Auto niet gevonden.";
        exit;
    }
    $conn = null;

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    $conn = null;
?>
<main class="car-detail">
    <div class="grid">
        <div class="row">
            <div class="advertorial">
                <h2>Sport auto met het beste design en snelheid</h2>
                <p>Veiligheid en comfort terwijl je rijd in een futiristische en elante auto </p>
                <img src="assets/images/products/<?= $car['Afbeeldingen']; ?>" alt="auto">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>
        <div class="row white-background">
            <h2><?= $car['brand'] ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span>
            </div>
          <p><?= htmlspecialchars($car['Beschrijving']); ?></p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="accent-color">Type Car</span><span><?= htmlspecialchars($car['type_car']); ?></span></div>
                    <div class="row"><span class="accent-color">Capacity</span><span><?= htmlspecialchars($car['people_capacity']); ?></span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Gasoline</span><span><?= htmlspecialchars($car['tank_volume']); ?></span></div>
                    <div class="row"><span class="accent-color">Bouw jaar</span><span><?= htmlspecialchars($car['build_year']); ?></span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Schakel</span><span><?= htmlspecialchars($car['steering']); ?></span></div>
                    <div class="row"><span class="accent-color">Cylinder</span><span><?= htmlspecialchars($car['cylinder']); ?></span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><span class="font-weight-bold">€ <?= htmlspecialchars($car['price']); ?></span>/ dag</div>
                    <div class="row"><a href="" class="button-primary">Huur nu</a></div>
                </div>
 

            </div>
        </div>
    </div>
</main>

<?php require "includes/footer.php" ?>
