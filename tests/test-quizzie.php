<?php
class Test_Quizzy extends WP_UnitTestCase {
	function test_quizzy_initializer() {
		$this->assertEquals( Quizzy(), Quizzy::get_instance() );
	}
}
