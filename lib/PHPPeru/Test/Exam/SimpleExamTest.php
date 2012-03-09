<?php
namespace PHPPeru\Test\Exam;

use PHPPeru\Exam\SimpleExam;

/**
 * Test class for SimpleExam.
 * Generated by PHPUnit on 2012-03-09 at 21:22:33.
 */
class SimpleExamTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleExam
     */
    protected $exam;

    /**
     * Sets up the exam to be used
     */
    protected function setUp()
    {
        $this->exam = new SimpleExam();
    }

    /**
     * @covers PHPPeru\Exam\SimpleExam::start
     * @covers PHPPeru\Exam\SimpleExam::isStarted
     */
    public function testStart()
    {
        $this->exam->start();
        $this->assertTrue($this->exam->isStarted());
        $this->assertFalse($this->exam->isNew());
        $this->assertFalse($this->exam->isAborted());
        $this->assertFalse($this->exam->isCompleted());
    }

    /**
     * @covers PHPPeru\Exam\SimpleExam::abort
     * @covers PHPPeru\Exam\SimpleExam::isAborted
     */
    public function testAbort()
    {
        $this->exam->start();
        $this->exam->abort();
        $this->assertTrue($this->exam->isAborted());
        $this->assertFalse($this->exam->isNew());
        $this->assertFalse($this->exam->isStarted());
        $this->assertFalse($this->exam->isCompleted());
    }

    /**
     * @covers PHPPeru\Exam\SimpleExam::complete
     * @covers PHPPeru\Exam\SimpleExam::isCompleted
     * @todo Implement testComplete().
     */
    public function testComplete()
    {
        $this->exam->start();
        $this->exam->complete();
        $this->assertTrue($this->exam->isCompleted());
        $this->assertFalse($this->exam->isNew());
        $this->assertFalse($this->exam->isStarted());
        $this->assertFalse($this->exam->isAborted());
    }

    /**
     * Checks that newly created exams are marked as new 
     *
     * @covers PHPPeru\Exam\SimpleExam::isNew
     */
    public function testIsNew()
    {
        $this->assertTrue($this->exam->isNew());
        $this->assertFalse($this->exam->isStarted());
        $this->assertFalse($this->exam->isAborted());
        $this->assertFalse($this->exam->isCompleted());
    }
    

    /**
     * Checks that newly created exams have an associated event dispatcher 
     *
     * @covers PHPPeru\Exam\SimpleExam::isNew
     */
    public function testGetEventDispatcher()
    {
        $this->assertInstanceOf(
            'Symfony\Component\EventDispatcher\EventDispatcherInterface',
            $this->exam->getEventDispatcher()
        );
    }

}