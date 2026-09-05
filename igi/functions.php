<?php
/**
 * Innovative Global Impact — block theme bootstrap.
 *
 * Tokens are defined in theme.json. This file wires up the supplemental
 * component stylesheet, editor styles, self-hosted font preloading, custom
 * block styles, image sizes, and the pattern categories.
 *
 * @package IGI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'IGI_VERSION' ) ) {
	define( 'IGI_VERSION', '0.1.0' );
}

// Search/social surface: meta descriptions, Open Graph, Twitter cards, JSON-LD.
require_once get_template_directory() . '/inc/seo.php';

/**
 * Front-end assets.
 */
function igi_enqueue_assets() {
	$dir = get_template_directory();
	$uri = get_template_directory_uri();

	// Theme header stylesheet (block themes don't auto-enqueue it).
	wp_enqueue_style( 'igi-style', get_stylesheet_uri(), array(), IGI_VERSION );

	// Component styles (the turn, header nav, cards, CTA band, footer, etc.).
	$css = $dir . '/assets/css/igi.css';
	wp_enqueue_style(
		'igi-components',
		$uri . '/assets/css/igi.css',
		array( 'igi-style' ),
		file_exists( $css ) ? (string) filemtime( $css ) : IGI_VERSION
	);

	// Scoped utilities for the pixel-perfect ported design pages (.igi-port).
	$dcss = $dir . '/assets/css/design.css';
	wp_enqueue_style(
		'igi-design',
		$uri . '/assets/css/design.css',
		array( 'igi-components' ),
		file_exists( $dcss ) ? (string) filemtime( $dcss ) : IGI_VERSION
	);

	// Donate-modal behavior.
	$js = $dir . '/assets/js/igi-give.js';
	wp_enqueue_script(
		'igi-give',
		$uri . '/assets/js/igi-give.js',
		array(),
		file_exists( $js ) ? (string) filemtime( $js ) : IGI_VERSION,
		true
	);

	// Fixed-header transparent → solid scroll state.
	$hjs = $dir . '/assets/js/igi-header.js';
	wp_enqueue_script(
		'igi-header',
		$uri . '/assets/js/igi-header.js',
		array(),
		file_exists( $hjs ) ? (string) filemtime( $hjs ) : IGI_VERSION,
		true
	);

	// Donate forms load inside their own iframe (self-contained), so no GiveWP
	// frontend assets are needed on the page itself.
}
add_action( 'wp_enqueue_scripts', 'igi_enqueue_assets' );

/**
 * Editor assets so the canvas matches the front end.
 */
function igi_editor_assets() {
	add_editor_style( 'assets/css/igi.css' );
	add_editor_style( 'assets/css/design.css' );
}
add_action( 'after_setup_theme', 'igi_editor_assets' );

/**
 * Misc theme supports not already granted by block-theme defaults.
 */
function igi_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-logo', array(
		'height'      => 104,
		'width'       => 367,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'style', 'script' ) );
	load_theme_textdomain( 'igi', get_template_directory() . '/languages' );

	// Card-friendly crop for campaign / news imagery.
	add_image_size( 'igi-card', 880, 620, true );
	add_image_size( 'igi-wide', 1600, 900, true );
}
add_action( 'after_setup_theme', 'igi_setup' );

/**
 * Preload the two most critical self-hosted fonts to protect LCP.
 */
function igi_preload_fonts() {
	$uri   = get_template_directory_uri() . '/assets/fonts/';
	$fonts = array( 'newsreader-400.woff2', 'hanken-400.woff2' );
	foreach ( $fonts as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( $uri . $font )
		);
	}
}
add_action( 'wp_head', 'igi_preload_fonts', 1 );

/**
 * Custom block styles used by the design system.
 */
function igi_register_block_styles() {
	// Ghost / outline button (secondary CTA — "See our work").
	register_block_style( 'core/button', array(
		'name'  => 'igi-ghost',
		'label' => __( 'Ghost (outline)', 'igi' ),
	) );

	// Campaign-themed donate buttons (sub-accent fills).
	register_block_style( 'core/button', array(
		'name'  => 'igi-water',
		'label' => __( 'Donate — Water Blue', 'igi' ),
	) );
	register_block_style( 'core/button', array(
		'name'  => 'igi-ember',
		'label' => __( 'Donate — Ember Clay', 'igi' ),
	) );

	// Quiet, hairline-edged content card.
	register_block_style( 'core/group', array(
		'name'  => 'igi-card',
		'label' => __( 'IGI Card', 'igi' ),
	) );

	// Documentary image treatment (light warm grade, soft radius).
	register_block_style( 'core/image', array(
		'name'  => 'igi-frame',
		'label' => __( 'Field photo', 'igi' ),
	) );

	// Community voice / quote treatment.
	register_block_style( 'core/quote', array(
		'name'  => 'igi-voice',
		'label' => __( 'Community voice', 'igi' ),
	) );
}
add_action( 'init', 'igi_register_block_styles' );

/**
 * Pattern categories for the inserter.
 */
function igi_register_pattern_categories() {
	register_block_pattern_category( 'igi', array(
		'label' => __( 'IGI', 'igi' ),
	) );
	register_block_pattern_category( 'igi-campaigns', array(
		'label' => __( 'IGI · Campaigns', 'igi' ),
	) );
}
add_action( 'init', 'igi_register_pattern_categories' );

/**
 * Body classes — flag whether GiveWP is active so the donate pattern can
 * show either the real form button or a styled placeholder.
 */
function igi_body_classes( $classes ) {
	if ( ! igi_givewp_active() ) {
		$classes[] = 'igi-no-givewp';
	}
	if ( igi_has_dark_hero() ) {
		$classes[] = 'has-dark-hero';
	}
	return $classes;
}
add_filter( 'body_class', 'igi_body_classes' );

/**
 * Does the current view open on a full-bleed dark photo hero?
 *
 * Every ported content view in this theme leads with one (home, the posts page,
 * single articles, and the four interior port pages), so the fixed header starts
 * transparent over it and turns solid on scroll. The genuinely light templates —
 * 404, search, archives, and plain page.html pages — return false, so the header
 * renders solid from load and the content clears the bar. Filterable for any new
 * page that does (or doesn't) ship a hero.
 */
function igi_has_dark_hero() {
	$dark = is_front_page()
		|| is_home()
		|| is_singular( 'post' )
		|| is_page( array( 'about', 'our-work', 'campaigns', 'contact' ) );
	return (bool) apply_filters( 'igi_has_dark_hero', $dark );
}

/**
 * Is GiveWP available? Used by the donate pattern.
 */
function igi_givewp_active() {
	return class_exists( 'Give' ) || function_exists( 'give_get_option' );
}

/* -----------------------------------------------------------------------------
 * GiveWP donate wiring — maps each design Donate button to a GiveWP form, and
 * opens that form in a themed modal. Edit the IDs in one place (or via the
 * `igi_give_form_map` option / filter — no code edit needed).
 * --------------------------------------------------------------------------- */

/**
 * The slug → GiveWP form-ID map. Defaults are the live site's forms; override
 * per-environment with update_option( 'igi_give_form_map', [...] ) or the filter.
 */
function igi_give_forms() {
	$defaults = array(
		'ghor'     => 747, // Water that never reaches them
		'daykundi' => 749, // Where poverty becomes opportunity
		'faryab'   => 751, // When birth becomes survival
		'general'  => 137, // default — header, footer, generic CTAs
	);
	$opt = get_option( 'igi_give_form_map', array() );
	$map = wp_parse_args( is_array( $opt ) ? $opt : array(), $defaults );
	return apply_filters( 'igi_give_form_map', $map );
}

function igi_give_form_id( $key ) {
	$m = igi_give_forms();
	return absint( isset( $m[ $key ] ) ? $m[ $key ] : $m['general'] );
}

/** Mark a form as used on this request so its modal gets rendered in the footer. */
function igi_need_donate( $key ) {
	if ( ! isset( $GLOBALS['igi_donate_forms'] ) ) {
		$GLOBALS['igi_donate_forms'] = array();
	}
	$id = igi_give_form_id( $key );
	if ( $id ) {
		$GLOBALS['igi_donate_forms'][ $id ] = true;
	}
}

/**
 * Echoed into a Donate <a>/<button> to wire it to a form's modal.
 * Returns e.g. data-igi-give="749" and registers that form for the footer.
 */
function igi_give_attr( $key ) {
	igi_need_donate( $key );
	return 'data-igi-give="' . esc_attr( igi_give_form_id( $key ) ) . '"';
}

/** Render the modal(s) for every form referenced on this page (deduped). */
function igi_render_donate_modals() {
	// Forms explicitly registered this request (via igi_give_attr), unioned with
	// the full slug -> ID map. Buttons inserted through a block pattern (e.g. the
	// campaign cards in igi/port-campaigns) can have their data-igi-give attribute
	// served from WordPress's cached pattern HTML without re-running the PHP that
	// registers the modal — so relying on the side-effect alone leaves those
	// modals unrendered and the buttons fall through to their href="#". Always
	// rendering a modal for every mapped form guarantees each button has its
	// target. Modals are hidden with lazy iframes, so the extra ones cost nothing.
	$registered = ! empty( $GLOBALS['igi_donate_forms'] ) ? array_keys( $GLOBALS['igi_donate_forms'] ) : array();
	$ids        = array_filter( array_unique( array_map( 'absint', array_merge( $registered, array_values( igi_give_forms() ) ) ) ) );
	if ( empty( $ids ) ) {
		return;
	}
	$active = igi_givewp_active();
	foreach ( $ids as $id ) {
		$id = absint( $id );
		echo '<div class="igi-give-modal" id="igi-give-modal-' . esc_attr( $id ) . '" role="dialog" aria-modal="true" aria-label="Make a donation" hidden>';
		echo '<div class="igi-give-modal__backdrop" data-igi-give-close></div>';
		echo '<div class="igi-give-modal__panel">';
		echo '<button class="igi-give-modal__close" type="button" data-igi-give-close aria-label="Close">&times;</button>';
		echo '<div class="igi-give-modal__body">';
		if ( $active ) {
			// Iframe GiveWP's self-contained donation-form-view route (lazy src set
			// on open). This is the same target GiveWP's own embed uses, but it
			// doesn't depend on GiveWP's embed JS running on the page.
			$src = home_url( '/?givewp-route=donation-form-view&form-id=' . $id );
			echo '<iframe class="igi-give-frame" data-src="' . esc_url( $src ) . '" title="Make a donation" loading="lazy"></iframe>';
		} else {
			echo '<p class="igi-give-modal__placeholder">GiveWP form #' . $id . ' mounts here once GiveWP is active.</p>';
		}
		echo '</div></div></div>';
	}
}
add_action( 'wp_footer', 'igi_render_donate_modals', 99 );

/**
 * Render a brand-styled, open-ended Donate container for one campaign.
 *
 * We DO NOT build form internals — GiveWP renders the modal/iframe. This
 * outputs the styled button + an open-ended note, and (when GiveWP isn't
 * active yet) a dashed placeholder explaining how to wire the campaign.
 *
 * @param array $args {
 *   @type string $style  Button block style: 'igi-water' | 'igi-ember' | '' (Marigold default).
 *   @type string $label  Button label.
 *   @type string $anchor Campaign anchor / slug (used in the placeholder note).
 *   @type int    $form   Optional GiveWP form ID. If set + GiveWP active, the
 *                        block can be swapped for [give_form id="X"] in WP admin.
 * }
 */
function igi_donate( $args = array() ) {
	$args  = wp_parse_args( $args, array(
		'style'  => '',
		'label'  => 'Donate — any amount',
		'anchor' => '',
		'form'   => 0,
	) );
	$style = $args['style'] ? ' is-style-' . sanitize_html_class( $args['style'] ) : '';
	$label = esc_html( $args['label'] );
	$href  = esc_url( home_url( '/campaigns/' ) . ( $args['anchor'] ? '#' . sanitize_title( $args['anchor'] ) : '' ) );

	ob_start();
	?>
	<!-- wp:group {"className":"igi-donate","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group igi-donate">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"<?php echo esc_attr( trim( $style ) ); ?>"} -->
			<div class="wp-block-button<?php echo esc_attr( $style ); ?>"><a class="wp-block-button__link wp-element-button" href="<?php echo $href; // phpcs:ignore ?>"><?php echo $label; // phpcs:ignore ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		<!-- wp:paragraph {"className":"igi-donate__note"} -->
		<p class="igi-donate__note">Open-ended — give any amount, one-time or monthly. No goal, no cap.</p>
		<!-- /wp:paragraph -->
		<?php if ( ! igi_givewp_active() ) : ?>
		<!-- wp:html -->
		<div class="igi-donate__placeholder">GiveWP campaign mounts here → set this button to the <code><?php echo esc_html( $args['anchor'] ); ?></code> donation form (goal unset).</div>
		<!-- /wp:html -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
	<?php
	return trim( ob_get_clean() );
}
