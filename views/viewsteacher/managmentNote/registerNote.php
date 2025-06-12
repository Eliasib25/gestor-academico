<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrar profesor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container-fluid mt-4">
  <div class="mb-3 text-start">
    <a href="../managmentNote.php" class="btn btn-secondary">Regresar</a>
  </div>

  <div class="row g-4">
    <!-- Formulario -->
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="text-center">Registrar o actualizar nota</h2>
          <p class="text-muted text-center">Aquí puedes registrar las notas de tus estudiantes.</p>
          
          <form action="../../../controllers/RegisterNoteController.php" method="POST">
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
                $gradeId = $_SESSION["gradesId"];
                $subject = new Subject();
                $result = $subject->searchSubjectByGrade($gradeId);
                if (is_string($result)) {
                  echo $result;
                } else if ($result == "notSubjects") {
                  echo "<option value='' disabled>No hay asignaturas disponibles para este grado</option>";
                } else {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                  }
                }
                ?>
              </select>
            </div>

            <?php if ($result == "notSubjects"): ?>
              <p class="text-muted">No hay asignaturas registradas para su grado asignado.</p>
            <?php endif; ?>

            <div class="mb-3">
              <label for="score" class="form-label">Nota</label>
              <input type="number" class="form-control" id="score" name="score" required>
            </div>

            <div class="d-grid">
              <button type="submit" id="registerNote" class="btn btn-primary">Registrar o actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabla -->
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="text-center mb-3">Notas Registradas</h2>
          <?php 
          $subjectModel = new Subject();
          $studentScores = $subjectModel->getStudentScoresBySubject($gradeId);
          ?>

          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="table-primary">
                <tr>
                  <th>Identificación</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <?php 
                  if (is_array($studentScores) && count($studentScores) > 0) {
                    foreach ($studentScores[0] as $key => $value) {
                      if (!in_array($key, ['identification', 'name', 'lastname'])) {
                        echo "<th>" . ucfirst($key) . "</th>";
                      }
                    }
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (is_array($studentScores) && count($studentScores) > 0) {
                  foreach ($studentScores as $row) {
                    echo "<tr>";
                    echo "<td>{$row['identification']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['lastname']}</td>";
                    foreach ($row as $key => $value) {
                      if (!in_array($key, ['identification', 'name', 'lastname'])) {
                        echo "<td>{$value}</td>";
                      }
                    }
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='4' class='text-center'>No hay notas registradas.</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  // Deshabilita el botón si no hay asignaturas
  function disableButtonIfNoSubjects() {
    const select = document.getElementById('subjectID');
    const submitButton = document.getElementById('registerNote');
    submitButton.disabled = (select.options.length <= 1);
  }

  window.onload = disableButtonIfNoSubjects;
  document.getElementById('subjectID').addEventListener('change', disableButtonIfNoSubjects);
</script>

</body>
</html>
