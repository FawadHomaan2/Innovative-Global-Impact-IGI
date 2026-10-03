<?php
/**
 * Title: Header
 * Slug: igi/header
 * Inserter: no
 * Block Types: core/template-part/header
 */
$igi_uri  = get_template_directory_uri();
$igi_home = home_url( '/' );

/*
 * Primary navigation. The logo is the Home link, so "Home" is intentionally not
 * a separate text item (matches the approved design). The same <nav> is the
 * inline desktop menu and — below the mobile breakpoint — the dark dropdown
 * panel toggled by the hamburger (see .igi-nav rules in assets/css/igi.css and
 * the toggle in assets/js/igi-header.js).
 */
$igi_nav = array(
	'About'     => home_url( '/about/' ),
	'Our Work'  => home_url( '/our-work/' ),
	'Donate'    => home_url( '/donate/' ),
	'News'      => home_url( '/news/' ),
	'Contact'   => home_url( '/contact/' ),
);
$igi_here = isset( $_SERVER['REQUEST_URI'] )
	? trailingslashit( strtok( wp_unslash( $_SERVER['REQUEST_URI'] ), '?' ) )
	: '';
?>
<!-- wp:group {"tagName":"header","className":"igi-header","layout":{"type":"default"}} -->
<header class="wp-block-group igi-header" data-site-header>
	<!-- The whole bar is raw HTML so the custom nav + hamburger render exactly as
	     designed; both wordmarks live in the DOM and CSS toggles which shows so the
	     transparent→solid swap can't flash. -->
	<!-- wp:html -->
	<div class="igi-header__inner">
		<a class="igi-logo" href="<?php echo esc_url( $igi_home ); ?>" aria-label="Innovative Global Impact — home">
			<img class="igi-logo__white" src="<?php echo esc_url( $igi_uri . '/assets/images/igi-logo-white.png' ); ?>" alt="Innovative Global Impact" width="367" height="104" />
			<img class="igi-logo__ink" src="<?php echo esc_url( $igi_uri . '/assets/images/igi-logo-ink.png' ); ?>" alt="" aria-hidden="true" width="367" height="104" />
		</a>

		<div class="igi-header__right">
			<nav class="igi-nav" id="igi-nav" aria-label="Primary">
				<?php
				foreach ( $igi_nav as $igi_label => $igi_url ) :
					$igi_path    = trailingslashit( (string) wp_parse_url( $igi_url, PHP_URL_PATH ) );
					$igi_current = ( '' !== $igi_here && $igi_path === $igi_here );

					if ( 'About' === $igi_label ) :
						$igi_team_url  = home_url( '/team/' );
						$igi_team_path = trailingslashit( (string) wp_parse_url( $igi_team_url, PHP_URL_PATH ) );
						$igi_team_cur  = ( '' !== $igi_here && $igi_team_path === $igi_here );
						$igi_about_on  = $igi_current || $igi_team_cur;
						?>
						<div class="igi-nav__item igi-nav__item--has-sub">
							<a class="igi-nav__link<?php echo $igi_about_on ? ' is-current' : ''; ?>" href="<?php echo esc_url( $igi_url ); ?>"<?php echo $igi_current ? ' aria-current="page"' : ''; ?>>About<span class="igi-nav__caret" aria-hidden="true"></span></a>
							<div class="igi-nav__sub" role="menu" aria-label="About">
								<a class="igi-nav__sublink<?php echo $igi_current ? ' is-current' : ''; ?>" href="<?php echo esc_url( $igi_url ); ?>" role="menuitem">About IGI</a>
								<a class="igi-nav__sublink<?php echo $igi_team_cur ? ' is-current' : ''; ?>" href="<?php echo esc_url( $igi_team_url ); ?>" role="menuitem"<?php echo $igi_team_cur ? ' aria-current="page"' : ''; ?>>Our Team</a>
							</div>
						</div>
					<?php else : ?>
						<a class="igi-nav__link<?php echo $igi_current ? ' is-current' : ''; ?>" href="<?php echo esc_url( $igi_url ); ?>"<?php echo $igi_current ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $igi_label ); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</nav>

			<div class="igi-header__actions">
				<a <?php echo igi_give_attr( 'general' ); ?> class="igi-give-trigger igi-donate" href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">Donate</a>
				<button type="button" class="igi-menu-toggle" aria-controls="igi-nav" aria-expanded="false" aria-label="Open menu">
					<span class="igi-menu-toggle__bars" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>
	<!-- /wp:html -->
</header>
<!-- /wp:group -->
