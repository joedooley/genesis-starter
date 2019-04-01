const mix = require('laravel-mix')
const SmartBannerPlugin = require('smart-banner-webpack-plugin')
const lost = require('lost')
const postcssPresetEnv = require('postcss-preset-env')



/**
 * Mix Asset Management
 *
 * Mix provides a clean, fluent API for defining some Webpack build steps
 * for your Laravel application. By default, we are compiling the Sass
 * file for your application, as well as bundling up your JS files.
 *
 * @link https://github.com/JeffreyWay/laravel-mix
 */
mix
	.js('resources/assets/scripts/main.js', 'dist/scripts')
	.copy('resources/assets/scripts/modules/responsive-menus.js', 'dist/scripts/vendor')
	.copy('node_modules/jquery-backstretch/jquery.backstretch.min.js', 'dist/scripts/vendor')
	.sass('resources/assets/styles/main.scss', './style.css')
	.options({ postCss: [lost, postcssPresetEnv({ stage: 0 })] })
	.disableNotifications()
	.sourceMaps()


/**
 * Browsersync proxy to local dev environment
 */
// mix.browserSync('genesis-starter.test')



/**
 * style.css banner
 *
 * @type {string}
 */
const banner = `Theme Name: Genesis Starter
Theme URI: https://developingdesigns.com/
Description: Custom Genesis starter for child theme development.
Author: Developing Designs
Author URI: https://developingdesigns.com/
Version: 1.0.0
Template: genesis
Text Domain: genesis-starter`


/**
 * Inject `banner` into style.css
 *
 * @link https://github.com/johvin/smart-banner-webpack-plugin
 */
mix.webpackConfig({
	plugins: [
		new SmartBannerPlugin({ banner, include: 'style.css', exclude: ['main.js'] })
	]
})



/**
 * Full Laravel Mix API
 *
 * mix.js(src, output);
 * mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
 * mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
 * mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
 * mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
 * mix.extract(vendorLibs);
 * mix.sass(src, output);
 * mix.less(src, output);
 * mix.stylus(src, output);
 * mix.postCss(src, output, [require('postcss-some-plugin')()]);
 * mix.browserSync('my-site.test');
 * mix.combine(files, destination);
 * mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
 * mix.copy(from, to);
 * mix.copyDirectory(fromDir, toDir);
 * mix.minify(file);
 * mix.sourceMaps(); // Enable sourcemaps
 * mix.version(); // Enable versioning.
 * mix.disableNotifications();
 * mix.setPublicPath('path/to/public');
 * mix.setResourceRoot('prefix/for/resource/locators');
 * mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
 * mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
 * mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
 * mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
 * mix.dump(); <-- Dump the generated webpack config object t the console.
 * mix.extend(name, handler) <-- Extend Mix's API with your own components.
 * mix.options({
 *     extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
 *     globalVueStyles: file, // Variables file to be imported in every component.
 *     processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
 *     purifyCss: false, // Remove unused CSS selectors.
 *     terser: {}, // Terser-specific options. https://github.com/webpack-contrib/terser-webpack-plugin#options
 *     postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
 * });
 */
