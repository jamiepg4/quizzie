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
				<div class="quizzie-result-text">
					<?php echo esc_html( $question ) ?> You answered <strong><?php echo esc_html( $options[$i]['title'] ) ?></strong>.
				</div>
				<div class="quizzie-result-share">
					<button class="quizzie-share-facebook">Share on Facebook</button>
					<button class="quizzie-share-twitter">Share on Twitter</button>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</aside>
