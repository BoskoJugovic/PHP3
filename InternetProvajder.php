<?php

require_once "Korisnik.php";
require_once "PrepaidKorisnik.php";
require_once "PostpaidKorisnik.php";


class InternetProvajder
{
    protected $ime;
    protected $korisnici = [];
    protected $saobracaj = [];


    public function __construct($ime)
    {
        $this->ime = $ime;
    }


    public function generisiRacune()
    {
        foreach ($this->korisnici as $item)
        {
            if($item instanceof PostpaidKorisnik)
            {
                $item->generisiRacun();
            }
        }
    }

    public function zabeleziSaobracaj(Korisnik $korisnik, string $url, int $megabajti)
    {
        foreach ($this->korisnici as $item)
        {
            if($item->getBrojUgovora() == $korisnik->getBrojUgovora())
            {
                $ispis = "Broj ugovora: {$korisnik->getBrojUgovora()} <br>URL: {$url} <br> MB: {$megabajti} <br>";
                print_r($ispis);
                array_push($this->saobracaj, $ispis);
            }
        }
    }

    public function prikazPrepaidKorisnika()
    {
        foreach ($this->korisnici as $item)
        {
            if($item instanceof PrepaidKorisnik)
            {
                $item->ispisKorisnika();
            }
        }
    }

    public function prikazPostpaidKorisnika()
    {
        foreach ($this->korisnici as $item)
        {
            if($item instanceof PostpaidKorisnik)
            {
                $item->ispisKorisnika();
            }
        }
    }

    public function dodajKorisnika(Korisnik $korisnik)
    {
        foreach ($this->korisnici as $item)
        {
            if($item->getBrojUgovora() == $korisnik->getBrojUgovora())
            {
                print_r("Broj ugovora vec postoji <br>");
                return;
            }
        }
    }

    public function ispisSaobracaja()
    {
        foreach ($this->saobracaj as $item)
        {
            print_r ($item . "<br>");
        }
    }


    public function ispisInternetProvajdera()
    {
        print_r("Ime: {$this->ime} <br>Korisnici: <br>");
        foreach ($this->korisnici as $item)
        {
            $item->ispisKorisnika();
        }
    }
}