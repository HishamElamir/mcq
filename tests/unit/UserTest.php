<?php
namespace app\tests\unit;

use yii;
use app\models\User;

 
class UserTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $user_id;
	
    
    protected function _before()
    { 
    	   echo "Inside _befor Function ";
    	  // $user = new User();
    }
    
    

    protected function _after()
    {
    	   echo "Inside _after Function ";
    }

    // tests
    public function testMe()
    {
    	$this->user_id = 250;
    	$this->tester->assertEquals(2500, $this->user_id);
    	echo "Inside Test ME Function ";
    }
}