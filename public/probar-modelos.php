<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/modelos/Categoria.php';
require_once __DIR__ . '/../src/modelos/Juego.php';

// 1. Crear categoría desde arreglo
$rpg = Categoria::desdeArreglo([
    'id' => 1,
    'nombre' => 'RPG / Acción',
    'descripcion' => 'Juegos de rol y aventura de mundo abierto',
    'slug' => 'rpg-accion',
    'activa' => true
]);

echo "Categoría: " . $rpg->obtenerNombre() . " (" . $rpg->obtenerEtiquetaEstado() . ")<br>";
echo "Enlace: " . $rpg->obtenerUrlFiltro() . "<br>";
echo "----------------------------------------<br>";

// 2. Crear juego desde arreglo
$juego = Juego::desdeArreglo([
    'id' => 1,
    'titulo' => 'Cyberpunk 2077',
    'categoria' => $rpg,
    'precio' => 59.99,
    'descripcion' => 'RPG de acción y aventura ambientado en Night City.',
    'stock' => 25,
    'imagen' => 'https://placehold.co/200x150?text=Cyberpunk'
]);

echo $juego->obtenerTitulo()
    . " (" . $juego->obtenerCategoria()->obtenerNombre() . ") y cuesta "
    . $juego->obtenerPrecioFormateado() . "<br>";

echo $juego->estaDisponible() ? "Existe juego en inventario" : "Agotado";