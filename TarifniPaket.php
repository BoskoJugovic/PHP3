<?php


class TarifniPaket
{
    protected $maksimalnaBrzina; // int
    protected $cenaPaketa; // float
    protected $neogranicenSaobracaj; // bool
    protected $megabajti; // int
    protected $cenaPoMegabajtu; // float

    /**
     * TarifniPaket constructor.
     * @param $maksimalnaBrzina
     * @param $cenaPaketa
     * @param $neogranicenSaobracaj
     * @param $megabajti
     * @param $cenaPoMegabajtu
     */
    public function __construct(int $maksimalnaBrzina,float $cenaPaketa,bool $neogranicenSaobracaj,int $megabajti,float $cenaPoMegabajtu)
    {
        $this->maksimalnaBrzina = $maksimalnaBrzina;
        $this->cenaPaketa = $cenaPaketa;
        $this->neogranicenSaobracaj = $neogranicenSaobracaj;
        $this->megabajti = $megabajti;
        $this->cenaPoMegabajtu = $cenaPoMegabajtu;
    }

    public function ispisTarifnogPaketa()
    {
        print_r("Max brzina: {$this->maksimalnaBrzina} <br>");
        print_r("Cena: {$this->cenaPaketa} <br>");
        if(!$this->neogranicenSaobracaj)
        {
            print_r("Neogranicen saobracaj: ne <br>");
        }
        else
        {
            print_r("Neogranicen saobracaj: da <br>");
        }
        print_r("Megabajti: {$this->megabajti}<br>");
        print_r("Cena po megabajtu: {$this->cenaPoMegabajtu}<br>");


    }

    /**
     * @return float
     */
    public function getCenaPaketa(): float
    {
        return $this->cenaPaketa;
    }

    /**
     * @return bool
     */
    public function isNeogranicenSaobracaj(): bool
    {
        return $this->neogranicenSaobracaj;
    }

    /**
     * @return int
     */
    public function getMegabajti(): int
    {
        return $this->megabajti;
    }

    /**
     * @return float
     */
    public function getCenaPoMegabajtu(): float
    {
        return $this->cenaPoMegabajtu;
    }








}