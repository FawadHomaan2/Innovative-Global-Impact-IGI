<?php
/**
 * Title: Hero — Home (the turn)
 * Slug: igi/hero-home
 * Categories: igi
 * Description: Typographic thesis over one dignified landscape photograph.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-landscape-village.jpg';
?>
<!-- wp:cover {"url":"<?php echo esc_url( $igi_img ); ?>","dimRatio":50,"overlayColor":"ink","isUserOverlayColor":true,"minHeight":78,"minHeightUnit":"vh","contentPosition":"center left","align":"full","className":"igi-hero igi-on-dark"} -->
<div class="wp-block-cover alignfull igi-hero igi-on-dark is-position-center-left" style="min-height:78vh"><span aria-hidden="true" class="wp-block-cover__background has-ink-background-color has-background-dim-50 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $igi_img ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"igi-eyebrow"} -->
		<p class="igi-eyebrow">Building sustainable local economies</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"igi-hero__title","fontSize":"display"} -->
		<h1 class="wp-block-heading igi-hero__title has-display-font-size">Where systems fail,<br>we build the <em class="igi-turn">turn</em>.</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.25rem","lineHeight":"1.55"}}} -->
		<p style="font-size:1.25rem;line-height:1.55">We reduce poverty by building sustainable local economies — investing in education, entrepreneurship, and opportunity so communities can thrive on their own. Proved through locally-run pilots, built to scale. Not relief. Independence.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"blockGap":"0.85rem","margin":{"top":"0.5rem"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-buttons" style="margin-top:0.5rem">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Donate</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"is-style-igi-ghost"} -->
			<div class="wp-block-button is-style-igi-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>">See our work</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
