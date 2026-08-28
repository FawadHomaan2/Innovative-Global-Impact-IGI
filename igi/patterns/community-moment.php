<?php
/**
 * Title: Community moment (full-bleed)
 * Slug: igi/community-moment
 * Categories: igi
 * Description: One large dignified photograph carrying the emotion; restrained type.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-water-children-line.jpg';
?>
<!-- wp:cover {"url":"<?php echo esc_url( $igi_img ); ?>","dimRatio":50,"overlayColor":"ink","isUserOverlayColor":true,"minHeight":62,"minHeightUnit":"vh","contentPosition":"bottom left","align":"full","className":"igi-on-dark"} -->
<div class="wp-block-cover alignfull igi-on-dark is-position-bottom-left" style="min-height:62vh"><span aria-hidden="true" class="wp-block-cover__background has-ink-background-color has-background-dim-50 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Children waiting in a long line beside rows of water jerrycans along a mud wall in Ghor Province" src="<?php echo esc_url( $igi_img ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"igi-eyebrow"} -->
		<p class="igi-eyebrow">Ghor Province, Afghanistan</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--display)","fontSize":"clamp(1.6rem, 3.4vw, 2.4rem)","fontWeight":"500","lineHeight":"1.25"}}} -->
		<p style="font-family:var(--wp--preset--font-family--display);font-size:clamp(1.6rem, 3.4vw, 2.4rem);font-weight:500;line-height:1.25">Women and children spend hours each day walking for water that often isn't safe to drink. The pilot answers with engineering, not trucking.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
