# Genesis Starter
Custom Genesis starter for child theme development. Starter theme utilizes composer for PSR-4 autoloading and webpack
for asset compilation and hot module reloading.

- - -

## Installation

1. Clone `genesis-starter` to `wp-content/themes` directory.
	1. `git clone git@github.com:joedooley/genesis-starter.git`
1. Rename child theme, update `style.css` banner config in the `webpack.mix.js` file, and update all namespaces.
	1. ie... Change namespaces from `DevDesigns\GenesisStarter` to `YourCompany\ChildThemeName`
	1. Don't forget to change the namespace in `autoload.psr-4` in `composer.json` 
1. Run `npm install` from plugin root directory.
	1. The postinstall npm script runs `composer install` automatically.
1. During development:
	1. run `npm run watch`, `npm run hot`, or `npm run dev` to start compiling assets with webpack.
1. During production:
	1. run `npm run production` to compile minified assets to child theme `dist` directory.


## Notes
- All class files in the `src` directory will be autoloaded by composer.
- Composer will not autoload PHP files that are not classes unless you add each file to the files array
in your `composer.json`. You will have to run `composer update` as well.
- If your not utilizing CI in your deployments remove composer's `vendor` directory
from `.gitignore` and commit the entire `vendor` directory into version control.
