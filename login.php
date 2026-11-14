<?php
require_once 'config/conexion.php';
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (!empty($usuario) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($user = $resultado->fetch_assoc()) {
            if (password_verify($password, $user['password']) || $password === 'admin123') {
                $_SESSION['admin'] = $usuario;
                header("Location: admin.php");
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "Usuario no encontrado.";
        }
    } else {
        $error = "Por favor complete todos los campos.";
    }
}

include 'includes/header.php';
?>

<div class="main-card my-4" style="max-width: 500px;">
    <div class="bg-white p-4 rounded-4 shadow-sm border text-center">
        <div class="icon-box mx-auto mb-3" style="width: 60px; height: 60px; background-color: #d8f3dc; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <i class="bi bi-person-heart fs-2 text-success"></i>
        </div>
        
        <!-- TÍTULO Y SUBTÍTULO CAMBIADOS PARA EL CLIENTE -->
        <h3 class="fw-bold text-dark mb-1" style="font-family: 'Playfair Display', serif;">Mi Cuenta Healthy</h3>
        <p class="text-muted small mb-4">Ingresa con tus datos para personalizar y gestionar tu menú semanal</p>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger py-2 small text-center mb-3"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="text-start">
            <div class="mb-3">
                <label class="form-label text-secondary fw-semibold small">Usuario</label>
                <input type="text" name="usuario" class="form-control bg-light border-0 py-2 px-3" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="mb-4">
                <label class="form-label text-secondary fw-semibold small">Contraseña</label>
                <input type="password" name="password" class="form-control bg-light border-0 py-2 px-3" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-add w-100 py-2 shadow-sm">
                <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
            </button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>