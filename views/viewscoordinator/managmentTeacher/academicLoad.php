<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga académica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div>
            <div class="text-start mt-4">
                <a href="../managmentTeacher.php" class="btn btn-secondary">Regresar</a>
            </div>
            <h2 class="text-center">Asignar carga académica</h2>
            <p class="text-muted text-center">Aquí puedes asignar y editar la carga académica de los profesores.</p>
            <form class="w-50 mx-auto" action="../../../controllers/AssignAcademicLoadController.php" method="POST">
                <div class="mb-3">
                    <label for="teacher" class="form-label">Seleccionar profesor</label>
                    <select class="form-select" id="teacher" name="teacher" required>
                        <option value="" disabled selected>Seleccione un profesor</option>
                        <?php
                        require_once("../../../models/Teacher.php");

                        $teacher = new Teacher();

                        $result = $teacher->searchAll();
                        
                        if (is_string($result)){
                            echo $result; //Se muestra el código de error
                        } else {
                            while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['identification']}-{$row['identificationType']}' >{$row['name']} {$row['lastname']}</option>";
                            }
                        }


                        ?>
                    </select>
                    <label for="grade" class="form-label">Grado</label>
                    <select class="form-select" id="grade" name="grade" required>
                        <option value="" disabled selected>Seleccione un grado</option>
                        <?php
                        require_once("../../../models/Grade.php");

                        $grade = new Grade();

                        $result = $grade->searchAll();

                        if (is_string($result)){
                            echo $result; //Se muestra el código de error
                        } else {
                            while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['id']}' >{$row['name']} - {$row['journey']}</option>";
                            }
                        }
                        ?>
                        
                    </select>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Asignar carga académica</button>
                </div>
        </form>
    
</body>
</html>