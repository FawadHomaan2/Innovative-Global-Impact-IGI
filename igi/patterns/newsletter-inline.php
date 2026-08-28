<?php
/**
 * Title: Newsletter — inline form
 * Slug: igi/newsletter-inline
 * Inserter: no
 *
 * Placeholder markup. Re-wire `action` / fields to the chosen provider
 * (Mailchimp or other — » CONFIRM, brief §14.8).
 */
?>
<!-- wp:html -->
<form class="igi-newsletter" action="#" method="post" aria-label="Newsletter signup" style="display:flex;gap:0.6rem;flex-wrap:wrap;align-items:center">
	<label class="screen-reader-text" for="igi-news-email">Email address</label>
	<input id="igi-news-email" type="email" name="email" placeholder="you@email.com" required style="flex:1 1 14rem;min-width:0" />
	<button type="submit" class="igi-btn-dark">Subscribe</button>
</form>
<!-- /wp:html -->
