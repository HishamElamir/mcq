<?php
 

class CourseTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester; // object
	
    protected function _before()
    {
        $var = 250;
        $this->tester->assertEquals($expected, $actual);
        
        // preparing a user, inserting user record to database
        $this->user_id = $this->tester->haveRecord('users', [
        		'username' => 'John',
        		'email' => 'john@snow.com',
        		'activation_key' => '123456',
        		'is_active' => 0
        		 
        ]);
        
      
        
    }

    protected function _after()
    {
        $var = null;
    }

    // tests
    public function testMe()
    {

    }
}