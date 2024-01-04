import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        liveReload(
            ['./resources/**/*.blade.php', './resources/**/*.js'], // Fichiers à surveiller pour le rechargement
            {
                delay: 2, // Optionnel : délai avant le rechargement
            }
        ),
    ],
});
