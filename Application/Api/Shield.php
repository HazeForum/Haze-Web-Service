<?php


namespace Api;


use Http\Request;

class Shield
{
    public $Error;

    private $Blocks;

    public $Request_Type = 'GET';

    public function Method(String $Method) {
        $this->Blocks['Method'] = Request::validate_method($Method);
        $this->Request_Type = $Method;
    }

    public function Params(Array $Values) {
        $this->Blocks['Values'] = Request::is_getted($Values, $this->Request_Type);
    }

    public function Protect()
    {
        if ($this->has_error()) {

            $Additional = "On {$this->Error[0]}";
            Response::error(403, 'Ex200', $Additional);

            exit;

        }
    }

    private function has_error() {
        $block = $this->blocks_is_valid();

        if ($block === true)
        {
            return false;
        }
        else
        {
            $this->Error = $block;
            return true;
        }

    }

    /**
     * @return bool
     */
    private function blocks_is_valid() {

        foreach($this->Blocks as $key => $blocked):

            if (!$blocked)
                return [$key, $blocked];

        endforeach;

        return true;
    }

}