<?php
$numero = 7;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<title>Taula de multiplicar</title>

<style>
.fila-senar { background-color: #ffffff; }
.fila-parell { background-color: #dddddd; }
</style>

</head>
<body>

<h1>Taula del <?php echo $numero; ?></h1>

<table border="1">
<?php for ($i = 1; $i <= 10; $i++): ?>
<?php
$classe = ($i % 2 === 0) ? 'fila-parell' : 'fila-senar';
?>
<tr class="<?php echo $classe; ?>">
    <td><?php echo $numero; ?></td>
    <td>x <?php echo $i; ?></td>
    <td>=</td>
    <td><?php echo $numero * $i; ?></td>
</tr>
<?php endfor; ?>
</table>

</body>
</html>