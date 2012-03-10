<?php

namespace PHPPeru\Exam;

/**
 * Description of SimpleStep
 *
 * @author juan
 */
class SimpleStep implements StepInterface {

    protected $status;
    protected $description;

    const STATUS_NEW = 0;
    const STATUS_READ = 1;
    const STATUS_ANSWERED = 2;

    public function __construct($description) {       
        $this->setDescription($description);
    }
    
    private function setDescription($description)
    {
        if( !empty($description) && empty($this->description ) )
        {
            $this->description = $description;
        }
        else
        {
            throw new InvalidArgumentException("Description is already defined or the passed value is not valid.");
        }
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->description;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}

?>
