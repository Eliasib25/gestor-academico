<?php 
require_once("../../../models/Subject.php");

$subjectEditingId = isset($_GET['edit']) ? $_GET['edit'] : null;

$subject = new Subject();
$subjects = $subject->searchAllWithGrade();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Materias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-start mb-4">
            <a href="../managmentSubjects.php" class="btn btn-secondary">Regresar</a>
        </div>
        <h2 class="text-center mb-4">Lista de Materias Registradas</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la Materia</th>
                        <th>Curso</th>
                        <th>Jornada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (is_string($subjects)) {
                        echo "<tr><td colspan='5'>" . htmlspecialchars($subjects) . "</td></tr>";
                    } else {
                        foreach ($subjects as $row) {
                            if ($subjectEditingId == $row['subjectId']) {
                                echo "<form method='POST' action='../../../controllers/updateSubject.php'>
                                        <input type='hidden' name='subjectId' value='" . htmlspecialchars($row['subjectId']) . "'>
                                        <tr>
                                            <td>" . htmlspecialchars($row['subjectId']) . "</td>
                                            <td><input type='text' name='subjectName' value='" . htmlspecialchars($row['subjectName']) . "' class='form-control' required></td>
                                            <td>" . htmlspecialchars($row['gradeName']) . "</td>
                                            <td>" . htmlspecialchars($row['journey']) . "</td>
                                            <td>
                                                <button type='submit' class='btn btn-success btn-sm'>Guardar</button>
                                                <a href='listSubject.php' class='btn btn-secondary btn-sm'>Cancelar</a>
                                            </td>
                                        </tr>
                                      </form>";
                            } else {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row['subjectId']) . "</td>
                                        <td>" . htmlspecialchars($row['subjectName']) . "</td>
                                        <td>" . htmlspecialchars($row['gradeName']) . "</td>
                                        <td>" . htmlspecialchars($row['journey']) . "</td>
                                        <td>
                                            <a href='?edit=" . $row['subjectId'] . "' class='btn btn-sm btn-primary'>Editar</a>
                                        </td>
                                    </tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
