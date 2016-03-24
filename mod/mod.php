<?php
class MOD
{
public static function zaszlo()
{
    include_once 'mod/zaszlo/zaszlo.php';
    $zaszlo=new Zaszlo();
    return $zaszlo->eng_hu();
}
public static function btc()
{
    $rates = GOB::$client->getExchangeRates('btc');
    return $rates['rates']['USD'];
}
public static function rotator()
{
    include_once 'mod/rotator/rotator.php';
    $rotator=new Rotator();
    return $rotator->result();
}
public static function login()
    {
        include_once 'mod/login/login.php';
        $login=new Login();
        $func= ModTaskS::get_funcnev($login,'LogADT');
         $login->$func(); //echo $func;
       // print_r(GOB::$hiba);
        LogADT::$view=FeltoltS::from_sajatLT(LogADT::$view,'ModLT');
            return LogADT::$view;
    }
public static function ikonsor($ikonok=array('uj','szerk','pub','unpub','torol','email'))
    {
        include_once 'mod/ikonsor/ikonsor.php';
        $ob=new Ikonsor();
        $ob->mezok=$ikonok;
        return $ob->result();
    }
public static function tabla($dataszerk,$datatomb)
    {
        include_once 'mod/tabla/tabla.php';
        $ob=new Tabla($dataszerk,$datatomb);
        return $ob->result();
    }
public static function email()
{
    include_once 'mod/email/email.php';
    $ob=new Mail();
    return $ob->result();
}
}