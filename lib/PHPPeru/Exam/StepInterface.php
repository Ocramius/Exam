<?php
namespace PHPPeru\Exam;

interface StepInterface {
     
    public function getDescription();
    public function setStatus($status);
    public function getStatus();
    
}

?>
