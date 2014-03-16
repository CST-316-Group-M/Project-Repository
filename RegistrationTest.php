<?php 
class RegistrationTest extends PHPUnit_Framework_TestCase {
		
		$reg = new Registration();
		
		public function formTest() {
			// if possible - should not be, function will
			// wait for values, but check entered values - null
		}
		
		public function czechAccountTest() {
			// run non duplicate query
			assertTrue(reg->duplicates());
			// run duplicate query
			assertTrue(reg->duplicates());
		}
		 
	}