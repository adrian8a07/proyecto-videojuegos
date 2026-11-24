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

    private static function exigirCampos(array $registro): void {
        foreach (self::CAMPOS_OBLIGATORIOS as $campo) {
            if (!array_key_exists($campo, $registro)) {
                throw new InvalidArgumentException("El juego no tiene el campo: " . $campo);
            }
        }
    }

    public static function desdeArreglo(array $registro): self {
        self::exigirCampos($registro);

        $categoriaObj = $registro['categoria'] instanceof Categoria
            ? $registro['categoria']
            : Categoria::desdeArreglo($registro['categoria']);

        return new self(
            (int)$registro['id'],
            (string)$registro['titulo'],
            $categoriaObj,
            (float)$registro['precio'],
            (string)$registro['descripcion'],
            (int)$registro['stock'],
            (string)$registro['imagen']
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

    // Métodos de comportamiento
    public function estaDisponible(): bool {
        return $this->stock > 0;
    }

    public function obtenerPrecioFormateado(): string {
        return '$' . number_format($this->precio, 2);
    }
}