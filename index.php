<?php
$numero = 7;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Taula de multiplicar</title>
</head>
<body>

<h1>Taula del <?php echo $numero; ?></h1>

<table border="1">
<?php for ($i = 1; $i <= 10; $i++): ?>
    <tr>
        <td><?php echo $numero; ?></td>
        <td>x <?php echo $i; ?></td>
        <td>=</td>
        <td><?php echo $numero * $i; ?></td>
    </tr>
<?php endfor; ?>
</table>

</body>
</html>