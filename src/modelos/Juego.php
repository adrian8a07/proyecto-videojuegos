<?php
declare(strict_types=1);

require_once __DIR__ . '/Categoria.php';

class Juego {
    private const CAMPOS_OBLIGATORIOS = [
        'id',
        'titulo',
        'categoria',
        'precio',
        'descripcion',
        'stock',
        'imagen'
    ];

    private int $id;
    private string $titulo;
    private Categoria $categoria;
    private float $precio;
    private string $descripcion;
    private int $stock;
    private string $imagen;

    private function __construct(
        int $id,
        string $titulo,
        Categoria $categoria,
        float $precio,
        string $descripcion,
        int $stock,
        string $imagen
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->imagen = $imagen;
    }

    public static function desdeArreglo(array $datos): self {
        foreach (self::CAMPOS_OBLIGATORIOS as $campo) {
            if (!array_key_exists($campo, $datos)) {
                throw new InvalidArgumentException("Falta el campo obligatorio en Juego: {$campo}");
            }
        }

        if ((float)$datos['precio'] < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }

        if ((int)$datos['stock'] < 0) {
            throw new InvalidArgumentException("El stock no puede ser negativo.");
        }

        // Si 'categoria' viene como texto (como en tu datos.json actual), la convierte en objeto Categoria
        if ($datos['categoria'] instanceof Categoria) {
            $categoriaObj = $datos['categoria'];
        } elseif (is_array($datos['categoria'])) {
            $categoriaObj = Categoria::desdeArreglo($datos['categoria']);
        } else {
            $nombreCat = (string)$datos['categoria'];
            $categoriaObj = Categoria::desdeArreglo([
                'id' => 0,
                'nombre' => $nombreCat,
                'descripcion' => 'Categoría ' . $nombreCat,
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nombreCat), '-')),
                'activa' => true
            ]);
        }

        return new self(
            (int)$datos['id'],
            (string)$datos['titulo'],
            $categoriaObj,
            (float)$datos['precio'],
            (string)$datos['descripcion'],
            (int)$datos['stock'],
            (string)$datos['imagen']
        );
    }

    // Métodos de consulta por propiedad (Getters)
    public function obtenerId(): int {
        return $this->id;
    }

    public function obtenerTitulo(): string {
        return $this->titulo;
    }

    public function obtenerCategoria(): Categoria {
        return $this->categoria;
    }

    public function obtenerPrecio(): float {
        return $this->precio;
    }

    public function obtenerDescripcion(): string {
        return $this->descripcion;
    }

    public function obtenerStock(): int {
        return $this->stock;
    }

    public function obtenerImagen(): string {
        return $this->imagen;
    }

    // Dos métodos de comportamiento
    public function hayDisponibilidad(): bool {
        return $this->stock > 0;
    }

    public function obtenerPrecioFormateado(): string {
        return '$' . number_format($this->precio, 2) . ' USD';
    }

    public function calcularPrecioConDescuento(float $porcentaje): float {
        if ($porcentaje <= 0 || $porcentaje >= 100) {
            return $this->precio;
        }
        return $this->precio - ($this->precio * ($porcentaje / 100));
    }
}