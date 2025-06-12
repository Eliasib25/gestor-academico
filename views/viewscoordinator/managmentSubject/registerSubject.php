<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "Cargando controlador...<br>";
require_once(__DIR__ . "/../../../models/Grade.php");

// Obtener todos grados


$gradeModel = new Grade();
$grades = $gradeModel->searchAll();

// echo "Grados cargados: " . ($grades ? "sí" : "no") . "<br>";

$gradesList = [];
while ($row = $grades->fetch_assoc()) {
    $gradesList[] = $row;
}

?>

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
            <form action="/gestor-academico/controllers/RegisterSubject.php" method="POST">
                <div class="mb-3">
                    <label for="subjectName" class="form-label">Nombre de la asignatura</label>
                    <input type="text" class="form-control" id="subjectName" name="subjectName" required>

                    <label for="grades" class="form-label mt-3">Grados</label>
                    <?php foreach ($gradesList as $row) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="grades[]" value="<?= $row['id'] ?>" id="grade<?= $row['id'] ?>">
                            <label class="form-check-label" for="grade<?= $row['id'] ?>">
                                <?= $row['name'] . " - " . ucfirst($row['journey']) . " (" . $row['classroom'] . ")" ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <button type="submit" class="btn btn-primary">Registrar asignatura</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
