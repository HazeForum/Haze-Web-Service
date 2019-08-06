<?php


namespace Core;
use Exception;


class HazeException extends Exception
{
    private $ErrorMessage;

    /**
     * HazeException constructor.
     * @param String $code
     */
    public function __construct(String $code) {

        $this->ErrorMessage = ErrorLibrary::out($code);

        self::CustomMessage($code);
        parent::__construct( $this->ErrorMessage );

    }

    /**
     * @return string
     */
    public function __toString() {
        return __CLASS__ . ": {$this->ErrorMessage}. ";
    }

    /**
     * @param $code
     */
    public static function CustomMessage($code) {
        echo "
            <h2>An error has occurred. [$code] </h2>
            <h5 style='margin-top: -10px'>For more details check our Error Library on https://hws.hazeforum.com</h5>
        ";
    }
}