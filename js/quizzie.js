
var QuizzieQuizzes = {
	123: {
		name: 'My First Quiz'
	}
}

var QuizzieModel = Backbone.Model.extend(
);

var QuizzieView = Backbone.View.extend({
	render: function() {
		var compiled = _.template(jQuery('#quizzie-template').html());
		this.$el.html(compiled({model: this.model}));
	}
});

jQuery(document).ready(function($) {

	$('.quizzie').each(function(i, el) {
		console.log( el );
		console.log( $(el) );
		console.log( $(el).data() );
		console.log( $(el).data('id') );
		var quizId = parseInt($(el).data('id'));
		var quizId = parseInt($(el).data('id'));
		console.log( 'ID: ', quizId );
		var quizData = QuizzieQuizzes[quizId];
		quizData.id = quizId;
		var quizModel = new QuizzieModel(quizData);
		var quizView = new QuizzieView({
			model: quizModel,
			el: el
		});
		quizView.render();
	});

});
