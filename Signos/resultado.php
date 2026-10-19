<?php

require_once "banco.php";

// Verifica se a data foi enviada
if (!isset($_POST["data_nascimento"]) || empty($_POST["data_nascimento"])) {
    header("Location: index.php");
    exit;
}

$data = $_POST["data_nascimento"];

$dataNascimento = new DateTime($data);

$dia = (int)$dataNascimento->format("d");
$mes = (int)$dataNascimento->format("m");

$signo = "";

// Descobre o signo
if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19)) {
    $signo = "Áries";

} elseif (($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20)) {
    $signo = "Touro";

} elseif (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20)) {
    $signo = "Gêmeos";

} elseif (($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22)) {
    $signo = "Câncer";

} elseif (($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22)) {
    $signo = "Leão";

} elseif (($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22)) {
    $signo = "Virgem";

} elseif (($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22)) {
    $signo = "Libra";

} elseif (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21)) {
    $signo = "Escorpião";

} elseif (($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21)) {
    $signo = "Sagitário";

} elseif (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19)) {
    $signo = "Capricórnio";

} elseif (($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18)) {
    $signo = "Aquário";

} else {
    $signo = "Peixes";
}

// Busca as informações do signo no banco
$stmt = $pdo->prepare("SELECT * FROM signos WHERE nome = ?");
$stmt->execute([$signo]);

$informacoes = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Seu Signo - <?= htmlspecialchars($signo) ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container py-5">

    <div class="card resultado-card shadow-lg p-4">

        <h1 class="text-center mb-4">
            🔮 Seu signo é <?= htmlspecialchars($informacoes["nome"]) ?>!
        </h1>

        <div class="informacao">

            <h4>📅 Período</h4>
            <p><?= htmlspecialchars($informacoes["periodo"]) ?></p>

            <h4>✨ Sobre o signo</h4>
            <p><?= htmlspecialchars($informacoes["descricao"]) ?></p>

            <h4>🌍 Elemento</h4>
            <p><?= htmlspecialchars($informacoes["elemento"]) ?></p>

            <h4>🪐 Planeta regente</h4>
            <p><?= htmlspecialchars($informacoes["planeta"]) ?></p>

            <h4>⭐ Características principais</h4>
            <p><?= htmlspecialchars($informacoes["caracteristicas"]) ?></p>

        </div>

        <a href="index.php" class="btn btn-outline-primary w-100 mt-3">
            Descobrir outro signo
        </a>

    </div>

</div>

</body>
</html>