<?php 
require_once("../../../models/Teacher.php");

$teacherEditingId = isset($_GET['edit']) ? $_GET['edit'] : null;
$teacherEditingType = isset($_GET['type']) ? $_GET['type'] : null;

$Teacher = new Teacher();
$profesores = $Teacher->searchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-start mb-3">
            <a href="../managmentTeacher.php" class="btn btn-secondary">Regresar</a>
        </div>
        <h2 class="text-center mb-4">Profesores Registrados</h2>

        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Identificación</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($profesores)): ?>
                    <?php foreach ($profesores as $profesor): ?>
                        <?php if ($teacherEditingId == $profesor['identification'] && $teacherEditingType == $profesor['identificationType']): ?>
                            <form method="POST" action="../../../controllers/updateTeacher.php">
                                <input type="hidden" name="identification" value="<?= htmlspecialchars($profesor['identification']) ?>">
                                <input type="hidden" name="identificationType" value="<?= htmlspecialchars($profesor['identificationType']) ?>">
                                <tr>
                                    <td><?= htmlspecialchars($profesor['identification']) ?></td>
                                    <td><?= htmlspecialchars($profesor['identificationType']) ?></td>
                                    <td><input type="text" name="name" value="<?= htmlspecialchars($profesor['name']) ?>" class="form-control"></td>
                                    <td><input type="text" name="lastname" value="<?= htmlspecialchars($profesor['lastname']) ?>" class="form-control"></td>
                                    <td><input type="date" name="dateBorn" value="<?= htmlspecialchars($profesor['dateBorn']) ?>" class="form-control"></td>
                                    <td><input type="text" name="phone" value="<?= htmlspecialchars($profesor['phone']) ?>" class="form-control"></td>
                                    <td><input type="email" name="email" value="<?= htmlspecialchars($profesor['email']) ?>" class="form-control"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                        <a href="listTeacher.php" class="btn btn-secondary btn-sm">Cancelar</a>
                                    </td>
                                </tr>
                            </form>
                        <?php else: ?>
                            <tr>
                                <td><?= htmlspecialchars($profesor['identification']) ?></td>
                                <td><?= htmlspecialchars($profesor['identificationType']) ?></td>
                                <td><?= htmlspecialchars($profesor['name']) ?></td>
                                <td><?= htmlspecialchars($profesor['lastname']) ?></td>
                                <td><?= htmlspecialchars($profesor['dateBorn']) ?></td>
                                <td><?= htmlspecialchars($profesor['phone']) ?></td>
                                <td><?= htmlspecialchars($profesor['email']) ?></td>
                                <td>
                                    <a href="?edit=<?= urlencode($profesor['identification']) ?>&type=<?= urlencode($profesor['identificationType']) ?>" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No hay profesores registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
