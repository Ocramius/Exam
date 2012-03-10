<?php
namespace PHPPeru\Test\Exam;

use PHPPeru\Exam\SimpleStep;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SimpleStepTest
 *
 * @author juan
 */
class SimpleStepTest extends \PHPUnit_Framework_TestCase {
    //put your code here

    protected $step;
    
    public function setUp(){
        $this->step = new SimpleStep();
    }
    
    public function tearDown(){
        $this->step = null;
    }
        
    public function testSetDescriptionWithNullValue()
    {
        $this->step->setDescription(null);  
        $this->assertNull( $this->step->getDescription() );
    }
    
    public function testSetDescriptionWithEmptyString()
    {
        $this->step->setDescription("");  
        $this->assertNull( $this->step->getDescription() );
    }
    
}

?>
