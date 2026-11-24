<?php
$json = file_get_contents('../datos/datos.json');
$juegos = json_decode($json, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Gaming Tec</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Gaming Tec</h1>
        <nav aria-label="Navegación principal">
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="juegos.php" class="nav-link active" aria-current="page">Catálogo</a>
            <a href="alta-juego.php" class="nav-link">Agregar Juego</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
        </nav>
    </header>

    <main>
        <h2>Catálogo de Videojuegos</h2>
        <div class="grid">
            <?php foreach ($juegos as $juego): ?>
                <article class="card-producto">
                    <div>
                        <img src="<?php echo htmlspecialchars($juego['imagen']); ?>" alt="<?php echo htmlspecialchars($juego['titulo']); ?>" class="card-img">
                        <span class="badge"><?php echo htmlspecialchars($juego['categoria']); ?></span>
                        <h3 class="card-title"><?php echo htmlspecialchars($juego['titulo']); ?></h3>
                    </div>
                    <div>
                        <p class="card-price">$<?php echo number_format($juego['precio'], 2); ?></p>
                        <a href="juego-detalle.php?id=<?php echo $juego['id']; ?>" class="btn-primary btn-block">Ver detalle</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Gaming Tec - Todos los derechos reservados.</p>
    </footer>
</body>
</html>