<?php

require_once "banco.php";

// Cria a tabela
$pdo->exec("
    CREATE TABLE IF NOT EXISTS signos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        periodo TEXT NOT NULL,
        descricao TEXT NOT NULL,
        elemento TEXT NOT NULL,
        planeta TEXT NOT NULL,
        caracteristicas TEXT NOT NULL
    )
");

// Verifica se os signos já foram cadastrados
$total = $pdo->query("SELECT COUNT(*) FROM signos")->fetchColumn();

if ($total == 0) {

    $signos = [

        [
            "Áries",
            "21 de março a 19 de abril",
            "Áries é conhecido por sua coragem, energia e espírito de liderança.",
            "Fogo",
            "Marte",
            "Corajoso, energético e determinado."
        ],

        [
            "Touro",
            "20 de abril a 20 de maio",
            "Touro é conhecido por sua determinação, paciência e estabilidade.",
            "Terra",
            "Vênus",
            "Paciente, confiável e persistente."
        ],

        [
            "Gêmeos",
            "21 de maio a 20 de junho",
            "Gêmeos é comunicativo, curioso e bastante adaptável.",
            "Ar",
            "Mercúrio",
            "Curioso, comunicativo e versátil."
        ],

        [
            "Câncer",
            "21 de junho a 22 de julho",
            "Câncer é sensível, intuitivo e muito ligado às emoções.",
            "Água",
            "Lua",
            "Sensível, protetor e intuitivo."
        ],

        [
            "Leão",
            "23 de julho a 22 de agosto",
            "Leão possui uma personalidade forte, criativa e carismática.",
            "Fogo",
            "Sol",
            "Criativo, confiante e generoso."
        ],

        [
            "Virgem",
            "23 de agosto a 22 de setembro",
            "Virgem é observador, organizado e bastante detalhista.",
            "Terra",
            "Mercúrio",
            "Organizado, analítico e dedicado."
        ],

        [
            "Libra",
            "23 de setembro a 22 de outubro",
            "Libra busca equilíbrio, harmonia e boas relações.",
            "Ar",
            "Vênus",
            "Diplomático, sociável e equilibrado."
        ],

        [
            "Escorpião",
            "23 de outubro a 21 de novembro",
            "Escorpião é intenso, determinado e misterioso.",
            "Água",
            "Plutão",
            "Intenso, leal e determinado."
        ],

        [
            "Sagitário",
            "22 de novembro a 21 de dezembro",
            "Sagitário é aventureiro, otimista e amante da liberdade.",
            "Fogo",
            "Júpiter",
            "Aventureiro, otimista e sincero."
        ],

        [
            "Capricórnio",
            "22 de dezembro a 19 de janeiro",
            "Capricórnio é responsável, disciplinado e ambicioso.",
            "Terra",
            "Saturno",
            "Disciplinado, responsável e persistente."
        ],

        [
            "Aquário",
            "20 de janeiro a 18 de fevereiro",
            "Aquário é independente, criativo e inovador.",
            "Ar",
            "Urano",
            "Criativo, independente e original."
        ],

        [
            "Peixes",
            "19 de fevereiro a 20 de março",
            "Peixes é sensível, imaginativo e empático.",
            "Água",
            "Netuno",
            "Sensível, criativo e intuitivo."
        ]
    ];

    $sql = "
        INSERT INTO signos 
        (nome, periodo, descricao, elemento, planeta, caracteristicas)
        VALUES (?, ?, ?, ?, ?, ?)
    ";

    $stmt = $pdo->prepare($sql);

    foreach ($signos as $signo) {
        $stmt->execute($signo);
    }

    echo "<h1>Banco de dados criado com sucesso!</h1>";
    echo "<a href='index.php'>Ir para a página inicial</a>";

} else {
    echo "O banco de dados já está configurado.";
}