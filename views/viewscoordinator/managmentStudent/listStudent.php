<?php 
require_once("../../../models/Student.php");

$studentEditingId = isset($_GET['edit']) ? $_GET['edit'] : null;

$Student = new Student();
$students = $Student->searchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-start mb-3">
            <a href="../managmentStudent.php" class="btn btn-secondary">Regresar</a>
        </div>
        <h2 class="text-center mb-4">Estudiantes Registrados</h2>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Identificación</th>
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de nacimiento</th>
                        <th>Dirección</th>
                        <th>Acudiente</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>ID Grado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $student): ?>
                            <?php if ($studentEditingId == $student['identification']): ?>
                                <form method="POST" action="../../../controllers/updateStudent.php">
                                    <input type="hidden" name="identification" value="<?= htmlspecialchars($student['identification']) ?>">
                                    <tr>
                                        <td><?= htmlspecialchars($student['identification']) ?></td>
                                        <td>
                                            <select name="identificationType" class="form-select" required>
                                                <option value="TI" <?= $student['identificationType'] === 'TI' ? 'selected' : '' ?>>Tarjeta de Identidad</option>
                                                <option value="RC" <?= $student['identificationType'] === 'RC' ? 'selected' : '' ?>>Registro Civil</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" class="form-control"></td>
                                        <td><input type="text" name="lastname" value="<?= htmlspecialchars($student['lastname']) ?>" class="form-control"></td>
                                        <td><input type="date" name="dateBorn" value="<?= htmlspecialchars($student['dateBorn']) ?>" class="form-control"></td>
                                        <td><input type="text" name="address" value="<?= htmlspecialchars($student['address']) ?>" class="form-control"></td>
                                        <td>
                                            <select name="identificationTypeAttendant" class="form-select mb-1" required>
                                                <option value="CC" <?= $student['identificationTypeAttendant'] === 'CC' ? 'selected' : '' ?>>Cédula de Ciudadanía</option>
                                                <option value="TI" <?= $student['identificationTypeAttendant'] === 'TI' ? 'selected' : '' ?>>Tarjeta de Identidad</option>
                                                <option value="CE" <?= $student['identificationTypeAttendant'] === 'CE' ? 'selected' : '' ?>>Cédula de Extranjería</option>
                                            </select>
                                            <input type="text" name="identificationAttendant" value="<?= htmlspecialchars($student['identificationAttendant']) ?>" class="form-control mb-1" placeholder="Identificación">
                                            <input type="text" name="nameAttendant" value="<?= htmlspecialchars($student['nameAttendant']) ?>" class="form-control mb-1" placeholder="Nombre">
                                            <input type="text" name="lastnameAttendant" value="<?= htmlspecialchars($student['lastnameAttendant']) ?>" class="form-control mb-1" placeholder="Apellido">
                                        </td>
                                        <td><input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>" class="form-control"></td>
                                        <td><input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" class="form-control"></td>
                                        <td><input type="number" name="gradesId" value="<?= htmlspecialchars($student['gradesId']) ?>" class="form-control"></td>
                                        <td>
                                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                            <a href="listStudent.php" class="btn btn-secondary btn-sm">Cancelar</a>
                                        </td>
                                    </tr>
                                </form>
                            <?php else: ?>
                                <tr>
                                    <td><?= htmlspecialchars($student['identification']) ?></td>
                                    <td><?= htmlspecialchars($student['identificationType']) ?></td>
                                    <td><?= htmlspecialchars(ucfirst($student['name'])) ?></td>
                                    <td><?= htmlspecialchars(ucfirst($student['lastname'])) ?></td>
                                    <td><?= htmlspecialchars($student['dateBorn']) ?></td>
                                    <td><?= htmlspecialchars($student['address']) ?></td>
                                    <td>
                                        <?= htmlspecialchars($student['identificationTypeAttendant']) ?><br>
                                        <?= htmlspecialchars($student['identificationAttendant']) ?><br>
                                        <?= htmlspecialchars($student['nameAttendant']) ?><br>
                                        <?= htmlspecialchars($student['lastnameAttendant']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($student['phone']) ?></td>
                                    <td><?= htmlspecialchars($student['email']) ?></td>
                                    <td><?= htmlspecialchars($student['gradesId']) ?></td>
                                    <td>
                                        <a href="?edit=<?= $student['identification'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" class="text-center">No hay estudiantes registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
