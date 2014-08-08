<?php
namespace model;

class ErrormsgM
{

    public function whatMsg($ercode)
    {
       $erroris[0]='資料庫發生錯誤!';
       $erroris[1]='請確認您的檔案類型是否正確!';
       $erroris[2]='請勿重覆上傳相同檔案或更改檔案名稱！';
       $erroris[3]='上傳發生未定義錯誤請與管理者聯絡！';
       $erroris[4]='您沒有勾選任何要刪除的圖片！';
       
       $errormsg = $erroris[$ercode];
       return $errormsg;
    }
}
