<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Médicos</title>
    <link rel="stylesheet" href="public/estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1>Lista de Médicos</h1>
        <a href="index.php?action=crear" class="btn">Registrar Nuevo Médico</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicos as $m): ?>
                <tr>
                    <td><?= $m['id'] ?></td>
                    <td>
                        <?php if (!empty($m['foto'])): ?>
                            <img src="public/uploads/<?= $m['foto'] ?>" width="50" alt="Foto">
                        <?php else: ?>
                            Sin Foto
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($m['nombres']) ?></td>
                    <td><?= htmlspecialchars($m['apellidos']) ?></td>
                    <td><?= htmlspecialchars($m['especialidad']) ?></td>
                    <td><?= htmlspecialchars($m['telefono']) ?></td>
                    <td>
                        <a href="index.php?action=editar&id=<?= $m['id'] ?>">Editar</a> | 
                        <a href="index.php?action=eliminar&id=<?= $m['id'] ?>" onclick="return confirm('¿Desea eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>