/* IGI — fixed header scroll state. The bar starts transparent over a dark hero
   and turns solid (.is-solid) once scrolled past ~60px. Pages without a dark
   hero (no `has-dark-hero` on <body>) are solid from the first paint. */
( function () {
	'use strict';

	var header = document.querySelector( '.igi-header' );
	if ( ! header ) { return; }

	// Pages WITH a dark hero start transparent and flip to solid on scroll.
	// Everything else (light templates) is solid from load.
	var hasDarkHero = document.body.classList.contains( 'has-dark-hero' );
	var ticking = false;

	function apply() {
		var solid = ! hasDarkHero || window.pageYOffset > 60;
		header.classList.toggle( 'is-solid', solid );
		ticking = false;
	}

	function onScroll() {
		if ( ! ticking ) {
			ticking = true;
			window.requestAnimationFrame( apply );
		}
	}

	apply(); // Set the correct state immediately (no transparent flash on load).
	window.addEventListener( 'scroll', onScroll, { passive: true } );
	window.addEventListener( 'resize', onScroll, { passive: true } );

	/* --- mobile menu toggle ---
	   The hamburger persists (no close-X swap): it opens and closes the dark
	   dropdown panel. CSS only reveals the panel below the breakpoint, so this
	   wiring is harmless on desktop where the nav is inline. */
	var toggle = header.querySelector( '.igi-menu-toggle' );
	var nav = document.getElementById( 'igi-nav' );

	if ( toggle && nav ) {
		var setMenu = function ( open ) {
			toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
			toggle.setAttribute( 'aria-label', open ? 'Close menu' : 'Open menu' );
			nav.classList.toggle( 'is-open', open );
			header.classList.toggle( 'is-menu-open', open );
		};

		toggle.addEventListener( 'click', function () {
			setMenu( toggle.getAttribute( 'aria-expanded' ) !== 'true' );
		} );

		// Close after picking a destination.
		nav.addEventListener( 'click', function ( e ) {
			if ( e.target.closest( 'a' ) ) { setMenu( false ); }
		} );

		// Close on Escape or a tap outside the header.
		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key === 'Escape' ) { setMenu( false ); }
		} );
		document.addEventListener( 'click', function ( e ) {
			if ( header.classList.contains( 'is-menu-open' ) && ! header.contains( e.target ) ) {
				setMenu( false );
			}
		} );

		// Reset if the viewport grows back to the inline (desktop) nav.
		window.addEventListener( 'resize', function () {
			if ( window.innerWidth > 860 ) { setMenu( false ); }
		}, { passive: true } );
	}
}() );
