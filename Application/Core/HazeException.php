<?php


namespace Core;
use Exception;

class HazeException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}. For more details check our Error Library on 'https://hws.hazeforum.com'";
    }

    public function BrazilizanExcepetion() {
        // TODO
    }
}