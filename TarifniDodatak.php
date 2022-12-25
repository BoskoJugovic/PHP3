<?php


class TarifniDodatak
{
    protected $cenaDodatka;
    protected $tipDodatka; // facebook, insta, iptv, twitter, viber, fiksna_telefonija

    /**
     * TarifniDodatak constructor.
     * @param $cenaDodatka
     * @param $tipDodatka
     */
    public function __construct($cenaDodatka, $tipDodatka)
    {
        $this->cenaDodatka = $cenaDodatka;

        if($tipDodatka != "facebook" && $tipDodatka != "instagram" && $tipDodatka != "iptv" && $tipDodatka != "twitter" && $tipDodatka != "fiksna_telefonija" && $tipDodatka != "viber")
        {
            $this->tipDodatka = null;
            print_r("Doslo je do greske. Naziv mora biti facebook / instagram / iptv / twitter / fiksna_telefonija / viber <br>");
        }
        else
        {
            $this->tipDodatka =$tipDodatka;
        }
    }

    public function ispisDodatka()
    {
        if($this->tipDodatka != null)
        {
            print_r("Tarifni dodatak: {$this->tipDodatka}<br>Cena: {$this->cenaDodatka} <br><br>");
        }
        else
        {
            return;
        }
    }

    /**
     * @return mixed
     */
    public function getTipDodatka()
    {
        return $this->tipDodatka;
    }

    /**
     * @return mixed
     */
    public function getCenaDodatka()
    {
        return $this->cenaDodatka;
    }



}