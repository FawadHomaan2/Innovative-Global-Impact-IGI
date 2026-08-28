<?php
/**
 * Title: Page header (title over landscape)
 * Slug: igi/page-header
 * Inserter: no
 * Description: Generic interior-page hero — the dignified landscape shot + page title.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-water-road-context.jpg';
?>
<!-- wp:cover {"url":"<?php echo esc_url( $igi_img ); ?>","dimRatio":50,"overlayColor":"ink","isUserOverlayColor":true,"minHeight":44,"minHeightUnit":"vh","contentPosition":"bottom left","align":"full","className":"igi-on-dark"} -->
<div class="wp-block-cover alignfull igi-on-dark is-position-bottom-left" style="min-height:44vh"><span aria-hidden="true" class="wp-block-cover__background has-ink-background-color has-background-dim-50 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $igi_img ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"constrained","contentSize":"1080px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
