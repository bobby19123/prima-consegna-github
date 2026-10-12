<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = isset($_POST['base']) ? floatval($_POST['base']) : 0;
    $altezza = isset($_POST['altezza']) ? floatval($_POST['altezza']) : 0;

    if ($base > 0 && $altezza > 0) {
        $perimetro = 2 * ($base + $altezza);
        $area = $base * $altezza;
        // Calcolo della diagonale con il Teorema di Pitagora
        $diagonale = sqrt(pow($base, 2) + pow($altezza, 2));
    } else {
        $errore = "Per favore inserisci valori maggiori di zero.";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Risultato Calcolo Rettangolo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .result-box {
            border: 1px solid #ccc;
            padding: 20px;
            width: 350px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .error {
            color: red;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>
<body>

    <h2>Risultati del Calcolo</h2>

    <div class="result-box">
        <?php if (isset($errore)): ?>
            <p class="error"><?php echo $errore; ?></p>
        <?php else: ?>
            <p><strong>Base:</strong> <?php echo $base; ?></p>
            <p><strong>Altezza:</strong> <?php echo $altezza; ?></p>
            <hr>
            <p><strong>Perimetro:</strong> <?php echo $perimetro; ?></p>
            <p><strong>Area:</strong> <?php echo $area; ?></p>
            <p><strong>Diagonale:</strong> <?php echo number_format($diagonale, 2); ?></p>
        <?php endif; ?>
    </div>

    <a href="index.html">&laquo; Torna al modulo</a>

</body>
</html>