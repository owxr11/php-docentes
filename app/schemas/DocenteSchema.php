<?php 
class DocenteSchema {
    public static function validateCreate(array $data): array {
        $errors = [];
        $requiredFields = [
            'nombre', 'apaterno', 'direccion', 'telefono', 'ciudad', 'estado', 'usuario', 'password'
        ];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || trim((string)$data[$field]) === '') {
                $errors[$field] = "El campo {$field} es obligatorio"; 
            }
        }

        if (isset($data['telefono']) && strlen((string)$data['telefono']) < 10) {
            $errors['telefono'] = 'El teléfono debe de tener al menos 10 caracteres';
        }

        // Fix: was using $data['telefono'] instead of $data['usuario']
        if (isset($data['usuario']) && strlen((string)$data['usuario']) < 4) {
            $errors['usuario'] = 'El usuario debe de tener al menos 4 caracteres';
        }

        if (isset($data['password']) && strlen((string)$data['password']) < 6) {
            $errors['password'] = 'El password debe de tener al menos 6 caracteres';
        }

        return $errors; 
    }

    public static function validateUpdate(array $data): array {
        $errors = [];

        
        if (isset($data['nombre']) && trim((string)$data['nombre']) === '') {
            $errors['nombre'] = 'El nombre no puede ser vacío';
        }

        if (isset($data['apaterno']) && trim((string)$data['apaterno']) === '') {
            $errors['apaterno'] = 'El apaterno no puede ser vacío'; 
        }

        if (isset($data['telefono']) && strlen((string)$data['telefono']) < 10) {
            $errors['telefono'] = 'El teléfono debe de tener al menos 10 caracteres';
        }

        // Fix: was using $data['telefono'] instead of $data['usuario']
        if (isset($data['usuario']) && strlen((string)$data['usuario']) < 4) {
            $errors['usuario'] = 'El usuario debe de tener al menos 4 caracteres';
        }

        if (isset($data['password']) && strlen((string)$data['password']) < 6) {
            $errors['password'] = 'El password debe de tener al menos 6 caracteres';
        }

        if (isset($data['activo']) && !is_bool($data['activo'])) {
            $errors['activo'] = 'El campo activo debe ser booleano';
        }

        return $errors; 
    }
}
?>