<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <!-- Formulario a la izquierda -->
            <div class="col-md-6 mb-4">
                <div class="text-start mt-4">
                    <a href="../managmentNote.php" class="btn btn-secondary">Regresar</a>
                </div>
                <h2 class="text-center">Registrar o actualizar nota</h2>
                <p class="text-muted text-center">Aquí puedes registrar las notas de tus estudiantes.</p>
                <form class="w-100" action="../../../controllers/RegisterNoteController.php" method="POST">
                    <div class="mb-3">
                        <label for="studentIdentification" class="form-label">Número de identificación del estudiante</label>
                        <input type="number" class="form-control" id="studentIdentification" name="studentIdentification" required>
                    </div>
                    <div class="mb-3">
                        <label for="subjectID" class="form-label">Grado a cursar</label>
                        <select class="form-select" id="subjectID" name="subjectID" required>
                            <option value="" disabled selected>Seleccione una materia</option>
                            <?php 
                            require_once("../../../models/Subject.php");

                            $_SESSION["gradesId"];
                            $gradeId = $_SESSION["gradesId"];

                            $subject = new Subject();
                            $result = $subject->searchSubjectByGrade($gradeId);

                            if (is_string($result)){
                                echo  $result; //Se muestra el código de error
                            } else if ($result == "notSubjects") {
                                 echo "<option value='' disabled>No hay asignaturas disponibles para este grado</option>";
                            }
                            else {
                                while($row = $result->fetch_assoc()){
                                    echo "<option value='{$row['id']}'> {$row['name']}</option>";
                                }
                            } 
                            ?>
                        </select>
                    </div>
                    <?php 
                    if ($result == "notSubjects"): ?>
                        <p class="text-muted mt-2">No hay asignaturas registradas para su grado asignado.</p>
                    <?php endif ?>
                    <div class="mb-3">
                        <label for="score" class="form-label">Nota</label>
                        <input type="number" class="form-control" id="score" name="score" required>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" id="registerNote" class="btn btn-primary">Registrar o actualizar</button>
                    </div>
                </form>
            </div>

            <!-- Tabla de notas a la derecha -->
            <div class="col-md-6 mb-4">
                <?php 
                require_once("../../../models/Subject.php");
                $subjectModel = new Subject();

                // Obtener los resultados de las notas por asignatura
                $studentScores = $subjectModel->getStudentScoresBySubject($gradeId);
                ?>
                <h2 class="text-center mb-4">Notas Registradas</h2>

                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Identification</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <?php 
                            // Mostrar los encabezados de las asignaturas dinámicamente
                            if (is_array($studentScores) && count($studentScores) > 0) {
                                foreach ($studentScores[0] as $key => $value) {
                                    if ($key != 'identification' && $key != 'name' && $key != 'lastname') {
                                        echo "<th>" . ucfirst($key) . "</th>";
                                    }
                                }
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Si hay resultados de las notas
                        if (is_array($studentScores) && count($studentScores) > 0) {
                            foreach ($studentScores as $row) {
                                echo "<tr>";
                                echo "<td>{$row['identification']}</td>";
                                echo "<td>{$row['name']}</td>";
                                echo "<td>{$row['lastname']}</td>";

                                // Mostrar las notas de cada asignatura
                                foreach ($row as $key => $value) {
                                    if ($key != 'identification' && $key != 'name' && $key != 'lastname') {
                                        echo "<td>{$value}</td>";
                                    }
                                }

                                echo "</tr>";
                            }
                        } else {
                            // Si no hay resultados
                            echo "<tr><td colspan='4' class='text-center'>No hay notas registradas.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
         // Función para deshabilitar el botón si no hay asignaturas
        function disableButtonIfNoSubjects() {
            var select = document.getElementById('subjectName');
            var submitButton = document.getElementById('registerNote');
            
            // Si no hay opciones disponibles en el select, deshabilitar el botón
            if (select.options.length <= 1) { // Si solo hay la opción por defecto
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }

        // Llamar a la función para verificar al cargar la página
        window.onload = disableButtonIfNoSubjects;

        // También se puede llamar si el select cambia (en caso de ser necesario)
        document.getElementById('subjectName').addEventListener('change', disableButtonIfNoSubjects);
    </script>

</body>
</html>