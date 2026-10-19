<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Descubra seu Signo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card p-4 shadow-lg formulario">
        
        <h1 class="text-center mb-3">✨ Descubra seu Signo ✨</h1>

        <p class="text-center">
            Informe sua data de nascimento e descubra qual é o seu signo zodiacal!
        </p>

        <form action="resultado.php" method="POST">

            <div class="mb-3">
                <label for="data_nascimento" class="form-label">
                    Data de nascimento:
                </label>

                <input 
                    type="date" 
                    class="form-control"
                    id="data_nascimento"
                    name="data_nascimento"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Descobrir meu signo 🔮
            </button>

        </form>

    </div>

</div>

</body>
</html>