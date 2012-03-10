<?php

/*
 * This file is part of the PHPPeru packages.
 *
 * (c) Luis Cordova <cordoval@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPPeru\Exam\Event;

/**
 * Events.php: Short description.
 *
 * Two line explanation.
 *
 * @author Luis Cordova <cordoval@gmail.com>
 */
final abstract class Events
{
    /**
     * The exam.start event is thrown each time a new is started
     * in the system.
     *
     * The event listener receives an PHPPeru\Exam\Event\ExamEvent
     * instance.
     *
     * @var string
     */
    const onStartExam = 'exam.start';

    /**
     * The exam.abort event is thrown each time a abort is started
     * in the system.
     *
     * The event listener receives an PHPPeru\Exam\Event\ExamEvent
     * instance.
     *
     * @var string
     */
    const onAbortExam = 'exam.abort';

    /**
     * The exam.complete event is thrown each time a complete is started
     * in the system.
     *
     * The event listener receives an PHPPeru\Exam\Event\ExamEvent
     * instance.
     *
     * @var string
     */
    const onCompleteExam = 'exam.complete';
}