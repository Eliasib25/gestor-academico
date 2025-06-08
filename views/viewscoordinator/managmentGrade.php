<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar grado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../dashboard/coordinator.php" class="btn btn-secondary">Volver al dashboard</a>
        </div>
        <h2 class="text-center">Registrar grado</h2>
        <p class="text-muted text-center">Aquí puedes registrar nuevos grados para la institución.</p>
        <form class="w-50 mx-auto" action="../../controllers/RegisterGradeController.php" method="POST">
            <div class="mb-3">
                <label for="gradeName" class="form-label">Nombre del grado</label>
                <input type="text" class="form-control" id="gradeName" name="gradeName" required>
            </div>
            <div class="mb-3">
                <label for="gradeName" class="form-label">Seleccione la jornada</label>
                     <select class="form-select" id="journey" name="journey" required>
                        <option value="" disabled selected>Seleccione una jornada</option>
                        <option value="morning">Mañana</option>
                        <option value="afternoon">Tarde</option>
                     </select>
            </div>
            <div class="mb-3">
                <label for="classroom" class="form-label">Aula</label>
                <input type="text" class="form-control" id="classroom" name="classroom" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registerGrade">Registrar grado</button>
        </form>

    </div>
</body>
</html>