<?php


class ListingUnos
{
    protected $url;
    protected $megabajti;


    public function __construct($url, $megabajti)
    {
        $this->url = $url;
        $this->megabajti = $megabajti;
    }

    /**
     * @return mixed buraz bas me mrzi da brisem svaki ovaj komentar...
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getMegabajti()
    {
        return $this->megabajti;
    }


    public function dodajMegabajte(int $megabajti)
    {
        $this->megabajti += $megabajti;
    }

    public function ispisListinga()
    {
        return "Url: {$this->url}, MB: {$this->megabajti} <br>";
    }

}