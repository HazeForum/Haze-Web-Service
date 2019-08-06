<?php


namespace Core;
use Exception;


class HazeException extends Exception
{
    private $ErrorMessage;

    public function __construct(String $code) {

        $this->ErrorMessage = ErrorLibrary::out($code);

        self::CustomException($code);
        parent::__construct( $this->ErrorMessage );

    }

    public function __toString() {
        return __CLASS__ . ": {$this->ErrorMessage}. ";
    }

    public static function CustomException($code) {
        echo "
            <h2>An error has occurred. </h2>
            <h4>Code: [$code]</h4>
            <h5>For more details check our Error Library on https://hws.hazeforum.com</h5>
        ";
    }
}