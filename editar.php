<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once 'config/conexion.php';

$id = intval($_GET['id'] ?? 0);
$mensaje = "";

// Cargar datos actuales del platillo
$stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$platillo = $stmt->get_result()->fetch_assoc();

if (!$platillo) {
    header("Location: admin.php");
    exit;
}

// Guardar cambios al enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dia = trim($_POST['dia']);
    $categoria = trim($_POST['categoria']);
    $nombre = trim($_POST['platillo']);
    $ingredientes = trim($_POST['ingredientes']);
    $calorias = intval($_POST['calorias']);

    if (!empty($dia) && !empty($categoria) && !empty($nombre) && !empty($ingredientes)) {
        $stmt_update = $conn->prepare("UPDATE menu SET dia = ?, categoria = ?, platillo = ?, ingredientes = ?, calorias = ? WHERE id = ?");
        $stmt_update->bind_param("ssssii", $dia, $categoria, $nombre, $ingredientes, $calorias, $id);
        
        if ($stmt_update->execute()) {
            header("Location: admin.php");
            exit;
        } else {
            $mensaje = "Error al actualizar el registro.";
        }
    } else {
        $mensaje = "Por favor complete todos los campos obligatorios.";
    }
}

include 'includes/header.php';
?>

<div class="main-card my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-success mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Platillo del Menú</h4>
        <a href="admin.php" class="btn btn-outline-secondary rounded-pill px-3 btn-sm"><i class="bi bi-arrow-left me-1"></i> Cancelar</a>
    </div>

    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-danger py-2 small mb-3"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" class="bg-white p-4 rounded-4 shadow-sm border">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Día de la semana</label>
                <select name="dia" class="form-select bg-light" required>
                    <?php 
                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                    foreach ($dias as $d): 
                    ?>
                        <option value="<?= $d ?>" <?= $platillo['dia'] == $d ? 'selected' : '' ?>><?= $d ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Categoría / Momento</label>
                <select name="categoria" class="form-select bg-light" required>
                    <?php 
                    $cats = ['Desayuno', 'Almuerzo', 'Cena', 'Snack'];
                    foreach ($cats as $c): 
                    ?>
                        <option value="<?= $c ?>" <?= $platillo['categoria'] == $c ? 'selected' : '' ?>><?= $c ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-8">
                <label class="form-label fw-semibold text-secondary">Nombre del Platillo</label>
                <input type="text" name="platillo" class="form-control bg-light" value="<?= htmlspecialchars($platillo['platillo']) ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold text-secondary">Aporte Calórico (kcal)</label>
                <input type="number" name="calorias" class="form-control bg-light" value="<?= $platillo['calorias'] ?>" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold text-secondary">Ingredientes</label>
                <textarea name="ingredientes" class="form-control bg-light" rows="3" required><?= htmlspecialchars($platillo['ingredientes']) ?></textarea>
            </div>

            <div class="col-12 mt-4 text-end">
                <button type="submit" class="btn btn-add px-4"><i class="bi bi-check-lg me-1"></i> Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>