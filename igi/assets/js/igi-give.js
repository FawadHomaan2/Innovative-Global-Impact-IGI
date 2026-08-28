/* IGI — donate modal. Any element with [data-igi-give="<formId>"] opens the
   matching #igi-give-modal-<formId>. Close via backdrop, the × button, or Esc. */
( function () {
	'use strict';
	var openModal = null;
	var lastTrigger = null;

	function lock( on ) {
		document.documentElement.style.overflow = on ? 'hidden' : '';
	}

	function open( id, trigger ) {
		var m = document.getElementById( 'igi-give-modal-' + id );
		if ( ! m ) { return false; }
		// Lazy-load the GiveWP form iframe the first time the modal is opened.
		var frame = m.querySelector( '.igi-give-frame' );
		if ( frame && ! frame.getAttribute( 'src' ) && frame.getAttribute( 'data-src' ) ) {
			frame.setAttribute( 'src', frame.getAttribute( 'data-src' ) );
		}
		m.hidden = false;
		openModal = m;
		lastTrigger = trigger || null;
		lock( true );
		var focusable = m.querySelector( '.igi-give-modal__close' );
		if ( focusable ) { try { focusable.focus(); } catch ( e ) {} }
		return true;
	}

	function close() {
		if ( ! openModal ) { return; }
		openModal.hidden = true;
		openModal = null;
		lock( false );
		if ( lastTrigger ) { try { lastTrigger.focus(); } catch ( e ) {} }
	}

	document.addEventListener( 'click', function ( e ) {
		var trigger = e.target.closest( '[data-igi-give]' );
		if ( trigger ) {
			var id = trigger.getAttribute( 'data-igi-give' );
			if ( id && open( id, trigger ) ) { e.preventDefault(); }
			return;
		}
		if ( e.target.closest( '[data-igi-give-close]' ) ) {
			e.preventDefault();
			close();
		}
	} );

	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' && openModal ) { close(); }
	} );
}() );
