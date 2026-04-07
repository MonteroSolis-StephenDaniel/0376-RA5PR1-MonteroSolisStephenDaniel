<?php
// Variable per defecte
$numero = 7;
// Si el formulari ha estat enviat, agafem el valor de l'usuari
if (isset($_GET['numero']) && $_GET['numero'] !== '') {
   $numero = (int) $_GET['numero'];
}
// Validació
$valid = ($numero >= 1 && $numero <= 12);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Taula de Multiplicar</title>
   <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
   <style>
       *, *::before, *::after {
           box-sizing: border-box;
           margin: 0;
           padding: 0;
       }
       :root {
           --bg: #0d0d0d;
           --surface: #161616;
           --border: #2a2a2a;
           --accent: #e8ff47;
           --accent-dim: #b8cc2a;
           --text: #f0f0f0;
           --text-muted: #777;
           --row-even: #1e1e1e;
           --row-odd: #161616;
           --error: #ff4747;
       }
       body {
           background-color: var(--bg);
           color: var(--text);
           font-family: 'Space Mono', monospace;
           min-height: 100vh;
           display: flex;
           flex-direction: column;
           align-items: center;
           justify-content: center;
           padding: 2rem 1rem;
       }
       header {
           text-align: center;
           margin-bottom: 2.5rem;
       }
       header h1 {
           font-family: 'Syne', sans-serif;
           font-size: clamp(2rem, 6vw, 4rem);
           font-weight: 800;
           letter-spacing: -2px;
           color: var(--accent);
           line-height: 1;
       }
       header p {
           color: var(--text-muted);
           font-size: 0.8rem;
           margin-top: 0.5rem;
           letter-spacing: 2px;
           text-transform: uppercase;
       }
       .card {
           background: var(--surface);
           border: 1px solid var(--border);
           border-radius: 4px;
           padding: 2rem;
           width: 100%;
           max-width: 480px;
       }
       /* FORMULARI */
       form {
           display: flex;
           gap: 0.75rem;
           margin-bottom: 2rem;
           align-items: stretch;
       }
       form label {
           display: none;
       }
       form input[type="number"] {
           flex: 1;
           background: var(--bg);
           border: 1px solid var(--border);
           color: var(--text);
           font-family: 'Space Mono', monospace;
           font-size: 1rem;
           padding: 0.65rem 1rem;
           border-radius: 2px;
           outline: none;
           transition: border-color 0.2s;
           -moz-appearance: textfield;
       }
       form input[type="number"]::-webkit-inner-spin-button,
       form input[type="number"]::-webkit-outer-spin-button {
           -webkit-appearance: none;
       }
       form input[type="number"]:focus {
           border-color: var(--accent);
       }
       form button {
           background: var(--accent);
           color: #0d0d0d;
           border: none;
           font-family: 'Syne', sans-serif;
           font-weight: 700;
           font-size: 0.85rem;
           padding: 0.65rem 1.25rem;
           border-radius: 2px;
           cursor: pointer;
           letter-spacing: 1px;
           text-transform: uppercase;
           transition: background 0.15s;
           white-space: nowrap;
       }
       form button:hover {
           background: var(--accent-dim);
       }
       /* TAULA */
       .table-wrapper {
           overflow: hidden;
           border-radius: 2px;
           border: 1px solid var(--border);
       }
       table {
           width: 100%;
           border-collapse: collapse;
       }
       .fila-senar td,
       .fila-parell td {
           padding: 0.65rem 1rem;
           font-size: 0.95rem;
           border-bottom: 1px solid var(--border);
       }
       .fila-senar {
           background-color: var(--row-odd);
       }
       .fila-parell {
           background-color: var(--row-even);
       }
       tr:last-child td {
           border-bottom: none;
       }
       .td-operacio {
           color: var(--text-muted);
       }
       .td-resultat {
           text-align: right;
           font-weight: 700;
           color: var(--accent);
       }
       .td-numero {
           color: var(--text);
       }
       /* ERROR */
       .error-box {
           display: flex;
           align-items: flex-start;
           gap: 1rem;
           background: #1a0000;
           border: 1px solid var(--error);
           border-radius: 2px;
           padding: 1.25rem;
           color: var(--error);
       }
       .error-box .icon {
           font-size: 1.4rem;
           line-height: 1;
           flex-shrink: 0;
       }
       .error-box p {
           font-size: 0.85rem;
           line-height: 1.6;
       }
       .error-box strong {
           display: block;
           font-family: 'Syne', sans-serif;
           font-size: 1rem;
           margin-bottom: 0.25rem;
       }
       footer {
           margin-top: 2rem;
           color: var(--text-muted);
           font-size: 0.7rem;
           letter-spacing: 1px;
           text-transform: uppercase;
       }
   </style>
</head>
<body>
   <header>
       <h1>×<?php echo htmlspecialchars($numero); ?></h1>
       <p>Taula de multiplicar</p>
   </header>
   <div class="card">
       <!-- FORMULARI -->
       <form method="GET" action="">
           <label for="numero">Número:</label>
           <input
               type="number"
               id="numero"
               name="numero"
               min="1"
               max="12"
               placeholder="Escriu un número (1-12)"
               value="<?php echo htmlspecialchars($numero); ?>"
           >
           <button type="submit">Genera</button>
       </form>
       <?php if ($valid): ?>
           <!-- TAULA -->
           <div class="table-wrapper">
               <table>
                   <?php for ($i = 1; $i <= 10; $i++): ?>
                       <?php
                           $resultat = $numero * $i;
                           $classe = ($i % 2 === 0) ? 'fila-parell' : 'fila-senar';
                       ?>
                       <tr class="<?php echo $classe; ?>">
                           <td class="td-numero"><?php echo $numero; ?></td>
                           <td class="td-operacio">× <?php echo $i; ?></td>
                           <td class="td-operacio">=</td>
                           <td class="td-resultat"><?php echo $resultat; ?></td>
                       </tr>
                   <?php endfor; ?>
               </table>
           </div>
       <?php else: ?>
           <!-- ERROR -->
           <div class="error-box">
               <div class="icon">⚠</div>
               <p>
                   <strong>Número no vàlid</strong>
                   El valor <strong><?php echo htmlspecialchars($numero); ?></strong> està fora de rang.
                   Introdueix un número entre <strong>1</strong> i <strong>12</strong>.
               </p>
           </div>
       <?php endif; ?>
   </div>
   <footer>PHP · Taula de multiplicar · 2025</footer>
</body>
</html>