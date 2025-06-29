<?php 
require_once("../../../models/Grade.php");

$gradeEditingId = isset($_GET['edit']) ? $_GET['edit'] : null;

$Grade = new Grade();
$grados = $Grade->searchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de grados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-start mb-3">
            <a href="../managmentGrade.php" class="btn btn-secondary">Regresar</a>
        </div>
        <h2 class="text-center mb-4">Grados Registrados</h2>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'aula_ocupada'): ?>
            <div class="alert alert-danger text-center" role="alert">
                Ese salón ya está ocupado en la misma jornada por otro grado.
            </div>
        <?php endif; ?>

        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Nombre del grado</th>
                    <th>Jornada</th>
                    <th>Aula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($grados)): ?>
                    <?php foreach ($grados as $grado): ?>
                        <?php if ($gradeEditingId == $grado['id']): ?>
                            <form method="POST" action="../../../controllers/updateGrade.php">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($grado['id']) ?>">
                                <tr>
                                    <td><input type="text" name="name" value="<?= htmlspecialchars($grado['name']) ?>" class="form-control" required></td>
                                    
                                    <td>
                                        <select name="journey" class="form-control" required>
                                            <option value="morning" <?= $grado['journey'] === 'mañana' ? 'selected' : '' ?>>Mañana</option>
                                            <option value="afternoon" <?= $grado['journey'] === 'tarde' ? 'selected' : '' ?>>Tarde</option>
                                        </select>
                                    </td>
                                    
                                    <td><input type="text" name="classroom" value="<?= htmlspecialchars($grado['classroom']) ?>" class="form-control" required></td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                        <a href="listGrade.php" class="btn btn-secondary btn-sm">Cancelar</a>
                                    </td>
                                </tr>
                            </form>
                        <?php else: ?>
                            <tr>
                                <td><?= htmlspecialchars(ucfirst($grado['name'])) ?></td>
                                <td><?= $grado['journey'] === 'morning' ? 'Mañana' : 'Tarde' ?></td>
                                <td><?= htmlspecialchars(strtoupper($grado['classroom'])) ?></td>
                                <td>
                                    <a href="?edit=<?= $grado['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay grados registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
