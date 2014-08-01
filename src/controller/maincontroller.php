<?php
namespace controller;

use model\Dbconn;

class Albumcontroller{
    
    public function overPage($goto)
    {
        return "<script>window.location.replace('{$goto}')</script>";
    }
    
    public function albumC(){
        
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $sql = new Dbconn();
        $result = $sql->viewall();
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
        
            $see[$i]= $row;
            $i++;
        }
        echo $twig->render('albumT.html',array('seeall'=>$see));
    }
    
    public function uploadC(){
        
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $result[0] = '/doupload';
        echo $twig->render('uploadT.php',array('res'=>$result));
    }
    
    public function douploadC(){

        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new Dbconn();
        $msg = $aaa->upload();
        
        switch ($msg[0])
        {
            case a:
                echo $twig->render('uploaderrorT.html',array('upmsg'=>$msg));
                break;
        
            case b:
                echo $twig->render('uploadokT.html',array('upmsg'=>$msg));
                break;
                
            default:
                $msg=array("c","你這個小壞蛋！");
                echo $twig->render('uploaderrorT.html',array('upmsg'=>$msg));
                break;
        }     
    }
    
    public function editC(){
        
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        // $result = call_user_func(AAA.'\Dbconn::viewall');
        $sql = new Dbconn();
        $result = $sql->viewall();
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
        
            $see[$i]= $row;
            $i++;
        }
        
        echo $twig->render('editalbumT.html',array('seeall'=>$see));        
    }
    
    public function edit2C(){
        
        $loader = new \Twig_Loader_Filesystem('templates');
        $twig = new \Twig_Environment($loader);
        $aaa = new Dbconn();
        $result = $aaa->edit();
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
        
            $see[$i]= $row;
            $i++;
        }
        
        echo $twig->render('editalbumT.html',array('seeall'=>$see));
    }
    public function delimgC(){
        
        $aaa = new Dbconn();
        $result = $aaa->del();
        echo Albumcontroller::overPage('/');
    }
    
}



