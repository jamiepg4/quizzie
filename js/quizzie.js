var QuizzieModel = Backbone.Model.extend(
);

var QuizzieView = Backbone.View.extend({
});

jQuery(document).ready(function($) {

	$('.quizzie').each(function(i, el) {
		var quizId = parseInt($(el).data('id'));
		var quizModel = new QuizzieModel({id: quizId});
		var quizView = new QuizzieView({
			model: quizModel,
			el: el
		});
	});

});
