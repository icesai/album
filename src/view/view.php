<?php

class view
{
    private $data;

    public function __construct($result, $template)
    {
        include "$template";
    }
}
