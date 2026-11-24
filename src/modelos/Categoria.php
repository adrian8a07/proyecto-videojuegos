<?php
declare(strict_types=1);

class Categoria {
    private const CAMPOS_OBLIGATORIOS = [
        'id',
        'nombre',
        'descripcion',
        'slug',
        'activa'
    ];

    private int $id;
    private string $nombre;
    private string $descripcion;
    private string $slug;
    private bool $activa;

    private function __construct(
        int $id,
        string $nombre,
        string $descripcion,
        string $slug,
        bool $activa
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->slug = $slug;
        $this->activa = $activa;
    }

    public static function desdeArreglo(array $datos): self {
        foreach (self::CAMPOS_OBLIGATORIOS as $campo) {
            if (!array_key_exists($campo, $datos)) {
                throw new InvalidArgumentException("Falta el campo obligatorio en Categoria: {$campo}");
            }
        }

        if (trim((string)$datos['nombre']) === '') {
            throw new InvalidArgumentException("El nombre de la categoría no puede estar vacío.");
        }

        return new self(
            (int)$datos['id'],
            (string)$datos['nombre'],
            (string)$datos['descripcion'],
            (string)$datos['slug'],
            (bool)$datos['activa']
        );
    }

    // Métodos de consulta por propiedad (Getters)
    public function obtenerId(): int {
        return $this->id;
    }

    public function obtenerNombre(): string {
        return $this->nombre;
    }

    public function obtenerDescripcion(): string {
        return $this->descripcion;
    }

    public function obtenerSlug(): string {
        return $this->slug;
    }

    public function esActiva(): bool {
        return $this->activa;
    }

    // Dos métodos de comportamiento
    public function obtenerEtiquetaEstado(): string {
        return $this->activa ? 'Disponible' : 'Oculta';
    }

    public function obtenerUrlFiltro(): string {
        return 'juegos.php?categoria=' . urlencode($this->slug);
    }
}