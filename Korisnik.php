<?php
require_once "ListingUnos.php";
require_once "IzradaListinga.php";
require_once "InternetProvajder.php";
require_once "TarifniPaket.php";

abstract class Korisnik implements IzradaListinga
{
    protected $internetProvajder;
    protected $ime;
    protected $prezime;
    protected $adresa;
    protected $brojUgovora;
    protected $tarifniPaket;
    protected $listingUnosa = [];


    public function __construct(InternetProvajder $internetProvajder,string $ime,string $prezime,string $adresa,string $brojUgovora,TarifniPaket $tarifniPaket)
    {
        $this->internetProvajder = $internetProvajder;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->adresa = $adresa;
        $this->brojUgovora = $brojUgovora;
        $this->tarifniPaket = $tarifniPaket;
    }


    public function dodajListingUnos(ListingUnos $listingUnos)
    {
        $postoji = false;

        foreach ($this->listingUnosa as $item)
        {
            if($item->getUrl() == $listingUnos->getUrl())
            {
                $item->dodajMegabajte($listingUnos->getMegabajti());
                print_r("{$listingUnos->getMegabajti()} MB je dodato za  {$item->getUrl()}");
                $postoji = true;
            }
        }
        if ($postoji == false)
        {
            array_push($this->listingUnosa, $listingUnos);
        }

    }

    public function napraviListing() :string
    {
        rsort($this->listingUnosa); //ovo je sortiranje niza listing
        $ispis = "";
        foreach ($this->listingUnosa as $item)
        {
            $ispis .= $item->ispisListinga();
        }
        return $ispis;
    }

    public function ispisKorisnika()
    {
        print_r("Ime: {$this->ime} <br>Prezime: {$this->prezime} <br>Broj Ugovora: {$this->brojUgovora} <br>");
    }

    /**
     * @return string
     */
    public function getBrojUgovora(): string
    {
        return $this->brojUgovora;
    }


    public abstract function surfuj(string $url, int $megabajti) :bool;
    public abstract function dodajTarifniDodatak(TarifniDodatak $tarifniDodatak);
}