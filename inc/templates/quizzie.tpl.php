<aside class="quizzie" id="<?php echo esc_attr( $id ) ?>">
	<div class="quizzie-quiz">
	<h3><?php echo esc_html( $question ) ?></h3>
	<img src="<?php echo esc_attr( $image_url ) ?>" class="quizzie-img" />
		<ul class="quizzie-poll">
			<?php for ( $i = 0; $i < count( $options ); $i++ ): ?>
				<li class="quizzie-option quizzie-option-<?php echo esc_attr( $i + 1 ) ?>">
					<h4><?php echo esc_html( $options[$i]['title'] ) ?></h4>
					<p><?php echo esc_html( $options[$i]['description'] ) ?></p>
				</li>
			<?php endfor; ?>
		</ul>
	</div>
	<div class="quizzie-results">
	</div>
</aside>
