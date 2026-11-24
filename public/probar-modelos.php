<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/modelos/Categoria.php';
require_once __DIR__ . '/../src/modelos/Juego.php';

echo "<pre>";

// 1. Probar Categoria con desdeArreglo
$rpg = Categoria::desdeArreglo([
    'id' => 1,
    'nombre' => 'RPG / Acción',
    'descripcion' => 'Juegos de rol y aventura',
    'slug' => 'rpg-accion',
    'activa' => true
]);

echo "=== PRUEBA CATEGORÍA ===\n";
echo "Nombre: " . $rpg->obtenerNombre() . "\n";
echo "Estado: " . $rpg->obtenerEtiquetaEstado() . "\n";
echo "URL Filtro: " . $rpg->obtenerUrlFiltro() . "\n\n";

// 2. Probar Juego con desdeArreglo
$cyberpunk = Juego::desdeArreglo([
    'id' => 1,
    'titulo' => 'Cyberpunk 2077',
    'categoria' => $rpg,
    'precio' => 59.99,
    'descripcion' => 'RPG de acción y aventura de mundo abierto ambientado en Night City.',
    'stock' => 10,
    'imagen' => 'https://ejemplo.com/cyberpunk.jpg'
]);

echo "=== PRUEBA JUEGO ===\n";
echo "Título: " . $cyberpunk->obtenerTitulo() . "\n";
echo "Categoría: " . $cyberpunk->obtenerCategoria()->obtenerNombre() . "\n";
echo "Precio normal: " . $cyberpunk->obtenerPrecioFormateado() . "\n";
echo "Precio con 25% desc: $" . number_format($cyberpunk->calcularPrecioConDescuento(25), 2) . " USD\n";
echo "¿Disponible?: " . ($cyberpunk->hayDisponibilidad() ? 'Sí (' . $cyberpunk->obtenerStock() . ' en stock)' : 'Agotado') . "\n";

echo "</pre>";