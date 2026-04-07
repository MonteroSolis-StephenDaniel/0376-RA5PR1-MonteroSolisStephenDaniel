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

<style>
.fila-senar { background:#fff; }
.fila-parell { background:#ddd; }
.error { color:red; }
</style>

</head>
<body>

<h1>Taula del <?php echo $numero; ?></h1>

<form method="GET">
    <input type="number" name="numero" min="1" max="12"
        value="<?php echo $numero; ?>">
    <button type="submit">Genera</button>
</form>

<?php if ($valid): ?>

<table border="1">
<?php for ($i = 1; $i <= 10; $i++): ?>
<?php $classe = ($i % 2 === 0) ? 'fila-parell' : 'fila-senar'; ?>
<tr class="<?php echo $classe; ?>">
    <td><?php echo $numero; ?></td>
    <td>x <?php echo $i; ?></td>
    <td>=</td>
    <td><?php echo $numero * $i; ?></td>
</tr>
<?php endfor; ?>
</table>

<?php else: ?>
<p class="error">Número fora de rang (1-12)</p>
<?php endif; ?>

</body>
</html>