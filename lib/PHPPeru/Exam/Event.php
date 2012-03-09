<?php
namespace PHPPeru\Exam;

use Symfony\Component\EventDispatcher\Event as BaseEvent;

/**
 * Provides information about an exam lifecycle event
 *
 * @author ocramius
 */
class Event extends BaseEvent
{
    /**
     * The exam that triggered the event
     *
     * @var ExamInterface 
     */
    protected $exam;

    /**
     * Default constructor
     *
     * @param ExamInterface $exam 
     */
    public function __construct(ExamInterface $exam)
    {
        $this->exam = $exam;
    }
    
    /**
     * Retrieves the exam registered with the event
     *
     * @return ExamInterface 
     */
    public function getExam()
    {
        return $this->exam;
    }
}