<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$json = file_get_contents('../datos/datos.json');
$juegos = json_decode($json, true);

$juegoSeleccionado = null;
foreach ($juegos as $juego) {
    if ($juego['id'] === $id) {
        $juegoSeleccionado = $juego;
        break;
    }
}

if (!$juegoSeleccionado) {
    $juegoSeleccionado = $juegos[0];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($juegoSeleccionado['titulo']); ?> - Gaming Tec</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Gaming Tec</h1>
        <nav aria-label="Navegación principal">
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="juegos.php" class="nav-link">Catálogo</a>
            <a href="alta-juego.php" class="nav-link">Agregar Juego</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
        </nav>
    </header>

    <main>
        <div class="card-producto detalle-card">
            <img src="<?php echo htmlspecialchars($juegoSeleccionado['imagen']); ?>" alt="<?php echo htmlspecialchars($juegoSeleccionado['titulo']); ?>" class="card-img-large">
            <span class="badge"><?php echo htmlspecialchars($juegoSeleccionado['categoria']); ?></span>
            <h2 class="detalle-titulo"><?php echo htmlspecialchars($juegoSeleccionado['titulo']); ?></h2>
            <p class="detalle-descripcion"><?php echo htmlspecialchars($juegoSeleccionado['descripcion']); ?></p>
            <p class="card-price detalle-precio">$<?php echo number_format($juegoSeleccionado['precio'], 2); ?></p>
            <div class="acciones-detalle">
                <a href="#" class="btn-primary">Comprar Ahora</a>
                <a href="juegos.php" class="btn-secondary">Volver al Catálogo</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Gaming Tec - Todos los derechos reservados.</p>
    </footer>
</body>
</html>