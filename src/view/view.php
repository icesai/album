<?php
namespace see;

class View
{

    private $data;

    public function __construct($result, $template)
    {
        include "$template";
    }
}
