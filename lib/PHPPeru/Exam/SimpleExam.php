<?php
namespace PHPPeru\Exam;

use Symfony\Component\EventDispatcher\EventDispatcherInterface,
    Symfony\Component\EventDispatcher\EventDispatcher,
    BadMethodCallException;

/**
 * Provides a simple concrete exam object that is able to trigger events during
 * its lifecycle.
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 * @todo eventually define if ".pre" or ".post" events should be used.
 */
class SimpleExam implements ExamInterface
{
    
    const STATUS_NEW        = 0;
    const STATUS_STARTED    = 1;
    const STATUS_ABORTED    = 2;
    const STATUS_COMPLETED  = 4;

    /**
     * Event dispatcher used internally to trigger events during lifecycle
     *
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;
    
    /**
     * Defines the current status of the exam
     *
     * @var type 
     */
    protected $status = self::STATUS_NEW;
    
    /**
     * Default constructor, initializes events 
     */
    public function __construct()
    {
        $this->eventDispatcher = new EventDispatcher();
    }

    /**
     * {@inheritdoc}
     */
    public function start()
    {
        if ($this->status !== self::STATUS_NEW) {
            throw new BadMethodCallException('Exam is not new');
        }
        $this->status = self::STATUS_STARTED;
        $this->eventDispatcher->dispatch('begin', new Event($this));
    }

    /**
     * {@inheritdoc}
     */
    public function abort()
    {
        if ($this->status !== self::STATUS_STARTED) {
            throw new BadMethodCallException('Exam is not started');
        }
        $this->status = self::STATUS_ABORTED;
        $this->eventDispatcher->dispatch('abort', new Event($this));
    }

    /**
     * {@inheritdoc}
     */
    public function complete()
    {
        if ($this->status !== self::STATUS_STARTED) {
            throw new BadMethodCallException('Exam is not started');
        }
        $this->status = self::STATUS_COMPLETED;
        $this->eventDispatcher->dispatch('complete', new Event($this));
    }

    /**
     * Checks if the exam is new
     *
     * @return bool 
     */
    public function isNew()
    {
        return $this->status === self::STATUS_NEW;
    }

    /**
     * Checks if the exam has been started
     *
     * @return bool 
     */
    public function isStarted()
    {
        return $this->status === self::STATUS_STARTED;
    }

    /**
     * Checks if the exam has been aborted
     *
     * @return bool 
     */
    public function isAborted()
    {
        return $this->status === self::STATUS_ABORTED;
    }

    /**
     * Checks if the exam has been completed
     *
     * @return bool 
     */
    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }
    
    /**
     * Retrieves the associated event dispatcher
     *
     * @return EventDispatcherInterface 
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }
}