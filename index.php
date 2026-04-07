<?php
$numero = 7;

if (isset($_GET['numero']) && $_GET['numero'] !== '') {
    $numero = (int) $_GET['numero'];
}

$valid = ($numero >= 1 && $numero <= 12);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>Taula de multiplicar</title>
</head>
<body>

<h1>Taula del <?php echo $numero; ?></h1>

<form method="GET">
    <input type="number" name="numero" min="1" max="12">
    <button type="submit">Genera</button>
</form>

</body>
</html>