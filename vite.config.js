import path from 'path';
import { fileURLToPath, URL } from "node:url";
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin';
import * as glob from "glob";
import { analyzer } from "vite-bundle-analyzer";

// const input = Object.fromEntries(
//     glob.sync(['resources/scss/app.scss','resources/js/pages/**/*.js']).map(file => [

//         // This remove `resources/js/pages/` as well as the file extension from each file, so e.g.
//         // resources/js/pages/nested/foo.js becomes nested/foo
//         path.relative('resources/js/pages', file.slice(0, file.length - path.extname(file).length)),
//         fileURLToPath(new URL(file, import.meta.url))
//     ])
// );


// const input = Object.fromEntries(
//     ['resources/sass/app.scss', fileURLToPath(new URL('resources/sass/app.scss', import.meta.url))],
//     ...glob.sync([
// 		'resources/scss/app.scss',
// 		'resources/js/pages/**/*.js',
// 	]).map(file => {
// 		const ext = path.extname(file)
// 		const from = ext === '.js' ? 'resources/js/pages' : 'resources/scss'
// 		return [
// 			// This remove `resources/js/` as well as the file extension from each file, so e.g.
// 			// resources/js/nested/foo.js becomes nested/foo
// 			path.relative(from, file.slice(0, file.length - ext.length)),
// 			fileURLToPath(new URL(file, import.meta.url))
// 		]
// 	})
// )

const input = Object.fromEntries(
    [
        // Add the 'resources/sass/app.scss' path as the first entry
        // ['resources/sass/app.scss', fileURLToPath(new URL('resources/sass/app.scss', import.meta.url))],
        ...glob.sync('resources/js/pages/**/*.js').map(file => [
            // This removes 'resources/js/pages/' and the file extension from each file
            path.relative('resources/js/pages', file.slice(0, file.length - path.extname(file).length)),
            fileURLToPath(new URL(file, import.meta.url))
        ]),
        ...glob.sync('resources/sass/app.scss').map(file => [
            path.relative('resources/sass', file.slice(0, file.length - path.extname(file).length)),
            fileURLToPath(new URL(file, import.meta.url))
        ])
    ]
);

export default defineConfig({
    plugins: [
        laravel({
            input,
            refresh: true,
        }),
        analyzer({
            analyzerMode: "static", // 使用静态模式，会生成一个可以直接打开的html文件
            fileName: "report" // 生成Html的名称
          }),
          vue(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~bootstrap-icons': path.resolve(__dirname, 'node_modules/bootstrap-icons'),
            "@": fileURLToPath(new URL("./src", import.meta.url))
        }
    },
    build: {
        rollupOptions: {
            output: {
                // dir: 'public/build/',
                // entryFileNames: 'app.js',
                // assetFileNames: 'app.css',
                // chunkFileNames: 'app.js',
                // manualChunks: undefined,
                assetFileNames: (assetInfo) => {
                    // Get file extension
                    // TS shows asset name can be undefined so I'll check it and create directory named `compiled` just to be safe
                    let extension = assetInfo.name?.split('.').at(1) ?? 'compiled'


                    // This is optional but may be useful (I use it a lot)
                    // All images (png, jpg, etc) will be compiled within `images` directory,
                    // all svg files within `icons` directory
                    if (/png|jpe?g|gif|tiff|bmp|ico/i.test(extension)) {
                        extension = 'images'
                    }

                    // if (/svg/i.test(extension)) {
                    //     extension = 'icons'
                    // }

                    // Basically this is CSS output (in your case)
                    return `${extension}/[name][extname]`
                },
                chunkFileNames: 'js/chunks/[name].js', // all chunks output path
                entryFileNames: 'js/[name].js', // all entrypoints output path
            },
            
        },
        sourcemap: true,
    }
});
