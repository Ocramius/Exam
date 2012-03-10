<?php
namespace PHPPeru\Exam;

interface StepInterface {
     
    public function getDescription();
    public function isNew();
    public function isRead();
    public function isAnswered();
    
}

?>
