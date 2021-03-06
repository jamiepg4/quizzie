<aside class="quizzie" id="<?php echo esc_attr( $id ) ?>">
	<div class="quizzie-quiz">
	<h5><?php echo esc_html( $question ) ?></h5>
	<img src="<?php echo esc_attr( $image_url ) ?>" class="quizzie-img" />
		<ul class="quizzie-poll">
			<?php for ( $i = 0; $i < count( $options ); $i++ ): ?>
				<li class="quizzie-option quizzie-option-<?php echo esc_attr( $i + 1 ) ?>" data-option="<?php echo esc_attr( $i ) ?>">
					<h6><?php echo esc_html( $options[$i]['title'] ) ?></h6>
					<?php echo esc_html( $options[$i]['description'] ) ?>
				</li>
			<?php endfor; ?>
		</ul>
	</div>
	<div class="quizzie-results">
		<?php for ( $i = 0; $i < count( $options ); $i++ ): ?>
			<div class="quizzie-result" data-option="<?php echo esc_attr( $i ) ?>">
				<div class="text-left quizzie-result-text">
					<h6>Share</h6>
					"<?php echo esc_html( $question ) ?> I answered '<?php echo esc_html( $options[$i]['title'] ) ?>'."
				</div>
				<div class="quizzie-result-share">
					<a href="<?php echo esc_attr( 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( get_permalink() ) ) ?>" target="_blank" class="quizzie-share-facebook">Share</a>
					<a href="<?php echo esc_attr( 'https://twitter.com/share?text=' . urlencode( $question ) ) ?>" target="_blank" class="quizzie-share-twitter">Tweet</a>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</aside>
