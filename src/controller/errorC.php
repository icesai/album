<?php
namespace  controller;

use model\ErrormsgM;

class ErrorC
{
    public function showErrorC($ercode)
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new ErrormsgM();
        $ermsg[0] = $aaa->whatMsg($ercode);
        echo $twig->render('errormsgT.html', array('msg'=>$ermsg));
        }
}
