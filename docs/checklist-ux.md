# Hallazgos de Gaming Tec (docs/checklist-ux.md)

Tareas evaluadas: (a) encontrar un videojuego en el catálogo, (b) abrir su ficha y regresar al catálogo, (c) registrar un videojuego nuevo o contactar. Recorridas en escritorio y en 375 px. Los hallazgos con prioridad "Sí" son los que se corrigen en esta etapa.

| # | Heurística | Dónde ocurre | Sev. | Mejora (como acción) | Prioridad |
|---|---|---|---|---|---|
| 1 | H4 Consistencia y estándares | index.php y contacto.php enlazan assets/css/estilo.css, y el selector de reset en estilos.css usa - en vez de * | 4 | Unifica assets/css/estilos.css en todas las vistas y corrige el reset a * | Sí |
| 2 | H4 Consistencia y estándares | Menú principal: index.php y contacto.php omiten Agregar Juego, y en juegos.php falta aria-current="page" | 3 | Incluye los 4 enlaces en todas las vistas y agrega aria-current="page" al enlace activo | Sí |
| 3 | H5 Prevención de errores y H10 Ayuda | alta-juego.php: precio sin límite mínimo visible, sin texto de ayuda y con botones/acciones sin envolver en 375 px | 3 | Agrega min="0" y max="9999", una línea de ayuda bajo cada campo y ajuste en 375 px | Sí |
| 4 | Accesibilidad (375 px y foco) | estilos.css y juego-detalle.php: falta :focus-visible y los botones en fila pueden apretarse o desbordarse en 375 px | 3 | Agrega :focus-visible en estilos.css y permite envolver o apilar botones en pantallas de 375 px | Sí |
| 5 | H3 Control y libertad | juego-detalle.php: el botón Comprar Ahora apunta a # y falta una ruta de migas de pan | 3 | Agrega una ruta de migas de pan y define una acción o retroalimentación clara | No |
| 6 | H10 Ayuda y documentación | contacto.php: dice "¡Contáctanos!" pero no muestra correo, teléfono ni formulario | 3 | Agrega un medio de contacto visible (correo o formulario) en contacto.php | No |
| 7 | H1 Visibilidad del estado | alta-juego.php: al enviar (action="#") no muestra confirmación ni guarda registros | 3 | Resuelve el envío y persistencia con servidor/PHP en la Unidad III | No |
| 8 | H2 Relación con el mundo real | juego-detalle.php: muestra $ sin indicar explícitamente la moneda como en el formulario | 2 | Indica la moneda de forma consistente junto al precio | No |
```[cite: 1, 8, 9]

Cuando ya la tengas lista, dime y pasamos al **primer archivo de código** que quieras revisar.