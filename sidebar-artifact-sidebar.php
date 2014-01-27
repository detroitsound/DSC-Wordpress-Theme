<aside id="artifactArchive" class="sidebar" role="complementary">

		<?php if ( is_active_sidebar( 'artifact-sidebar' ) ) : ?>

			<?php dynamic_sidebar( 'artifact-sidebar' ); ?>

		<?php else : ?>

			<!-- This content shows up if there are no widgets defined in the backend. -->

			<p>Please activate some Widgets.</p>

		<?php endif; ?>

</aside>