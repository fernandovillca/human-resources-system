# Sistema de Gestión de Recursos Humanos

Sistema de Gestión de Recursos Humanos multiempresa desarrollado con **Laravel + Livewire**.

---

## Tecnologías

- Laravel
- Livewire
- MySQL
- Tailwind CSS

---

## Instalación

Clonar el repositorio:

```bash
git clone https://github.com/fernandovillca/human-resources-system.git
cd human-resources-system
```

Instalar dependencias:

```bash
composer install
```

Configurar entorno:

```bash
cp .env.example .env
php artisan key:generate
```

Ejecutar migraciones:

```bash
php artisan migrate --seed

```

Levantar el servidor:

```bash
php artisan serve
```
