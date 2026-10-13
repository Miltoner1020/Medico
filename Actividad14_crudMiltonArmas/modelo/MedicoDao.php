<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/Medico.php';

class MedicoDao {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function listar() {
        $query = "SELECT * FROM medico ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM medico WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertar(Medico $medico) {
        $query = "INSERT INTO medico (nombres, apellidos, especialidad, telefono, foto) 
                  VALUES (:nombres, :apellidos, :especialidad, :telefono, :foto)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":nombres", $medico->getNombres());
        $stmt->bindValue(":apellidos", $medico->getApellidos());
        $stmt->bindValue(":especialidad", $medico->getEspecialidad());
        $stmt->bindValue(":telefono", $medico->getTelefono());
        $stmt->bindValue(":foto", $medico->getFoto());

        return $stmt->execute();
    }

    public function actualizar(Medico $medico) {
        $query = "UPDATE medico 
                  SET nombres = :nombres, apellidos = :apellidos, especialidad = :especialidad, telefono = :telefono, foto = :foto 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":id", $medico->getId());
        $stmt->bindValue(":nombres", $medico->getNombres());
        $stmt->bindValue(":apellidos", $medico->getApellidos());
        $stmt->bindValue(":especialidad", $medico->getEspecialidad());
        $stmt->bindValue(":telefono", $medico->getTelefono());
        $stmt->bindValue(":foto", $medico->getFoto());

        return $stmt->execute();
    }

    public function eliminar($id) {
        $query = "DELETE FROM medico WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>