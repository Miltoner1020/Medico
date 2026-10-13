<?php
require_once __DIR__ . '/../modelo/MedicoDao.php';

class MedicoController {
    private $dao;

    public function __construct() {
        $this->dao = new MedicoDao();
    }

    public function index() {
        $medicos = $this->dao->listar();
        require_once __DIR__ . '/../vista/medicos/index.php';
    }

    public function crear() {
        require_once __DIR__ . '/../vista/medicos/formulario.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        $medico = $this->dao->obtenerPorId($id);
        require_once __DIR__ . '/../vista/medicos/formulario.php';
    }

    public function guardar() {
        $id = $_POST['id'] ?? null;
        $nombres = $_POST['nombres'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $especialidad = $_POST['especialidad'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        
        // Manejo de la foto/imagen
        $foto = $_POST['foto_actual'] ?? '';
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $nombreFoto = time() . '_' . $_FILES['foto']['name'];
            $rutaDestino = __DIR__ . '/../public/uploads/' . $nombreFoto;
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                $foto = $nombreFoto;
            }
        }

        $objMedico = new Medico($id, $nombres, $apellidos, $especialidad, $telefono, $foto);

        if ($id) {
            $this->dao->actualizar($objMedico);
        } else {
            $this->dao->insertar($objMedico);
        }

        header('Location: index.php');
    }

    public function eliminar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->dao->eliminar($id);
        }
        header('Location: index.php');
    }
}
?>