<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Living - Tu Planificador de Ensaladas y Menú Saludable</title>
    <!-- Fuentes Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #e5eae1; 
            font-family: 'Poppins', sans-serif; 
            color: #1e3d2f;
        }
        .main-card {
            background-color: #f3f5ee;
            border-radius: 28px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.06);
            padding: 30px;
            max-width: 850px;
            margin: auto;
        }
        .header-banner {
            background-color: #2a5a3f;
            color: #ffffff;
            border-radius: 22px;
            padding: 25px 20px;
            text-align: center;
        }
        .header-banner h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 0;
            line-height: 1.1;
        }
        .header-banner .subtitle {
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.9;
        }
        .menu-item {
            border-bottom: 1px solid #d2dbc9;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .menu-item:last-child {
            border-bottom: none;
        }
        .food-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
        .item-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: #1a432e;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 1.1rem;
        }
        .item-ingredients {
            color: #4a6355;
            font-size: 0.92rem;
            line-height: 1.4;
        }
        .item-value {
            font-weight: 800;
            font-size: 1.35rem;
            color: #1a432e;
            white-space: nowrap;
        }
        .btn-add {
            background-color: #2a5a3f;
            color: white;
            border-radius: 12px;
            font-weight: 600;
        }
        .btn-add:hover {
            background-color: #1e412d;
            color: white;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Navbar con el botón "Mi Cuenta Healthy" -->
    <div class="d-flex justify-content-between align-items-center max-width-container mb-3 px-2" style="max-width: 850px; margin: auto;">
        <a href="index.php" class="fw-bold text-success text-decoration-none fs-5" style="font-family: 'Playfair Display', serif;">
            <i class="bi bi-flower1 me-1"></i> Healthy Living
        </a>
        <div>
            <?php if (isset($_SESSION['admin'])): ?>
                <a href="admin.php" class="btn btn-sm btn-outline-success rounded-pill me-1"><i class="bi bi-speedometer2 me-1"></i> Panel Admin</a>
                <a href="logout.php" class="btn btn-sm btn-dark rounded-pill"><i class="bi bi-box-arrow-right me-1"></i> Salir</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-person-fill me-1"></i> Mi Cuenta Healthy</a>
            <?php endif; ?>
        </div>
    </div>