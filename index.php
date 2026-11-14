<?php
require_once 'config/conexion.php';
include 'includes/header.php';

// Cargar catálogo de platillos para el selector
$catalogo_sql = "SELECT * FROM catalogo_platillos ORDER BY FIELD(categoria, 'Desayuno', 'Almuerzo', 'Cena', 'Snack'), nombre";
$catalogo_res = $conn->query($catalogo_sql);

// Filtros de búsqueda
$filtro_dia = $_GET['dia'] ?? '';
$filtro_categoria = $_GET['categoria'] ?? '';

$sql = "SELECT * FROM menu WHERE 1=1";
if (!empty($filtro_dia)) {
    $sql .= " AND dia = '" . $conn->real_escape_string($filtro_dia) . "'";
}
if (!empty($filtro_categoria)) {
    $sql .= " AND categoria = '" . $conn->real_escape_string($filtro_categoria) . "'";
}
$sql .= " ORDER BY FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'), FIELD(categoria, 'Desayuno', 'Almuerzo', 'Cena', 'Snack')";
$resultado = $conn->query($sql);
?>

<div class="main-card">
    <!-- BANNER HEALTHY LIVING -->
    <div class="bg-white p-4 rounded-4 shadow-sm border mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 mb-3 mb-md-0">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2">
                    <i class="bi bi-activity me-1"></i> Nutrición Activa & Bienestar
                </span>
                <h1 class="fw-bold text-success mb-2" style="font-family: 'Playfair Display', serif; font-size: 2.2rem;">
                    Planifica Tu Alimentación Semanal
                </h1>
                <p class="text-muted leading-relaxed mb-3">
                    El secreto de una vida plena es la organización. Con <strong class="text-success">Healthy Living</strong> puedes estructurar tu menú diario seleccionando opciones de nuestro catálogo especializado de ensaladas y platillos frescos, ricos en fibra y nutrientes.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <span class="small fw-semibold text-secondary"><i class="bi bi-check-circle-fill text-success me-1"></i> 100% Balanceado</span>
                    <span class="small fw-semibold text-secondary"><i class="bi bi-check-circle-fill text-success me-1"></i> Control Calórico</span>
                    <span class="small fw-semibold text-secondary"><i class="bi bi-check-circle-fill text-success me-1"></i> Recetas Orgánicas</span>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&q=80&w=600" class="img-fluid rounded-4 shadow-sm border" alt="Meal prep de ensaladas saludables">
            </div>
        </div>
    </div>

    <!-- ENCABEZADO PRINCIPAL -->
    <div class="header-banner mb-4">
        <div class="subtitle mb-1">ORGANIZÁ TUS COMIDAS</div>
        <h1>Menú Saludable de la Semana</h1>
    </div>

    <!-- FORMULARIO DE REGISTRO CON TODOS LOS DÍAS -->
    <div class="bg-white p-3 rounded-4 mb-4 border shadow-sm">
        <form action="guardar_platillo.php" method="POST" class="row g-2 align-items-center">
            <div class="col-md-3">
                <select name="dia" class="form-select border-0 bg-light" required>
                    <option value="Lunes">Día: Lunes</option>
                    <option value="Martes">Día: Martes</option>
                    <option value="Miércoles">Día: Miércoles</option>
                    <option value="Jueves">Día: Jueves</option>
                    <option value="Viernes">Día: Viernes</option>
                    <option value="Sábado">Día: Sábado</option>
                    <option value="Domingo">Día: Domingo</option>
                </select>
            </div>
            <div class="col-md-7">
                <select name="platillo_id" class="form-select border-0 bg-light" required>
                    <option value="">-- Selecciona Desayuno, Almuerzo o Cena --</option>
                    <?php if ($catalogo_res->num_rows > 0): ?>
                        <?php while ($platillo = $catalogo_res->fetch_assoc()): ?>
                            <option value="<?= $platillo['id'] ?>">
                                [<?= strtoupper($platillo['categoria']) ?>] <?= $platillo['nombre'] ?> (<?= $platillo['calorias'] ?> kcal)
                            </option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-add w-100">+ Añadir</button>
            </div>
        </form>
    </div>

    <!-- FILTROS COMPLETOS (DÍAS + COMIDAS) -->
    <div class="d-flex justify-content-between align-items-center mb-3 px-2 flex-wrap gap-2">
        <span class="fw-bold text-success text-uppercase small"><i class="bi bi-funnel me-1"></i> Comidas Planificadas</span>
        <form method="GET" class="d-flex gap-2">
            <select name="dia" class="form-select form-select-sm border-0 bg-white shadow-sm" onchange="this.form.submit()">
                <option value="">Todos los días</option>
                <option value="Lunes" <?= $filtro_dia == 'Lunes' ? 'selected' : '' ?>>Lunes</option>
                <option value="Martes" <?= $filtro_dia == 'Martes' ? 'selected' : '' ?>>Martes</option>
                <option value="Miércoles" <?= $filtro_dia == 'Miércoles' ? 'selected' : '' ?>>Miércoles</option>
                <option value="Jueves" <?= $filtro_dia == 'Jueves' ? 'selected' : '' ?>>Jueves</option>
                <option value="Viernes" <?= $filtro_dia == 'Viernes' ? 'selected' : '' ?>>Viernes</option>
                <option value="Sábado" <?= $filtro_dia == 'Sábado' ? 'selected' : '' ?>>Sábado</option>
                <option value="Domingo" <?= $filtro_dia == 'Domingo' ? 'selected' : '' ?>>Domingo</option>
            </select>
            <select name="categoria" class="form-select form-select-sm border-0 bg-white shadow-sm" onchange="this.form.submit()">
                <option value="">Todas las comidas</option>
                <option value="Desayuno" <?= $filtro_categoria == 'Desayuno' ? 'selected' : '' ?>>Desayuno</option>
                <option value="Almuerzo" <?= $filtro_categoria == 'Almuerzo' ? 'selected' : '' ?>>Almuerzo</option>
                <option value="Cena" <?= $filtro_categoria == 'Cena' ? 'selected' : '' ?>>Cena</option>
            </select>
        </form>
    </div>

    <!-- LISTADO DE PLATILLOS -->
    <div class="menu-list">
        <?php if ($resultado->num_rows > 0): ?>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <?php 
                    $img = !empty($row['imagen']) ? $row['imagen'] : 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=300&auto=format&fit=crop'; 
                ?>
                <div class="menu-item">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="<?= $img ?>" class="food-img" alt="<?= $row['platillo'] ?>">
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-success text-white fw-bold px-2 py-1 rounded-pill" style="font-size: 0.75rem;"><?= $row['dia'] ?></span>
                                <span class="badge bg-warning-subtle text-dark fw-bold px-2 py-1 rounded-pill" style="font-size: 0.75rem; border: 1px solid #ffe082;">
                                    ☀️ <?= strtoupper($row['categoria']) ?>
                                </span>
                            </div>
                            <h5 class="item-title mb-1"><?= $row['platillo'] ?></h5>
                            <p class="item-ingredients mb-0"><?= $row['ingredientes'] ?></p>
                        </div>
                        <div class="col-auto text-end">
                            <div class="item-value"><?= $row['calorias'] ?> <span class="fs-6 fw-normal text-muted">kcal</span></div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-journal-x fs-1 text-muted d-block mb-2"></i>
                <p class="text-muted">No hay comidas agregadas. Selecciona un día y una opción arriba para comenzar.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>