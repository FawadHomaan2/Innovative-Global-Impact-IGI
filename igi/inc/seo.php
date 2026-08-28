<?php
/**
 * Innovative Global Impact — SEO module.
 *
 * The site runs no SEO plugin, so the theme owns the search/social surface:
 * meta descriptions, Open Graph + Twitter cards, JSON-LD structured data
 * (NGO Organization, WebSite, WebPage/Article, BreadcrumbList), a homepage
 * title that carries the positioning tagline, and noindex + sitemap exclusion
 * for GiveWP's thin utility pages.
 *
 * All text is keyword-forward but truthful to the resolved positioning —
 * "reducing poverty by building sustainable local economies." Everything is
 * filterable so copy can be tuned without editing code (igi_meta_description,
 * igi_default_description, igi_page_descriptions, igi_og_image, igi_jsonld_graph).
 *
 * @package IGI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -----------------------------------------------------------------------------
 * Descriptions
 * --------------------------------------------------------------------------- */

/**
 * The site-wide default description — front page, Organization schema, and the
 * fallback whenever a more specific description isn't available. ~190 chars.
 */
function igi_default_description() {
	return apply_filters(
		'igi_default_description',
		'Innovative Global Impact is a nonprofit building sustainable local economies in rural Afghanistan — through education, entrepreneurship, and access to opportunity. Not relief. Independence.'
	);
}

/**
 * Hand-written descriptions for the primary nav pages, keyed by slug. The posts
 * page ("news") is included here and resolved via its queried object.
 *
 * @return array<string,string>
 */
function igi_page_descriptions() {
	return apply_filters( 'igi_page_descriptions', array(
		'about'    => 'How and why we build systems that last — Innovative Global Impact replaces short-term aid with durable, locally-run economies across rural Afghanistan.',
		'our-work' => 'Our program models — microenterprise, agriculture, and youth opportunity. What Innovative Global Impact builds in Afghan communities, and what changes because of it.',
		'campaigns'=> 'Three frugal, off-grid pilots in Afghanistan: clean water and off-grid newborn care in Ghor, and a women\'s distillation initiative in Nangarhar. Fund a pilot — any amount.',
		'contact'  => 'Get in touch with Innovative Global Impact — partner with us, support a pilot, or learn how we build sustainable local economies in rural Afghanistan.',
		'news'     => 'Field notes and updates from Innovative Global Impact\'s pilots in Afghanistan — water access, newborn survival, and women\'s economic opportunity.',
	) );
}

/**
 * Resolve the best meta description for the current view.
 *
 * Precedence: a hand-written excerpt on the object > the per-slug map (pages /
 * posts page) > a trimmed post body (single posts) > a term description >
 * the site default.
 */
function igi_meta_description() {
	$desc = '';

	if ( is_front_page() ) {
		$desc = igi_default_description();
	} elseif ( is_home() ) { // The posts page (slug "news").
		$obj  = get_queried_object();
		$map  = igi_page_descriptions();
		$slug = $obj instanceof WP_Post ? $obj->post_name : 'news';
		$desc = isset( $map[ $slug ] ) ? $map[ $slug ] : igi_default_description();
	} elseif ( is_singular( 'post' ) ) {
		$obj  = get_queried_object();
		$desc = has_excerpt( $obj )
			? get_the_excerpt( $obj )
			: wp_trim_words( wp_strip_all_tags( strip_shortcodes( $obj->post_content ) ), 34, '…' );
	} elseif ( is_page() ) {
		$obj = get_queried_object();
		if ( has_excerpt( $obj ) ) {
			$desc = get_the_excerpt( $obj );
		} else {
			$map  = igi_page_descriptions();
			$slug = $obj instanceof WP_Post ? $obj->post_name : '';
			$desc = isset( $map[ $slug ] ) ? $map[ $slug ] : igi_default_description();
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term = get_queried_object();
		$desc = ( $term && ! empty( $term->description ) ) ? $term->description : igi_default_description();
	} else {
		$desc = igi_default_description();
	}

	$desc = preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $desc ) );
	$desc = trim( html_entity_decode( $desc, ENT_QUOTES, 'UTF-8' ) );

	return apply_filters( 'igi_meta_description', $desc );
}

/* -----------------------------------------------------------------------------
 * Canonical URL + share image
 * --------------------------------------------------------------------------- */

/** The canonical/og URL for the current view. */
function igi_canonical_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_singular() ) {
		$url = wp_get_canonical_url();
		return $url ? $url : get_permalink();
	}
	if ( is_home() ) {
		return get_permalink( get_queried_object_id() );
	}
	if ( is_category() || is_tag() || is_tax() ) {
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? home_url( '/' ) : $link;
	}
	return home_url( '/' );
}

/**
 * The best share image for the current view.
 *
 * Single posts/pages use their featured image when set; everything else falls
 * back to the bundled 1200×630 brand share card.
 *
 * @return array{url:string,width:int,height:int,alt:string}
 */
function igi_og_image() {
	if ( is_singular() && has_post_thumbnail() ) {
		$id  = get_post_thumbnail_id();
		$src = wp_get_attachment_image_src( $id, 'full' );
		if ( $src ) {
			$alt = trim( wp_strip_all_tags( (string) get_post_meta( $id, '_wp_attachment_image_alt', true ) ) );
			return array(
				'url'    => $src[0],
				'width'  => (int) $src[1],
				'height' => (int) $src[2],
				'alt'    => $alt !== '' ? $alt : get_the_title(),
			);
		}
	}

	$rel  = '/assets/images/og-default.jpg';
	$path = get_template_directory() . $rel;
	$img  = array(
		'url'    => get_template_directory_uri() . $rel,
		'width'  => 1200,
		'height' => 630,
		'alt'    => 'Innovative Global Impact — field work in rural Afghanistan',
	);
	if ( file_exists( $path ) ) {
		$size = @getimagesize( $path ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		if ( $size ) {
			$img['width']  = (int) $size[0];
			$img['height'] = (int) $size[1];
		}
	}
	return apply_filters( 'igi_og_image', $img );
}

/* -----------------------------------------------------------------------------
 * <head> output: meta description, Open Graph, Twitter cards
 * --------------------------------------------------------------------------- */

function igi_render_head_meta() {
	// Skip on feeds / embeds.
	if ( is_feed() || is_embed() ) {
		return;
	}

	$desc    = igi_meta_description();
	$url     = igi_canonical_url();
	$title   = wp_get_document_title();
	$site    = get_bloginfo( 'name' );
	$img     = igi_og_image();
	$is_post = is_singular( 'post' );
	$og_type = $is_post ? 'article' : 'website';

	$out  = "\n<!-- IGI SEO -->\n";

	if ( $desc !== '' ) {
		$out .= sprintf( '<meta name="description" content="%s" />' . "\n", esc_attr( $desc ) );
	}

	// Open Graph.
	$out .= sprintf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $og_type ) );
	$out .= sprintf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( $site ) );
	$out .= sprintf( '<meta property="og:locale" content="%s" />' . "\n", esc_attr( str_replace( '-', '_', get_bloginfo( 'language' ) ) ?: 'en_US' ) );
	$out .= sprintf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
	if ( $desc !== '' ) {
		$out .= sprintf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $desc ) );
	}
	$out .= sprintf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
	$out .= sprintf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $img['url'] ) );
	$out .= sprintf( '<meta property="og:image:secure_url" content="%s" />' . "\n", esc_url( $img['url'] ) );
	if ( $img['width'] && $img['height'] ) {
		$out .= sprintf( '<meta property="og:image:width" content="%d" />' . "\n", $img['width'] );
		$out .= sprintf( '<meta property="og:image:height" content="%d" />' . "\n", $img['height'] );
	}
	if ( $img['alt'] !== '' ) {
		$out .= sprintf( '<meta property="og:image:alt" content="%s" />' . "\n", esc_attr( $img['alt'] ) );
	}

	// Article timestamps + section.
	if ( $is_post ) {
		$out .= sprintf( '<meta property="article:published_time" content="%s" />' . "\n", esc_attr( get_the_date( 'c' ) ) );
		$out .= sprintf( '<meta property="article:modified_time" content="%s" />' . "\n", esc_attr( get_the_modified_date( 'c' ) ) );
		$cats = get_the_category();
		if ( ! empty( $cats ) ) {
			$out .= sprintf( '<meta property="article:section" content="%s" />' . "\n", esc_attr( $cats[0]->name ) );
		}
	}

	// Twitter card.
	$out .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	$out .= sprintf( '<meta name="twitter:title" content="%s" />' . "\n", esc_attr( $title ) );
	if ( $desc !== '' ) {
		$out .= sprintf( '<meta name="twitter:description" content="%s" />' . "\n", esc_attr( $desc ) );
	}
	$out .= sprintf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $img['url'] ) );
	if ( $img['alt'] !== '' ) {
		$out .= sprintf( '<meta name="twitter:image:alt" content="%s" />' . "\n", esc_attr( $img['alt'] ) );
	}

	$out .= "<!-- /IGI SEO -->\n";

	echo $out; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- each value escaped above.
}
add_action( 'wp_head', 'igi_render_head_meta', 5 );

/* -----------------------------------------------------------------------------
 * JSON-LD structured data (schema.org @graph)
 * --------------------------------------------------------------------------- */

/** The NGO Organization node — the site's identity, referenced by @id everywhere. */
function igi_schema_organization() {
	$home = home_url( '/' );
	return array(
		'@type'         => 'NGO',
		'@id'           => $home . '#organization',
		'name'          => 'Innovative Global Impact',
		'alternateName' => 'IGI',
		'url'           => $home,
		'description'   => igi_default_description(),
		'logo'          => array(
			'@type'   => 'ImageObject',
			'@id'     => $home . '#logo',
			'url'     => get_template_directory_uri() . '/assets/images/igi-logo-ink.png',
			'width'   => 367,
			'height'  => 104,
			'caption' => 'Innovative Global Impact',
		),
		'image'         => array( '@id' => $home . '#logo' ),
		'sameAs'        => array(
			'https://www.facebook.com/profile.php?id=61575755775907',
			'https://www.instagram.com/innovative_global_impact',
		),
		'areaServed'    => array(
			'@type' => 'Country',
			'name'  => 'Afghanistan',
		),
		'knowsAbout'    => array(
			'Poverty reduction',
			'Economic development',
			'Microenterprise',
			'Clean water access',
			'Maternal and newborn health',
			'Women\'s economic empowerment',
			'Off-grid engineering',
		),
	);
}

/** The WebSite node, with a SearchAction pointing at the theme's search. */
function igi_schema_website() {
	$home = home_url( '/' );
	return array(
		'@type'           => 'WebSite',
		'@id'             => $home . '#website',
		'url'             => $home,
		'name'            => 'Innovative Global Impact',
		'description'     => get_bloginfo( 'description' ),
		'publisher'       => array( '@id' => $home . '#organization' ),
		'inLanguage'      => get_bloginfo( 'language' ),
		'potentialAction' => array(
			'@type'       => 'SearchAction',
			'target'      => array(
				'@type'       => 'EntryPoint',
				'urlTemplate' => $home . '?s={search_term_string}',
			),
			'query-input' => 'required name=search_term_string',
		),
	);
}

/** A BreadcrumbList for the current view (Home › … › current). Null on the front page. */
function igi_schema_breadcrumb() {
	if ( is_front_page() ) {
		return null;
	}

	$items = array(
		array( 'name' => 'Home', 'url' => home_url( '/' ) ),
	);

	if ( is_singular( 'post' ) ) {
		$posts_page = (int) get_option( 'page_for_posts' );
		if ( $posts_page ) {
			$items[] = array( 'name' => get_the_title( $posts_page ), 'url' => get_permalink( $posts_page ) );
		}
		$items[] = array( 'name' => get_the_title(), 'url' => igi_canonical_url() );
	} elseif ( is_page() || is_home() ) {
		$items[] = array( 'name' => wp_strip_all_tags( single_post_title( '', false ) ), 'url' => igi_canonical_url() );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$items[] = array( 'name' => single_term_title( '', false ), 'url' => igi_canonical_url() );
	} else {
		return null;
	}

	$elements = array();
	foreach ( $items as $i => $item ) {
		$elements[] = array(
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => $item['name'],
			'item'     => $item['url'],
		);
	}

	return array(
		'@type'           => 'BreadcrumbList',
		'@id'             => igi_canonical_url() . '#breadcrumb',
		'itemListElement' => $elements,
	);
}

/** The WebPage node for non-article views. */
function igi_schema_webpage() {
	$url  = igi_canonical_url();
	$home = home_url( '/' );
	$img  = igi_og_image();

	$node = array(
		'@type'              => is_front_page() ? array( 'WebPage', 'CollectionPage' ) : 'WebPage',
		'@id'                => $url . '#webpage',
		'url'                => $url,
		'name'               => wp_get_document_title(),
		'description'        => igi_meta_description(),
		'isPartOf'           => array( '@id' => $home . '#website' ),
		'about'              => array( '@id' => $home . '#organization' ),
		'inLanguage'         => get_bloginfo( 'language' ),
		'primaryImageOfPage' => array(
			'@type'  => 'ImageObject',
			'url'    => $img['url'],
			'width'  => $img['width'],
			'height' => $img['height'],
		),
	);

	$crumb = igi_schema_breadcrumb();
	if ( $crumb ) {
		$node['breadcrumb'] = array( '@id' => $crumb['@id'] );
	}
	return $node;
}

/** The Article node for single posts. */
function igi_schema_article() {
	$url  = igi_canonical_url();
	$home = home_url( '/' );
	$img  = igi_og_image();

	$node = array(
		'@type'            => 'Article',
		'@id'              => $url . '#article',
		'mainEntityOfPage' => array( '@id' => $url . '#webpage' ),
		'headline'         => wp_strip_all_tags( get_the_title() ),
		'description'      => igi_meta_description(),
		'datePublished'    => get_the_date( 'c' ),
		'dateModified'     => get_the_modified_date( 'c' ),
		'author'           => array( '@id' => $home . '#organization' ),
		'publisher'        => array( '@id' => $home . '#organization' ),
		'isPartOf'         => array( '@id' => $home . '#website' ),
		'inLanguage'       => get_bloginfo( 'language' ),
		'image'            => array(
			'@type'  => 'ImageObject',
			'url'    => $img['url'],
			'width'  => $img['width'],
			'height' => $img['height'],
		),
	);

	$cats = get_the_category();
	if ( ! empty( $cats ) ) {
		$node['articleSection'] = $cats[0]->name;
	}
	return $node;
}

/** Assemble and print the @graph for the current view. */
function igi_render_jsonld() {
	if ( is_feed() || is_embed() || is_404() || is_search() ) {
		return;
	}

	$graph = array(
		igi_schema_organization(),
		igi_schema_website(),
	);

	if ( is_singular( 'post' ) ) {
		// A WebPage that the Article is the main entity of, plus the Article.
		$page          = igi_schema_webpage();
		$page['@type'] = 'WebPage';
		$page['mainEntity'] = array( '@id' => igi_canonical_url() . '#article' );
		$graph[] = $page;
		$graph[] = igi_schema_article();
	} else {
		$graph[] = igi_schema_webpage();
	}

	$crumb = igi_schema_breadcrumb();
	if ( $crumb ) {
		$graph[] = $crumb;
	}

	$data = array(
		'@context' => 'https://schema.org',
		'@graph'   => apply_filters( 'igi_jsonld_graph', $graph ),
	);

	$json = wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG );
	if ( $json ) {
		echo '<script type="application/ld+json">' . $json . "</script>\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON encoded with JSON_HEX_TAG.
	}
}
add_action( 'wp_head', 'igi_render_jsonld', 6 );

/* -----------------------------------------------------------------------------
 * Title: carry the positioning tagline on the homepage; consistent separator.
 * --------------------------------------------------------------------------- */

function igi_document_title_separator() {
	return '–'; // en dash
}
add_filter( 'document_title_separator', 'igi_document_title_separator' );

function igi_document_title_parts( $parts ) {
	if ( is_front_page() ) {
		$parts['title']   = 'Innovative Global Impact';
		$parts['tagline'] = 'Building sustainable local economies';
		unset( $parts['site'] );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'igi_document_title_parts' );

/* -----------------------------------------------------------------------------
 * Keep GiveWP's thin utility pages out of the index and the sitemap.
 * --------------------------------------------------------------------------- */

/**
 * Page IDs that should be noindexed + excluded from the sitemap — GiveWP's
 * post-donation utility screens. Resolved by slug and cached per request.
 *
 * @return int[]
 */
function igi_noindex_page_ids() {
	static $ids = null;
	if ( null !== $ids ) {
		return $ids;
	}
	$ids   = array();
	$slugs = apply_filters( 'igi_noindex_page_slugs', array( 'donation-confirmation', 'donation-failed', 'donation-page' ) );
	foreach ( $slugs as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$ids[] = (int) $page->ID;
		}
	}
	return $ids;
}

function igi_robots( $robots ) {
	$noindex = is_search() || is_404()
		|| ( is_page() && in_array( get_queried_object_id(), igi_noindex_page_ids(), true ) );

	if ( $noindex ) {
		$robots['noindex'] = true;
		$robots['follow']  = true;
	}
	return $robots;
}
add_filter( 'wp_robots', 'igi_robots' );

function igi_sitemap_exclude_pages( $args, $post_type ) {
	if ( 'page' === $post_type ) {
		$exclude = igi_noindex_page_ids();
		if ( $exclude ) {
			$existing            = isset( $args['post__not_in'] ) ? (array) $args['post__not_in'] : array();
			$args['post__not_in'] = array_values( array_unique( array_merge( $existing, $exclude ) ) );
		}
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'igi_sitemap_exclude_pages', 10, 2 );
