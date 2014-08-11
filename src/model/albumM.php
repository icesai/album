<?php
namespace model;

class AlbumM extends DbconM
{
    private  $table;
    public function __construct()
    {
        $this->table = 'albums';
        parent::__construct();
    }

    public function newAlbum()
    {


    }

    public function showAlbum()
    {
        return self::select($this->table, $query);
    }

    public function editAlbum()
    {


    }

    public function delAlbum()
    {


    }
}