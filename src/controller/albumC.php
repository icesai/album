<?php
namespace controller;

use model\DbconM;
use model\ErrormsgM;
use model\ImgM;

class AlbumC
{

    public function overPage($goto)
    {
        return "<script>window.location.replace('{$goto}')</script>";
    }

    public function imgMainC()
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new ImgM();
        $result = $aaa->showImg();
        $i=0;
        foreach ($result as $row) {
            $see[$i]= $row;
            $i++;
        }
        echo $twig->render('imgsT.html', array('seeall'=>$see));
    }
    
    public function uploadImgC()
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $result[0] = '/doupload';
        echo $twig->render('uploadT.html', array('res'=>$result));
    }
    
    public function douploadC()
    {
        if ($_FILES["file"]["error"] > 0) {

            $msg = '1';
        } else {
            if (file_exists("img/" . $_FILES["file"]["name"])) {

                $msg = '2';
            } else {
                $loader = new \Twig_Loader_Filesystem('templates');
                $twig = new \Twig_Environment($loader);
                $aaa = new ImgM();                
                $msg = $aaa->newImg();
                echo $twig->render('uploadokT.html', array('upmsg'=>$msg));
                exit();
            }
        }
        switch ($msg)
        {
            case "1":
            case "2":
                ErrorC::showErrorC($msg);
                break;
            default:
                $msg="3";
                ErrorC::showErrorC($msg);
                break;
        }
    }
    public function editC()
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new ImgM();
        $result = $aaa->showImg();
        $i=0;
        foreach ($result as $row) {
            $see[$i]= $row;
            $i++;
        }
        echo $twig->render('editalbumT.html', array('seeall'=>$see));
    }
    public function doeditC()
    {
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new ImgM();
        $result = $aaa->editImg();
        $i=0;
        foreach ($result as $row) {
            $see[$i]= $row;
            $i++;
        }
        echo $twig->render('editalbumT.html', array('seeall'=>$see));
    }
    public function delimgC()
    {
        $aaa = new ImgM();
        $result = $aaa->delImg();
        echo Albumcontroller::overPage('/edit');
    }
}