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
		|| is_page( array( 'about', 'our-work', 'campaigns', 'contact', 'team', 'vacancies', 'strategic-roadmap', 'terms', 'fundraising-intern' ) );
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
	$href  = esc_url( home_url( '/donate/' ) . ( $args['anchor'] ? '#' . sanitize_title( $args['anchor'] ) : '' ) );

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

/**
 * Permanent redirect for the retired /campaigns/ URL → the new /donate/ page.
 * The campaigns page was merged into the Donate page (2026-10); keep old
 * bookmarks and external links working instead of 404ing.
 */
function igi_redirect_campaigns() {
	if ( is_admin() ) {
		return;
	}
	$path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
	if ( '' !== (string) $path && 0 === strpos( trailingslashit( (string) $path ), '/campaigns/' ) ) {
		wp_safe_redirect( home_url( '/donate/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'igi_redirect_campaigns', 1 );

/**
 * Canonical-domain guard.
 *
 * The site's stored siteurl/home are correct (innovativeglobalimpact.org), but a
 * request reaching the server with a different Host header (e.g. an alternate or
 * spoofed domain) was once rendered and cached by WP Fastest Cache, so every
 * visitor was served asset URLs (CSS/JS/fonts) and links pointing at the wrong
 * domain — which 404'd and broke the header/nav, donate modals and more.
 *
 * Forcing the home/siteurl options to the canonical host makes WordPress emit the
 * right URLs no matter what Host header a request arrives with, so a stray request
 * can't poison the cache again. (The permanent fix is to also hardcode WP_HOME and
 * WP_SITEURL in wp-config.php.)
 */
if ( ! defined( 'IGI_CANONICAL_URL' ) ) {
	define( 'IGI_CANONICAL_URL', 'https://innovativeglobalimpact.org' );
}
function igi_force_canonical_url( $value ) {
	return IGI_CANONICAL_URL;
}
add_filter( 'option_home', 'igi_force_canonical_url' );
add_filter( 'option_siteurl', 'igi_force_canonical_url' );

/**
 * Branded chrome for the GiveWP single donation-form pages (/donations/<slug>/).
 *
 * GiveWP renders those pages with a minimal get_header()/get_footer(), so the
 * block theme's nav, hero and footer never appear — leaving a bare site-title
 * and a naked form. This injects a branded top bar, a campaign hero with a live
 * goal bar, an "other campaigns" strip and a footer, and places them around the
 * form client-side (the form is a stable anchor: .root-data-givewp-embed).
 *
 * Gated to single give_forms pages and purely additive: if the JS or markup
 * fails, the donation form itself is untouched and still works.
 */
function igi_give_single_meta() {
	$assets = get_template_directory_uri() . '/assets/images/';
	return array(
		747 => array( 'slug' => 'water-that-never-reaches-them',     'eyebrow' => 'Water · Tappa-e-Shahida, Ghor', 'title' => 'She lost her baby carrying water',              'blurb' => 'In Tappa-e-Shahida, Ghor, 90 to 100 families share one unreliable water source at the bottom of a steep, icy path. Your gift brings safe water close to home.', 'img' => $assets . 'ghor-water-families-waiting.jpg' ),
		751 => array( 'slug' => 'when-birth-becomes-survival',        'eyebrow' => 'Survival · Ghor',                 'title' => 'Power failures shouldn’t cost a newborn’s life', 'blurb' => 'Equip a maternity and newborn unit in Ghor with off-grid power, so babies get warmth, oxygen and emergency care even when the electricity fails.',                 'img' => home_url( '/wp-content/uploads/2026/08/newborns-scaled.jpg' ) ),
		749 => array( 'slug' => 'where-poverty-becomes-opportunity',  'eyebrow' => 'Opportunity · Nangarhar',         'title' => 'Turning local resources into opportunity',        'blurb' => 'Train women in Nangarhar to turn local flowers into sustainable livelihoods through traditional distillation.',                                                 'img' => $assets . 'nangarhar-flowers-harvest.jpg' ),
		137 => array( 'slug' => 'fundraising-campaign',               'eyebrow' => 'General fund · All pilots',       'title' => 'Give where it’s needed most',                 'blurb' => 'Give to IGI’s general fund and we’ll direct your gift to the pilot that needs it most.',                                                                 'img' => home_url( '/wp-content/uploads/2026/09/delivering-equipments-880x620.jpg' ) ),
	);
}

function igi_give_single_chrome() {
	if ( ! is_singular( 'give_forms' ) ) {
		return;
	}
	$meta = igi_give_single_meta();
	$id   = (int) get_queried_object_id();
	$cur  = isset( $meta[ $id ] ) ? $meta[ $id ] : null;
	$home = home_url( '/' );

	$css = <<<'GSCSS'
<style id="igi-gs-css">
body.single-give_forms{background:rgb(250,248,244)!important;}
body.single-give_forms h1,body.single-give_forms .description,body.single-give_forms hr,body.single-give_forms #footer{display:none!important;}
.igi-gs-top,.igi-gs-bottom{font-family:'Hanken Grotesk',system-ui,sans-serif;color:rgb(36,28,23);}
.igi-gs-bar{max-width:1180px;margin:0 auto;padding:18px clamp(16px,5vw,40px);display:flex;align-items:center;justify-content:space-between;gap:16px;}
.igi-gs-bar a{text-decoration:none;color:inherit;}
.igi-gs-bar__brand{font-family:Newsreader,serif;font-size:clamp(18px,2.2vw,23px);font-weight:500;letter-spacing:-.01em;}
.igi-gs-bar__link{font-family:'Spline Sans Mono',monospace;font-size:12px;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:rgb(99,90,80);border:1px solid rgb(201,188,168);padding:9px 16px;border-radius:999px;white-space:nowrap;}
.igi-gs-bar__link:hover{background:#fff;}
.igi-gs-hero{position:relative;overflow:hidden;background:rgb(23,18,14);}
.igi-gs-hero__img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:.5;}
.igi-gs-hero__wrap{position:relative;max-width:760px;margin:0 auto;padding:clamp(40px,6vw,76px) clamp(16px,5vw,40px) clamp(96px,11vw,140px);text-align:center;color:rgb(251,247,240);}
.igi-gs-hero__eyebrow{font-family:'Spline Sans Mono',monospace;font-size:12.5px;font-weight:500;letter-spacing:.16em;text-transform:uppercase;color:rgb(237,230,218);margin-bottom:18px;}
.igi-gs-hero__title{font-family:Newsreader,serif;font-weight:400;font-size:clamp(30px,5vw,52px);line-height:1.05;letter-spacing:-.012em;margin:0 0 16px;}
.igi-gs-hero__blurb{font-size:clamp(15px,1.6vw,18px);line-height:1.6;color:rgb(228,216,198);max-width:40em;margin:0 auto 26px;}
.igi-gs-goal{max-width:420px;margin:0 auto;}
.igi-gs-goal__track{height:9px;background:rgba(255,255,255,.22);border-radius:999px;overflow:hidden;}
.igi-gs-goal__fill{display:block;height:100%;width:0;background:rgb(237,230,218);border-radius:999px;transition:width .8s ease;}
.igi-gs-goal__row{display:flex;justify-content:space-between;gap:10px;margin-top:9px;font-family:'Spline Sans Mono',monospace;font-size:12px;letter-spacing:.02em;color:rgb(228,216,198);}
.igi-gs-goal__raised{font-weight:600;color:#fff;}
body.single-give_forms .root-data-givewp-embed{max-width:560px!important;margin:-74px auto 0!important;position:relative;z-index:2;border-radius:16px;box-shadow:0 30px 60px -30px rgba(36,28,23,.5);}
.igi-gs-more{max-width:1180px;margin:clamp(50px,7vw,86px) auto 0;padding:0 clamp(16px,5vw,40px);}
.igi-gs-more__h{text-align:center;font-family:Newsreader,serif;font-weight:400;font-size:clamp(23px,3vw,32px);color:rgb(36,28,23);margin:0 0 6px;}
.igi-gs-more__sub{text-align:center;font-size:14.5px;color:rgb(106,95,83);margin:0 0 30px;}
.igi-gs-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%,260px),1fr));gap:clamp(16px,2vw,24px);}
.igi-gs-card{display:flex;flex-direction:column;background:#fff;border:1px solid rgb(228,216,198);border-radius:14px;overflow:hidden;text-decoration:none;color:inherit;transition:transform .2s,box-shadow .2s;}
.igi-gs-card:hover{transform:translateY(-3px);box-shadow:0 22px 40px -26px rgba(36,28,23,.45);}
.igi-gs-card__img{aspect-ratio:16/10;object-fit:cover;width:100%;display:block;}
.igi-gs-card__body{padding:20px 20px 22px;display:flex;flex-direction:column;flex:1;}
.igi-gs-card__eyebrow{font-family:'Spline Sans Mono',monospace;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgb(99,90,80);margin-bottom:9px;}
.igi-gs-card__title{font-family:Newsreader,serif;font-weight:500;font-size:19px;line-height:1.14;color:rgb(36,28,23);margin:0 0 16px;}
.igi-gs-card__cta{margin-top:auto;font-family:'Spline Sans Mono',monospace;font-size:12.5px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:rgb(36,28,23);}
.igi-gs-foot{margin-top:clamp(50px,7vw,86px);background:rgb(23,18,14);color:rgb(179,167,148);}
.igi-gs-foot__wrap{max-width:1180px;margin:0 auto;padding:clamp(34px,4vw,52px) clamp(16px,5vw,40px);display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:18px;}
.igi-gs-foot__brand{font-family:Newsreader,serif;font-size:20px;color:rgb(251,247,240);text-decoration:none;}
.igi-gs-foot__nav{display:flex;flex-wrap:wrap;gap:18px;}
.igi-gs-foot__nav a{color:rgb(179,167,148);text-decoration:none;font-size:14px;}
.igi-gs-foot__nav a:hover{color:#fff;}
.igi-gs-foot__legal{width:100%;font-size:12px;color:rgb(128,118,104);border-top:1px solid rgba(255,255,255,.08);padding-top:16px;margin-top:4px;}
@media(max-width:600px){body.single-give_forms .root-data-givewp-embed{margin-top:-54px!important;}}
</style>
GSCSS;

	$bar = sprintf(
		'<div class="igi-gs-bar"><a class="igi-gs-bar__brand" href="%s">Innovative Global Impact</a><a class="igi-gs-bar__link" href="%s">&larr; All ways to give</a></div>',
		esc_url( $home ),
		esc_url( home_url( '/donate/' ) )
	);

	$hero = '';
	if ( $cur ) {
		// Live goal/progress bar shows ONLY on the Water campaign (form 747);
		// every other campaign hides how much has been raised.
		$goal = '';
		if ( 747 === $id ) {
			$goal = sprintf(
				'<div class="igi-gs-goal igi-goal" data-form="%d"><div class="igi-gs-goal__track"><span class="igi-gs-goal__fill igi-goal__fill"></span></div><div class="igi-gs-goal__row"><span class="igi-gs-goal__raised igi-goal__raised">Loading&hellip;</span><span class="igi-gs-goal__goal igi-goal__goal"></span></div></div>',
				$id
			);
		}
		$hero = sprintf(
			'<div class="igi-gs-hero"><img class="igi-gs-hero__img" src="%s" alt=""><div class="igi-gs-hero__wrap"><div class="igi-gs-hero__eyebrow">%s</div><div class="igi-gs-hero__title">%s</div><p class="igi-gs-hero__blurb">%s</p>%s</div></div>',
			esc_url( $cur['img'] ),
			esc_html( $cur['eyebrow'] ),
			esc_html( $cur['title'] ),
			esc_html( $cur['blurb'] ),
			$goal
		);
	}

	$cards = '';
	foreach ( $meta as $fid => $m ) {
		if ( (int) $fid === $id ) {
			continue;
		}
		$cards .= sprintf(
			'<a class="igi-gs-card" href="%s"><img class="igi-gs-card__img" src="%s" alt="" loading="lazy"><div class="igi-gs-card__body"><div class="igi-gs-card__eyebrow">%s</div><h3 class="igi-gs-card__title">%s</h3><span class="igi-gs-card__cta">Donate &rarr;</span></div></a>',
			esc_url( home_url( '/donations/' . $m['slug'] . '/' ) ),
			esc_url( $m['img'] ),
			esc_html( $m['eyebrow'] ),
			esc_html( $m['title'] )
		);
	}

	$footer = sprintf(
		'<footer class="igi-gs-foot"><div class="igi-gs-foot__wrap"><a class="igi-gs-foot__brand" href="%s">Innovative Global Impact</a><nav class="igi-gs-foot__nav"><a href="%s">Home</a><a href="%s">About</a><a href="%s">Our Work</a><a href="%s">Contact</a><a href="%s">Donate</a></nav><div class="igi-gs-foot__legal">&copy; %s Innovative Global Impact &middot; A U.S. 501(c)(3) nonprofit &middot; 100%% Secure Donation</div></div></footer>',
		esc_url( $home ),
		esc_url( $home ),
		esc_url( home_url( '/about/' ) ),
		esc_url( home_url( '/our-work/' ) ),
		esc_url( home_url( '/contact/' ) ),
		esc_url( home_url( '/donate/' ) ),
		esc_html( gmdate( 'Y' ) )
	);

	$js = <<<'GSJS'
<script>
(function(){
  try{
    var form=document.querySelector('.root-data-givewp-embed');
    var top=document.querySelector('.igi-gs-top'),bot=document.querySelector('.igi-gs-bottom');
    if(form&&top&&form.parentNode){form.parentNode.insertBefore(top,form);}
    if(form&&bot&&form.parentNode){if(form.nextSibling){form.parentNode.insertBefore(bot,form.nextSibling);}else{form.parentNode.appendChild(bot);}}
  }catch(e){}
  function usd(n){try{return new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:0}).format(n);}catch(e){return '$'+Math.round(n);}}
  var nodes=document.querySelectorAll('.igi-goal[data-form]');
  if(!nodes.length){return;}
  fetch('/wp-json/givewp/v3/campaigns?per_page=100',{headers:{'Accept':'application/json'}})
   .then(function(r){return r.ok?r.json():[];})
   .then(function(list){
     var map={};(list||[]).forEach(function(c){if(c&&c.defaultFormId!=null){map[c.defaultFormId]={goal:Number(c.goal)||0,actual:(c.goalStats&&Number(c.goalStats.actual))||0};}});
     nodes.forEach(function(el){
       var d=map[el.getAttribute('data-form')];
       var raised=el.querySelector('.igi-goal__raised'),goalEl=el.querySelector('.igi-goal__goal'),fill=el.querySelector('.igi-goal__fill');
       if(!d||!d.goal){if(raised){raised.textContent=d?usd(d.actual)+' raised':'';}if(goalEl){goalEl.textContent='';}return;}
       var pct=Math.max(0,Math.min(100,Math.round(d.actual/d.goal*100)));if(pct===0&&d.actual>0){pct=2;}
       if(raised){raised.textContent=usd(d.actual)+' raised';}
       if(goalEl){goalEl.textContent='Goal '+usd(d.goal);}
       if(fill){requestAnimationFrame(function(){fill.style.width=pct+'%';});}
     });
   }).catch(function(){var r=document.querySelector('.igi-goal__raised');if(r){r.textContent='';}});
})();
</script>
GSJS;

	echo $css; // phpcs:ignore WordPress.Security.EscapeOutput
	echo '<div class="igi-gs-top">' . $bar . $hero . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput
	echo '<div class="igi-gs-bottom"><section class="igi-gs-more"><h2 class="igi-gs-more__h">Support another campaign</h2><p class="igi-gs-more__sub">Every pilot is locally led and delivered on the ground.</p><div class="igi-gs-grid">' . $cards . '</div></section>' . $footer . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput
	echo $js; // phpcs:ignore WordPress.Security.EscapeOutput
}
add_action( 'wp_footer', 'igi_give_single_chrome', 20 );

/**
 * Meta (Facebook) Pixel — base code on all front-end pages.
 *
 * Fires PageView on every page, which builds the audience of site visitors so
 * ads can retarget them and Meta can optimise delivery. Dataset "IGI Market
 * Data", id 1757827808615609. Donation-completion (Purchase) tracking is handled
 * separately because GiveWP finalises the gift in an isolated form frame.
 */
if ( ! defined( 'IGI_META_PIXEL_ID' ) ) {
	define( 'IGI_META_PIXEL_ID', '1757827808615609' );
}
function igi_meta_pixel() {
	if ( is_admin() ) {
		return;
	}
	$id = IGI_META_PIXEL_ID;
	?>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '<?php echo esc_js( $id ); ?>');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" alt="" src="https://www.facebook.com/tr?id=<?php echo rawurlencode( $id ); ?>&amp;ev=PageView&amp;noscript=1"/></noscript>
<!-- End Meta Pixel Code -->
	<?php
}
add_action( 'wp_head', 'igi_meta_pixel', 5 );

/**
 * Contact form handler.
 *
 * The /contact/ form posts here (admin-post.php, action=igi_contact). It blocks
 * bots with a honeypot, validates and sanitises the fields, emails the site
 * admin via wp_mail() (which routes through WP Mail SMTP), and redirects back
 * to the contact page with a success/error flag the pattern renders as a banner.
 *
 * No nonce is enforced: the contact page is served from full-page cache, so a
 * baked-in nonce would go stale and reject real submissions. Spam is handled by
 * the honeypot plus required-field validation, which is appropriate for a
 * public contact form (CSRF risk here is negligible).
 */
function igi_handle_contact() {
	$redirect = home_url( '/contact/' );

	// Honeypot: humans leave this empty; bots fill it. Pretend success, send nothing.
	if ( ! empty( $_POST['igi_hp'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', $redirect ) );
		exit;
	}

	$name    = isset( $_POST['igi_name'] ) ? sanitize_text_field( wp_unslash( $_POST['igi_name'] ) ) : '';
	$email   = isset( $_POST['igi_email'] ) ? sanitize_email( wp_unslash( $_POST['igi_email'] ) ) : '';
	$message = isset( $_POST['igi_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['igi_message'] ) ) : '';

	if ( '' === $name || '' === $message || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', $redirect ) );
		exit;
	}

	$to      = array( 'admin@innovativeglobalimpact.org', 'fawad@innovativeglobalimpact.org' );
	/* translators: %s: sender name */
	$subject = sprintf( 'New contact message from %s', $name );
	$body    = "Name: {$name}\n"
		. "Email: {$email}\n\n"
		. "Message:\n{$message}\n\n"
		. "---\nSent from the contact form at " . home_url( '/contact/' );
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'contact', $sent ? 'sent' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_nopriv_igi_contact', 'igi_handle_contact' );
add_action( 'admin_post_igi_contact', 'igi_handle_contact' );
