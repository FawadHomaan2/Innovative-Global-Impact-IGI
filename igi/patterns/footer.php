<?php
/**
 * Title: Footer
 * Slug: igi/footer
 * Inserter: no
 * Block Types: core/template-part/footer
 */
$igi_uri  = get_template_directory_uri();
$igi_home = home_url( '/' );
$igi_year = wp_date( 'Y' );
?>
<!-- wp:group {"tagName":"footer","className":"igi-footer igi-on-dark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<footer class="wp-block-group alignfull igi-footer igi-on-dark" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"48%"} -->
		<div class="wp-block-column" style="flex-basis:48%">
			<!-- wp:image {"width":"200px","style":{"spacing":{"margin":{"bottom":"1rem"}}}} -->
			<figure class="wp-block-image" style="margin-bottom:1rem;width:200px"><a href="<?php echo esc_url( $igi_home ); ?>"><img src="<?php echo esc_url( $igi_uri . '/assets/images/igi-logo-white.png' ); ?>" alt="Innovative Global Impact" width="367" height="104"/></a></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"},"spacing":{"margin":{"right":"2rem"}}}} -->
			<p style="margin-right:2rem;font-size:1rem;line-height:1.6">Reducing poverty by building sustainable local economies — through education, entrepreneurship, and access to opportunity. Proved through pilots, built to scale.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"26%"} -->
		<div class="wp-block-column" style="flex-basis:26%">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Explore</p><!-- /wp:paragraph -->
			<!-- wp:list {"style":{"typography":{"lineHeight":"2"}}} -->
			<ul class="wp-block-list" style="line-height:2">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>">Our Work</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Campaigns</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">News</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"26%"} -->
		<div class="wp-block-column" style="flex-basis:26%">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Connect</p><!-- /wp:paragraph -->
			<!-- wp:list {"style":{"typography":{"lineHeight":"2"}}} -->
			<ul class="wp-block-list" style="line-height:2">
				<!-- wp:list-item --><li><a href="https://www.facebook.com/profile.php?id=61575755775907" rel="noopener" target="_blank">Facebook</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="https://www.instagram.com/innovative_global_impact" rel="noopener" target="_blank">Instagram</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a <?php echo igi_give_attr( 'general' ); ?> class="igi-give-trigger igi-footer__donate" href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Donate</a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#3a2f28"},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} -->
	<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#3a2f28;color:#3a2f28;margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--30)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--mute","style":{"typography":{"textTransform":"none","letterSpacing":"0.02em"}}} -->
		<p class="igi-eyebrow igi-eyebrow--mute" style="letter-spacing:0.02em;text-transform:none">© <?php echo esc_html( $igi_year ); ?> Innovative Global Impact</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--mute"} -->
		<p class="igi-eyebrow igi-eyebrow--mute">Nonprofit organization</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->
