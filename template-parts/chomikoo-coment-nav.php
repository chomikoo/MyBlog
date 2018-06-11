<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav">
				<span class="chevron-left" aria-hidden="true"><</span> 
				<?php previous_comments_link( esc_html__( 'Starsze komentarze', 'chomikootheme' ) ) ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Nowsze komentarze', 'chomikootheme' ) ) ?>
				<span class="chevron-right" aria-hidden="true">></span>
			</div>
		</div>
	</div><!-- .row -->
</nav>