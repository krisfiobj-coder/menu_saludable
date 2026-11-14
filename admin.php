<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

require_once 'config/conexion.php';

// Eliminar un platillo del menú
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin.php");
    exit;
}

$resultado = $conn->query("SELECT * FROM menu ORDER BY FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo')");
include 'includes/header.php';
?>

<div class="main-card my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-success mb-1"><i class="bi bi-speedometer2 me-2"></i>Panel de Administración</h4>
            <span class="text-muted small">Administra los platillos activos en tu menú semanal</span>
        </div>
        <a href="index.php" class="btn btn-outline-success rounded-pill px-3 btn-sm"><i class="bi bi-arrow-left me-1"></i> Vista Pública</a>
    </div>

    <div class="bg-white p-3 rounded-4 shadow-sm border">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Día</th>
                        <th>Categoría</th>
                        <th>Platillo / Ensalada</th>
                        <th class="text-center">Calorías</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultado->num_rows > 0): ?>
                        <?php while ($row = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-success-subtle text-success fw-bold px-2 py-1 rounded-pill"><?= $row['dia'] ?></span></td>
                                <td><small class="fw-semibold text-secondary"><?= $row['categoria'] ?></small></td>
                                <td class="fw-bold text-dark"><?= $row['platillo'] ?></td>
                                <td class="text-center"><span class="badge bg-warning-subtle text-dark fw-bold"><?= $row['calorias'] ?> kcal</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary px-3 rounded-pill me-1">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <a href="admin.php?eliminar=<?= $row['id'] ?>" class="btn btn-outline-danger px-3 rounded-pill" onclick="return confirm('¿Seguro que deseas eliminar este platillo del menú?');">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No hay platillos registrados en el menú activo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>