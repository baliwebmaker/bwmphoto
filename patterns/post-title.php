<?php
/**
 * Post Title content.
 */
return array(
	'title'      => __( 'Post Title', 'bwmphoto' ),
	'categories' => array( 'bwmphoto-basic' ),
	'content'    => '<!-- wp:group -->
<div class="wp-block-group"><!-- wp:cover {"url":"' . esc_url( BWM_PHOTO_URI ) . 'assets/img/rock-music-people-night-smoke-crowd-655306-pxhere.com.jpg","id":510,"dimRatio":90,"overlayColor":"bwmphoto-bg-overlay","focalPoint":{"x":"0.50","y":0.57},"minHeight":460,"contentPosition":"center center","style":{"spacing":{"padding":{"bottom":"200px"}}}} -->
<div class="wp-block-cover" style="padding-bottom:200px;min-height:460px"><span aria-hidden="true" class="wp-block-cover__background has-bwmphoto-bg-overlay-background-color has-background-dim-90 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-510" alt="" src="' . esc_url( BWM_PHOTO_URI ) . 'assets/img/rock-music-people-night-smoke-crowd-655306-pxhere.com.jpg" style="object-position:50% 57%" data-object-fit="cover" data-object-position="50% 57%"/><div class="wp-block-cover__inner-container"><!-- wp:template-part {"slug":"header","theme":"bwmphoto"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"160px"}}}} -->
<div class="wp-block-group" style="padding-top:160px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title {"textAlign":"center","textColor":"bwmphoto-brown-soft","fontSize":"extra-large","fontFamily":"cambria-georgia"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);
