<?php

require_once "InternetProvajder.php";
require_once "PrepaidKorisnik.php";
require_once "PostpaidKorisnik.php";
require_once "Korisnik.php";
require_once "TarifniPaket.php";
require_once "TarifniDodatak.php";
require_once "ListingUnos.php";

$mts = new InternetProvajder("mts");
$telekom = new InternetProvajder("telekom");
$sbb = new InternetProvajder("sbb");

$facebook = new TarifniDodatak(900, "facebook");
$instagram = new TarifniDodatak(1000, "instagram");
$iptv = new TarifniDodatak( 1600, "iptv");
$viber = new TarifniDodatak(1200, "viber");
$twitter = new TarifniDodatak(700, "twitter");
$fiksna_telefonija = new TarifniDodatak(1000, "fiksna_telefonija");

$niz1 = [$facebook, $instagram, $iptv, $viber, $twitter, $fiksna_telefonija];
print_r("Tarifni dodaci:<br><br>");
foreach ($niz1 as $item)
{
    $item->ispisDodatka();
}
print_r("<hr>");

$tarifniPaket1 = new TarifniPaket(1, 100, true, 100,  1);
$tarifniPaket2 = new TarifniPaket(2, 200, false, 200,  2);
$tarifniPaket3 = new TarifniPaket(3, 300, true, 300,  3);

$niz2 = [$tarifniPaket1, $tarifniPaket2, $tarifniPaket3];
print_r("Tarifni paketi:<br><br>");
foreach ($niz2 as $item)
{
    $item->ispisTarifnogPaketa();
}
print_r("<hr>");

$postpaidKorisnik1 = new PostpaidKorisnik($telekom, "Marko", "Markovic", "DSHAjasdh", "123", $tarifniPaket1);
$postpaidKorisnik2 = new PostpaidKorisnik($mts, "Suza", "Suza", "Suzica", "23141234", $tarifniPaket2 );
$postpaidKorisnik3 = new PostpaidKorisnik($sbb, "Mau", "Mauowski", "Buraz ne znam vise", "2341235123", $tarifniPaket3);

$prepaidKorisnik1 = new PrepaidKorisnik($mts, "Mika", "Mikic", "LAKSALKS", "281", $tarifniPaket1, 2000);
$prepaidKorisnik2 = new PrepaidKorisnik($telekom, "Zika", "Zikic", "JSDJJSJ", "2939", $tarifniPaket2, 4000);
$prepaidKorisnik3 = new PrepaidKorisnik($sbb, "Pera", "Peric", "Perina 12341", "237", $tarifniPaket3, 10000);

$prepaidKorisnik1->ispisKorisnika();
$prepaidKorisnik1->dopuniKredit(200000);
print_r("Dodat kredit <br>");
$prepaidKorisnik1->ispisKorisnika();
print_r("<br>");

print_r("<br><br>");

$postpaidKorisnik1->dodajTarifniDodatak($facebook);
print_r("<br>");
$postpaidKorisnik1->dodajTarifniDodatak($instagram);
print_r("<br>");
$postpaidKorisnik1->dodajTarifniDodatak($iptv);
print_r("<br>");
$postpaidKorisnik1->dodajTarifniDodatak($viber);
print_r("<br>");
$postpaidKorisnik1->dodajTarifniDodatak($twitter);
print_r("<br>");
$postpaidKorisnik1->dodajTarifniDodatak($fiksna_telefonija);
print_r("<br>");

$prepaidKorisnik1->dodajTarifniDodatak($facebook);
print_r("<br>");
$prepaidKorisnik1->dodajTarifniDodatak($instagram);
print_r("<br>");
$prepaidKorisnik1->dodajTarifniDodatak($iptv);
print_r("<br>");
$prepaidKorisnik1->dodajTarifniDodatak($viber);
print_r("<br>");
$prepaidKorisnik1->dodajTarifniDodatak($twitter);
print_r("<br>");
$prepaidKorisnik1->dodajTarifniDodatak($fiksna_telefonija);
print_r("<br>");

print_r("<b>Korisnici nakon dodavanja tarifnih dodataka</b> <br>");
print_r("<hr>");

$postpaidKorisnik1->ispisKorisnika();
print_r("<br>");
print_r("<hr>");
$prepaidKorisnik1->ispisKorisnika();
print_r("<br>");
print_r("<hr>");

print_r("Prikaz postpaid korisnika u SBB <br>");
$sbb->prikazPostpaidKorisnika();
print_r("<br>");
print_r("<hr>");

print_r("Prikaz prepaid korisnika u SBB<br>");
$sbb->prikazPostpaidKorisnika();
print_r("<br>");
print_r("<hr>");

print_r("Prepaid korisnik surfuje<br>");
$prepaidKorisnik1->surfuj("1324qwer1234.com", 123);
$prepaidKorisnik1->surfuj("1324qwer.com", 1213);
$prepaidKorisnik1->surfuj("twitter.com", 12);

print_r("<br>");
print_r("<hr>");

print_r("Postpaid korisnik surfuje:<br>");
$postpaidKorisnik1->surfuj("1234.asd", 120);
print_r("<br>");
$postpaidKorisnik1->surfuj("facebook.com", 123);
print_r("<br>");
$postpaidKorisnik1->surfuj("mnau.asd", 60);
print_r("<br>");
$postpaidKorisnik1->surfuj("mnau.asd", 600);
print_r("<br>");
$postpaidKorisnik1->surfuj("mnau.asd", 10);
print_r("<br>");
print_r("<hr>");

print_r("Listing postpaid korisnika: <br>");
$postpaidKorisnik1->napraviListing();
print_r("Listing prepaid korisnika:<br>");
$prepaidKorisnik1->napraviListing();
print_r("<br>");
print_r("<hr>");
$sbb->ispisInternetProvajdera();
print_r("<br>");
print_r("<hr>");
$telekom->ispisInternetProvajdera();
print_r("<br>");
print_r("<hr>");
$mts->ispisInternetProvajdera();
print_r("<br>");
print_r("<hr>");
print_r("Saobracaj u sbb-u:<br>");
$sbb->ispisSaobracaja();
print_r("<br>");

