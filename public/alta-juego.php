<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Juego - Gaming Tec</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <h1>Gaming Tec</h1>
        <nav aria-label="Navegación principal">
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="juegos.php" class="nav-link">Catálogo</a>
            <a href="alta-juego.php" class="nav-link active" aria-current="page">Agregar Juego</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
        </nav>
    </header>

    <main>
        <h2 class="titulo-centrado">Registrar Nuevo Videojuego</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="titulo">Título del Juego</label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ej. Cyberpunk 2077" required>
                <small class="form-help">Nombre comercial completo del videojuego.</small>
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Ej. RPG / Acción" required>
                <small class="form-help">Género principal o plataforma del juego.</small>
            </div>

            <div class="form-group">
                <label for="precio">Precio ($ USD)</label>
                <input type="number" step="0.01" min="0" max="9999" id="precio" name="precio" class="form-control" placeholder="Ej. 59.99" required>
                <small class="form-help">Monto entre 0 y 9999 USD; usa punto decimal si aplica.</small>
            </div>

            <div class="form-group">
                <label for="imagen">URL de la Imagen</label>
                <input type="url" id="imagen" name="imagen" class="form-control" placeholder="https://ejemplo.com/imagen.jpg" required>
                <small class="form-help">Enlace directo válido (https://...) a la portada.</small>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Escribe la descripción del videojuego..." required></textarea>
                <small class="form-help">Resumen breve de jugabilidad, historia o modo de juego.</small>
            </div>

            <button type="submit" class="btn-primary btn-block btn-submit-mt">Guardar Juego</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2026 Gaming Tec - Todos los derechos reservados.</p>
    </footer>
</body>
</html>