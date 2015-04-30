jQuery(document).ready(function($) {

	var QuizzieView = Backbone.View.extend({
		events: {
			'click .quizzie-option': 'handleOptionClick',
			'click .quizzie-quiz.answered': 'handleAnsweredClick'
		},
		handleOptionClick: function(e) {
			var optionId = this.$(e.target).closest('.quizzie-option').data('option');
			this.showOptionChoiceResult(optionId);
		},
		handleAnsweredClick: function() {
			this.$('.quizzie-quiz').removeClass('answered');
			this.$('.quizzie-result').removeClass('selected');
		},
		showOptionChoiceResult: function(optionId) {
			this.$('.quizzie-quiz').addClass('answered');
			this.getOptionResultElement(optionId).addClass('selected');
		},
		getOptionResultElement: function(optionId) {
			return this.$('.quizzie-result[data-option="' + optionId + '"]');
		}
	});

	$('.quizzie').each(function(i, el) {
		var quizView = new QuizzieView({el: el});
	});

});
