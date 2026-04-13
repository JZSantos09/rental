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
                <img src="assets/images/car-rent-header-image-1.png" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>
        <div class="row white-background">
            <h2><?= $car['brand'] ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span>
            </div>
            <p>NISMO is het toonbeeld geworden van Nissan's uitzonderlijke prestaties, geïnspireerd door het meest meedogenloze testterrein: het circuit.</p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="font-weight-bold"><?= $car['color']?></span><span></span></div>
                <div class="row"><span class="font-weight-bold"><?= $car['type_car']?></span><span></span></div>
                    <div class="row"><span class="font-weight-bold"><span> <?= $car['people_capacity'] ?> Personen</span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="font-weight-bold"><?= $car['steering']?></span><span></span></div>
                    <div class="row"><span class="font-weight-bold"><?= $car['tank_volume']?> Liter</span><span></span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><span class="font-weight-bold"><strong>€<?= $car['price'] ?></strong> / dag</span>
                    <div class="row"><a href="http://localhost/login-form" class="button-primary">Huur nu</a></div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php require "includes/footer.php" ?>
