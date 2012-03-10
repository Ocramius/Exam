<?php
namespace PHPPeru\Exam;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SimpleStep
 *
 * @author juan
 */
class SimpleStep implements StepInterface {
    
    protected $description;
    //put your code here
    public function setDescription($description) {
        
        if(!empty($description))
        {
            $this->description = $description;
        }
       
    }

    public function getDescription() {
        return $this->description;
    }
    
    
}

?>
