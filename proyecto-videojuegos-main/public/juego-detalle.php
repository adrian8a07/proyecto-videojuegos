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
        <nav>
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="juegos.php" class="nav-link">Catálogo</a>
            <a href="alta-juego.php" class="nav-link">Agregar Juego</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
        </nav>
    </header>

    <main>
        <div class="card-producto" style="max-width: 750px; margin: 0 auto;">
            <img src="<?php echo htmlspecialchars($juegoSeleccionado['imagen']); ?>" alt="<?php echo htmlspecialchars($juegoSeleccionado['titulo']); ?>" class="card-img-large">
            <span class="badge"><?php echo htmlspecialchars($juegoSeleccionado['categoria']); ?></span>
            <h2 style="font-size: 2rem; margin: 0.5rem 0;"><?php echo htmlspecialchars($juegoSeleccionado['titulo']); ?></h2>
            <p style="color: var(--text-muted); margin-bottom: 1.5rem; font-size: 1.05rem;"><?php echo htmlspecialchars($juegoSeleccionado['descripcion']); ?></p>
            <p class="card-price" style="font-size: 2rem;">$<?php echo number_format($juegoSeleccionado['precio'], 2); ?></p>
            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <a href="#" class="btn-primary" style="flex: 1;">Comprar Ahora</a>
                <a href="juegos.php" class="btn-secondary" style="flex: 1;">Volver al Catálogo</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Gaming Tec - Todos los derechos reservados.</p>
    </footer>
</body>
</html>