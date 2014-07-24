<?php

class view
{
    private $data;

    public function __construct($result1, $template)
    {
        include "$template";
    }
}
