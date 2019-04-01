/**
 * Genesis Sample entry point.
 *
 * @package GenesisSample\JS
 * @author  StudioPress
 * @license GPL-2.0-or-later
 */

const genesisSample = ($ => {
	/**
	 * Adjust site inner margin top to compensate for sticky header height.
	 *
	 * @since 2.6.0
	 */
	const moveContentBelowFixedHeader = () => {
		let siteInnerMarginTop = 0
		const siteHeader = $('.site-header')

		if ('fixed' === siteHeader.css('position')) {
			siteInnerMarginTop = siteHeader.outerHeight()
		}

		$('.site-inner').css('margin-top', siteInnerMarginTop)
	}

	const load = () => {
		moveContentBelowFixedHeader()

		$(window).resize(() => {
			moveContentBelowFixedHeader()
		})

		if ('undefined' != typeof wp && 'undefined' != typeof wp.customize) {
			wp.customize.bind('change', setting => {
				setTimeout(() => {
					moveContentBelowFixedHeader()
				},1500)
			})
		}
	}

	return { load }

})(jQuery)

jQuery(window).on('load', genesisSample.load)
