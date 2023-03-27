import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
//import basicSsl from '@vitejs/plugin-basic-ssl'
//import fs from 'fs';
//const host = 'bta.test';
export default defineConfig({
    plugins: [
//        basicSsl(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
/*
    server: {
        host,
        hmr: { host },
        https: {
            key: fs.readFileSync(`./nginx/certs/${host}.key`),
            cert: fs.readFileSync(`./nginx/certs/${host}.pem`),
        },
        origin: 'https://bta.test',
    },
*/
});
