jQuery(document).ready(function($) {

	var QuizzieModel = Backbone.Model.extend();

	var QuizzieView = Backbone.View.extend({
		events: {
			'click .quizzie-option': 'handleOptionClick'
		},
		handleOptionClick: function(e) {
			var optionId = this.$(e.target).data('option');
			this.showOptionChoiceResult(optionId);
		},
		showOptionChoiceResult: function(optionId) {
			console.log( 'SHOWING OPTION RESULT: ' + optionId );
		}
	});

	$('.quizzie').each(function(i, el) {
		var quizId = parseInt($(el).data('id'));
		var quizModel = new QuizzieModel({id: quizId});
		var quizView = new QuizzieView({
			model: quizModel,
			el: el
		});
	});

});
