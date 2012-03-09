# Exam Prototype

## Aim of the project

This project is a prototype that should help in experimenting event-driven development in PHP.

The aim is not to produce an entire application, but just a service layer that is able
to reproduce the workflow of an exam and allow to build flexible applications on it.

*All following documentation can be subject to modifications by the working group.*

## Definition of "exam"

 > *examination*: a set of questions or exercises evaluating skill or knowledge;

In a wider view, an exam could also just be a forced set of lectures/audio tracks to ensure that
a user has obtained some knowledge. It could also be an extended poll for market research
and so on.

## Requirements

 - An exam has (in most cases) following workflow:

    1.  Exam is booked/generated for various users (like at university). User gets notification
        about the assigned exam (optional)
    2.  User takes the exam by starting it
    3.  User goes through the various step that compose the exam and answer/follow instructions
        in each step
    4.  User completes the exam or eventually aborts it. Abort can either be explicit or implicit
        (user does not complete it in time, if time limit is set)
    5.  Exam is evaluated
    6.  User get achievements (optional)

## Suggestions

### Suggested dependencies and patterns

To achieve what defined in the requirements and still keep a very flexible structure,
event driven design has been choosen as the best fit for this prototype.
Other approaches and suggestions are welcome.

Implementations should use either Symfony2's `Symfony\Component\EventDispatcher` component
or Zend Framework 2's `Zend\EventManager` component. This decision is up to the developers
working on the concept. Also, suggestions for improvement for both components could be 
collected.

### Suggested interface interactions

 -   An `Exam` is a set of `Exam\Step` instances.
 -   An `Exam` has a reference to a `User` that is taking it.
 -   An `Exam` can generate an `Exam\Evaluation`
 -   An `Exam\Step` can generate an `Exam\Step\Evaluation`

### Suggested RFC

 -   `Exam`:
      -   must provide a description of itself
      -   must provide the `User` that is taking it
      -   must provide its current status (`new`, `started`, `aborted`, `completed`)
      -   must behave like an `Iterator` for steps (moving to arbitrary step is not 
          a requirement)
      -   must provide a evaluation
      -   could provide a start and/or an end time limit
      -   must trigger events for
           -   `create` when created/planned
           -   `start` when taken by the `User`
           -   `complete` when completed
           -   `abort` when aborted (also: how do we know when it is aborted?)
           -   `iterate` whenever iteration over steps happens (more events can be
               applied to the iterator)
 -   `Exam\Step`
      -   must provide a description of itself
      -   must provide its status (`new`, `read`, `answered`)
      -   could accept an answer (steps with forced lectures could not need an answer)
      -   must provide an evaluation
      -   must trigger events for
           -   `visit` when visited
           -   `answer` when answered
 -   `Exam\Evaluation`
      -   must provide a boolean serialization (`passed`/`failed`)
 -   `Exam\Step\Evaluation`
      -   must provide a boolean serialization (`passed`/`failed`)

### Suggested interface - TBD

*will provide sample interface and eventually sample implementation*

## Workflow of the hack session

 1.  Define how an eventual service should be structured:
      -   Should it provide exam instances (like a 
          `Doctrine\Common\Persistence\ObjectRepository`?)
      -   Should it provide ways to interact with an exam 
          instance, like `$service->startExam($exam);` or
          should those methods be used on the `Exam` instance
          itself?
 2.  Define a basic interface
      -   What methods are needed?
      -   What methods are against "YAGNI"?
      -   What objects should register event listeners (if the event components are used)?
 3.  Build simple implementation of the interface and ensure that all that all events are
     fired correctly through unit tests with mocked event listeners.
 4.  Eventually proceed with building a schema/entity/document graph compatible with
     the concepts of the `Doctrine\Common\Persistence` project (do not keep persistence
     in mind until interface is done!)
