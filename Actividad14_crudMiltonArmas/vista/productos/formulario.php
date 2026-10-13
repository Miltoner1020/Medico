<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($medico) ? 'Editar Médico' : 'Nuevo Médico' ?></title>
    <link rel="stylesheet" href="public/estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1><?= isset($medico) ? 'Editar Médico' : 'Nuevo Médico' ?></h1>
        
        <form action="index.php?action=guardar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $medico['id'] ?? '' ?>">
            <input type="hidden" name="foto_actual" value="<?= $medico['foto'] ?? '' ?>">

            <label>Nombres:</label>
            <input type="text" name="nombres" value="<?= $medico['nombres'] ?? '' ?>" required>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?= $medico['apellidos'] ?? '' ?>" required>

            <label>Especialidad:</label>
            <input type="text" name="especialidad" value="<?= $medico['especialidad'] ?? '' ?>" required>

            <label>Teléfono:</label>
            <input type="text" name="telefono" value="<?= $medico['telefono'] ?? '' ?>" required>

            <label>Foto:</label>
            <input type="file" name="foto" accept="image/*">

            <br><br>
            <button type="submit" class="btn">Guardar</button>
            <a href="index.php">Cancelar</a>
        </form>
    </div>
</body>
</html>