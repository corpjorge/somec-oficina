const mix = require('laravel-mix');

mix
    .js('resources/js/pqrs/main.js', 'public/js/pqrs').vue()
    .js('resources/js/clasificados/main.js', 'public/js/clasificados').vue()
    .js('resources/js/clasificadosLista/main.js', 'public/js/clasificadosLista').vue()
    .js('resources/js/eventos/main.js', 'public/js/eventos').vue()
    .js('resources/js/actualizacion/main.js', 'public/js/actualizacion').vue()
    .js('resources/js/directorio/main.js', 'public/js/directorio').vue()
    .js('resources/js/directorioLista/main.js', 'public/js/directorioLista').vue()
    .js('resources/js/admin/pqrs/main.js', 'public/js/admin/pqrs').vue()
    .js('resources/js/admin/clasificados/main.js', 'public/js/admin/clasificados').vue()
    .js('resources/js/admin/eventos/main.js', 'public/js/admin/eventos').vue()
    .js('resources/js/admin/directorio/main.js', 'public/js/admin/directorio').vue()

