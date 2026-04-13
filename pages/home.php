<?php require "includes/header.php" ?>
<?php
require_once "database/connection.php";

try {
    $sql = "SELECT * FROM cars LIMIT 12";
    $query = $conn->query($sql);
    $cars = $query->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Fout: " . $e->getMessage();
}
?>
    <header>
        <div class="advertorials">
            <div class="advertorial">
                <h2>Hét platform om een auto te huren</h2>
                <p>Snel en eenvoudig een auto huren. Natuurlijk voor een lage prijs.</p>
                <a href="http://localhost/ons-aanbod" class="button-primary">Huur nu een auto</a>
                <img src="assets/images/car-rent-header-image-1.png" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
            <div class="advertorial">
                <h2>Wij verhuren ook bedrijfswagens</h2>
                <p>Voor een vaste lage prijs met prettig voordelen.</p>
                <a href="http://localhost/ons-aanbod" class="button-primary">Huur een bedrijfswagen</a>
                <img src="assets/images/car-rent-header-image-2.png" alt="">
                <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">

            </div>
        </div>
    </header>

    <main>
    <h2 class="section-title">Populaire auto's</h2>
<div class="cars">
    <?php foreach (array_slice($cars, 0, 4) as $car): ?>
        <div class="car-details">
            <div class="car-brand">
                <h3><?= $car['brand'] ?></h3>
                <div class="car-type">
                    <?= $car['type_car'] ?>
                </div>
                <img src="assets/images/products/<?= $car['Afbeeldingen']; ?>" alt="auto">
            </div>

            <img src="assets/images/products/car (<?= $car['id'] ?>).svg" alt="">

            <div class="car-specification">
                <span> <?= $car['tank_volume'] ?>L</span>
                <span> <?= $car['steering'] ?></span>
                <span> <?= $car['color'] ?></span>
                <span> <?= $car['people_capacity'] ?> Personen</span>
            </div>

            <div class="rent-details">
                <span><strong>€<?= $car['price'] ?></strong> / dag</span>

                <a href="/car-detail?id=<?= $car['id'] ?>" class="button-primary">
                    Bekijk nu
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="cars">
    <?php foreach (array_slice($cars, 4, 8) as $car): ?>
        <div class="car-details">
            <div class="car-brand">
                <h3><?= $car['brand'] ?></h3>
                <div class="car-type">
                    <?= $car['type_car'] ?>
                </div>
                <img src="assets/images/products/<?= $car['Afbeeldingen']; ?>" alt="auto">
            </div>

            <img src="assets/images/products/car (<?= $car['id'] ?>).svg" alt="">

            <div class="car-specification">
                <span> <?= $car['tank_volume'] ?>L</span>
                <span> <?= $car['steering'] ?></span>
                <span> <?= $car['color'] ?></span>
                <span> <?= $car['people_capacity'] ?> Personen</span>
            </div>

            <div class="rent-details">
                <span><strong>€<?= $car['price'] ?></strong> / dag</span>

                <a href="/car-detail?id=<?= $car['id'] ?>" class="button-primary">
                    Bekijk nu
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    <div class="show-more">
        <a class="button-primary" href="http://localhost/ons-aanbod">Toon alle</a>
    </div>
    </main>

<?php require "includes/footer.php" ?>