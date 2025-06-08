<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar asignatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../managmentSubjects.php" class="btn btn-secondary">Regresar</a>
            </div>
            <h2 class="text-center">Registrar asignaturas</h2>
            <p class="text-muted text-center">Completa el formulario para registrar una asignatura</p>
            <form class="w-50 mx-auto" action="../../controllers/SubjectController.php" method="POST">
                <div class="mb-3">
                    <label for="subjectName" class="form-label">Nombre de la asignatura</label>
                    <input type="text" class="form-control" id="subjectName" name="subjectName" required>
                    <label for="tecacher" class="form-label">Docente a asignar</label>
                    <select class="form-select" id="tecacher" name="tecacher" required>
                        <option value="" disabled selected>Seleccione un docente</option>
                        <?php
                        // Aquí va el código para obtener la lista de docentes desde la base de datos
                        ?>
                        <option value="1">Docente 1</option>
                        <option value="2">Docente 2</option>
                        <option value="3">Docente 3</option>
                    </select>
                    <label for="grades" class="form-label">Grados</label>
                    <!-- Se deben generar dinámicamente las opciones de grados desde la base de datos -->
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="grades[]" value="1" id="grade1">
                        <label class="form-check-label" for="grade1">Grado 1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="grades[]" value="2" id="grade2">
                        <label class="form-check-label" for="grade2">Grado 2</label>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">Registrar asignatura</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>