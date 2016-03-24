<?php

class ADT
{
    public static $jog='admin';
    public static $task='alap';
    public static $hibaT=array();// GOB::$hiba[]tombnev
    public static $nev=''; //ha nem üres a task szerkeszt lesz, és ezt a mezőt szerkeszti
    public static $nevT=''; //csak azokat a mezőket veszi figyelembe amik itt szerepelnek
    public static $task_valaszt=array('post','get');
    public static $view='';
    public static $LT=array();
    public static $dataT=array();
    public static $katnev='userid'; //kategoria pl.: user adatoknál userid
    public static $kat='nyito'; //kategoria pl.: user adatoknál userid
    public static $tablanev='lng';
    public static $texturlap='app/admin/view/urlapok/nyitotxt.html';
    public static $inputurlap='app/admin/view/urlapok/nyitoinput.html';
    public static $view_file='tmpl/flat/content/nyito.html';
 // public static $func_aliasT=array();

}
class AlapView {
  public static function hibakiir(){
      $res='';
     foreach (ADT::$hibaT as $hiba){
         $res =$res.'<h4>'.$hiba.'</h4>';
     }
      return $res;
  }
    public static function feltolt_alap($dataT,$keres_string="/<!--##([^`]*?)-->/"){
        preg_match_all ($keres_string,ADT::$view , $matches);
        $cseretomb=$matches[1];
        foreach($cseretomb as $mezonev)
        {
            // print_r($LTnev::$$mezonev);
            if(isset($dataT[$mezonev] ))
            {
                $csere_str='<!--##'.$mezonev.'-->';
                ADT::$view= str_replace($csere_str,$dataT[$mezonev] ,ADT::$view );
            }


        }
    }
    public static function feltolt(){
        self::feltolt_alap(ADT::$LT,"/<!--##([^`]*?)-->/");
        self::feltolt_alap(ADT::$dataT,"/<!--#([^`]*?)-->/");
    }

    
  public static function szerk(){
      AppDataS::szerk();
      if(substr(ADT::$nev, 0, 2)=='tx')
      {$html=file_get_contents(ADT::$texturlap, true);}
      else
      {$html=file_get_contents(ADT::$inputurlap, true);}
      //hidden mező-------------------
      $html=str_replace('data="nev"', 'value="'.ADT::$nev.'"', $html );
      $html=str_replace('<!--#ertek-->', ADT::$dataT['ertek'], $html );
      $hiba=self::hibakiir();
      $html=str_replace('<!--#hiba-->', $hiba, $html );
      ADT::$view= $html;
  }
  public static function alap()
  {
      ADT::$view=file_get_contents(ADT::$view_file, true);
      ADT::$view= self::feltolt();

  }
}

class AlapAdmin {

    public function __construct()
    {

    }

    public function alap()
    {
      //if(method_exists ('DataS', 'alap')){DataS::alap();}
      DataS::alap();
      ViewS::alap();
    }
    public function ment()
    {
        DataS::ment();
        if(empty(ADT::$hibaT)){ $this->alap();}
        else{$this->szerk();}
    }
    public function cancel()
    {
        $this->alap();
    }
    public function szerk()
    {
        DataS::szerk();
        ViewS::szerk();
    }

    public function joghiba()
    {
        if($_SESSION['userid']==0)
        {ADT::$view=MOD::login();}
        else
        {ADT::$view='<h2><!--#joghiba--></h2>';}

    }

}

class AlapDataS
{ public static  function db_to_LT($db)
{
   foreach($db as $sor) {
      $resT[$sor['nev']]=$sor['ertek'];
   }
    return $resT;
}

    public static  function szerk()
    {
        $sql="SELECT ertek FROM".ADT::$tablanev." WHERE nev='".ADT::$nev."' AND ".ADT::$katnev."='".ADT::$kat."' ";
        ADT::$dataT=DB::assoc_sor($sql);
    }

    public static  function ment()
    {
        if(isset($_POST['nev']))
        {
            $sqlupdate="UPDATE ".ADT::$tablanev." SET ertek='".$_POST['ertek']."' WHERE ".ADT::$katnev."='".ADT::$kat."' AND nev='".$_POST['nev']."'";
            // echo $sql;
           if(!DB::parancs($sqlupdate)){
               $sqlinsert="INSERT INTO ".ADT::$tablanev." (".ADT::$katnev.",nev,ertek) VALUES ('".ADT::$kat."','".$_POST['nev']."','".$_POST['ertek']."') ";
               DB::parancs($sqlinsert);
           }
        }
    }
    public static  function LT()
    {
        $sql="SELECT nev,".GOB::$lang." FROM lang WHERE lap='".ADT::$lapnev."'";
        ADT::$LT=DB::assoc_tomb($sql);
        return ADT::$LT;
    }
}
$app=new Admin();
$fn=Task_S::get_nev_funcnev($app);
//echo $fn;
$app->$fn();