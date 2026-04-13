
<?php require "includes/header.php" ?>
<?php
require_once "database/connection.php"; ?>
<head>
    <link rel= "stylesheet" href="assets/css/Hulp.css">
</head>
<main>
    <h2 class="section-title">Contact pagina</h2>
<body>

<div class="container">
    <h1>Hulp nodig?</h1>
    <p>
        Heb je een vraag of kom je ergens niet uit? Laat je gegevens achter en ons team neemt zo snel mogelijk contact met je op.
        We staan klaar om je te helpen met al je vragen.
    </p>

    <form method="POST" action="">
        <label>Email adres</label>
        <input type="email" name="email" required>

        <label>Telefoonnummer</label>
        <input type="text" name="telefoon" required>

        <label>Waar kunnen we je mee helpen?</label>
        <textarea name="bericht" rows="4" required></textarea>

        <button type="submit">Versturen</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $telefoon = $_POST['telefoon'];
        $bericht = $_POST['bericht'];

        echo "<p>Bedankt! We nemen zo snel mogelijk contact met je op.</p>";

        // Hier kan je eventueel opslaan in database of mail sturen
    }
    ?>
</div>

</body>
</html>
<?php require "includes/footer.php" ?>
