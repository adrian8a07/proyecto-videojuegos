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
        <nav>
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="juegos.php" class="nav-link">Catálogo</a>
            <a href="alta-juego.php" class="nav-link active">Agregar Juego</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
        </nav>
    </header>

    <main>
        <h2 style="text-align: center; margin-bottom: 2rem;">Registrar Nuevo Videojuego</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="titulo">Título del Juego</label>
                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ej. Cyberpunk 2077" required>
            </div>
            
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Ej. RPG / Acción" required>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio ($ USD)</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" placeholder="Ej. 59.99" required>
            </div>
            
            <div class="form-group">
                <label for="imagen">URL de la Imagen</label>
                <input type="url" id="imagen" name="imagen" class="form-control" placeholder="https://ejemplo.com/imagen.jpg" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Escribe la descripción del videojuego..." required></textarea>
            </div>
            
            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 1rem;">Guardar Juego</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2026 Gaming Tec - Todos los derechos reservados.</p>
    </footer>
</body>
</html>