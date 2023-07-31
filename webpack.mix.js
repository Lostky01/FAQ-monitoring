const mix = require('laravel-mix');

mix.js('resources/js/components/cari.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
      resolve: {
         extensions: ['.js', '.jsx'],
      },
      optimization: {
         usedExports: true,
         sideEffects: true,
         concatenateModules: true,
         minimize: true,
      },
   });
