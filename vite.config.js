import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const publicHost = env.VITE_DEV_PUBLIC_HOST || 'localhost';
    // Originea din browser unde rulează Laravel (nginx) — altfel CORS blochează @vite/client de pe alt port/host
    const extraOrigins = env.VITE_APP_ORIGIN
        ? env.VITE_APP_ORIGIN.split(',').map((s) => s.trim()).filter(Boolean)
        : [];
    const appOrigins = [
        ...new Set([
            ...extraOrigins,
            `http://${publicHost}:8081`,
            'http://localhost:8081',
            'http://127.0.0.1:8081',
        ]),
    ];

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        server: {
            host: '0.0.0.0',
            port: 5173,
            strictPort: true,
            origin: `http://${publicHost}:5173`,
            // Fără asta, răspunsurile Vite trimit Access-Control-Allow-Origin: http://localhost:5173 și browserul respinge cererile de pe :8081
            cors: {
                origin: appOrigins,
                credentials: true,
            },
            hmr: {
                host: publicHost,
                port: 5173,
            },
            watch: {
                usePolling: true,
            },
        },
    };
});
