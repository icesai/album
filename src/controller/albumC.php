<?php
namespace controller;

use model\DbconM;
use model\ErrormsgM;
use model\ImgM;

class AlbumC
{

    public function overPage($goto)
    {
        header('Location: '.$goto);
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
                $tmpname = $_FILES["file"]["name"];
                $imgname = $_POST["imgname"];
                $username = $_POST["username"];
                $loader = new \Twig_Loader_Filesystem('templates');
                $twig = new \Twig_Environment($loader);
                $aaa = new ImgM();                
                $aaa->newImg($tmpname, $imgname, $username);
                $msg = array($_POST["imgname"], $_POST["username"]);
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
        $imgno=$_GET["imgno"];
        $imgname=$_GET["imgname"];
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new ImgM();
        $result = $aaa->editImg($imgno, $imgname);
        $i=0;
        foreach ($result as $row) {
            $see[$i]= $row;
            $i++;
        }
        echo $twig->render('editalbumT.html', array('seeall'=>$see));
    }
    public function delimgC()
    {
        $imgno = $_POST["imgno"];
        $aaa = new ImgM();
        $result = $aaa->delImg($imgno);
        echo AlbumC::overPage('/edit');
    }
}