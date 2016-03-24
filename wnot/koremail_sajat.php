<?php

session_start();

?>

<html>

<head>

<title>ONEDAYCLUB.COM</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">

<link href="fo.css" rel="stylesheet" type="text/css">

</head>

<SCRIPT src="./js/fo.js" type=text/javascript></SCRIPT>

<script>

function addFav() {

  if(document.all) {

    window.external.AddFavorite('http://www.onedayclub.com','ONEDAYCLUB.COM - Az ötcsillagos turisztikai szolgáltatás')

  } else {

    if(window.sidebar) {

      window.sidebar.addPanel('ONEDAYCLUB.COM - Az ötcsillagos turisztikai szolgáltatás','http://www.onedayclub.com','');

    }

  }

}

</script>



<body>

<?php

   include("./betetek/fejlec.inc");

?>  



<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="215" valign="top">

<?php

   include("./betetek/baloldal.inc");

?>  

	</td>

    <td valign="top"> <table width="629" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td height="1302" valign="top"> 

            <table width="629" border="0" cellspacing="0" cellpadding="0">

              <tr> 

                <td height="8"><img src="grafika/ureshely.gif" width="16" height="8"></td>

              </tr>

              <tr> 

                <td height="26" align="center" background="grafika/tabla_fej.jpg"> 

                  <table width="160" border="0" cellspacing="0" cellpadding="0">

                    <tr> 

                      <td width="61%" align="center" class="tablafejcim1">Kör 

                        e-mail küldés</td>

                    </tr>

                  </table></td>

              </tr>

              <tr> 

                <td valign="top"> 

                  <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <td width="2" bgcolor="#9F6048"><img src="grafika/ureshely.gif" width="2" height="16"></td>

                      <td align="center" bgcolor="#FFDDD9"> 

                        <form name="form1" method="post" action="">

                          <table width="550" border="0" cellspacing="4" cellpadding="0">

                            <tr> 

                              <td width="21%">&nbsp;</td>

                              <td width="79%"> 

                                <?php

//if ( ( isset($_POST['szoveg'])) and ($_POST['szoveg']!="") ) 
if ( 1==1 ) 

    {

require("class.phpmailer.php");

	
/*
switch ( $_POST['cimzett'] )

{

case 1:

 $query6 = "SELECT Afv_vezeteknev, Afv_keresztnev, Afv_email FROM odc_vendeg WHERE Afv_aktiv=\"I\" AND Afv_tipus=\"V\" AND Afv_id=1";

 break;

case 2:

 $query6 = "SELECT Afv_vezeteknev, Afv_keresztnev, Afv_email FROM odc_vendeg WHERE Afv_aktiv=\"I\" AND Afv_tipus=\"C\"";

 break;

case 3:

 $query6 = "SELECT Af_hirdeto_nev, Af_hirdeto_email FROM odc_szallas WHERE Af_aktiv=\"I\"";

 break;

}
*/
/*

			          $eredmeny6 = mysql_query($query6,$kapcsolat) or die( "Adatbázis hiba!".mysql_error()  );

				      while ( $egy_sor6 = mysql_fetch_array ( $eredmeny6 ))

				        {

						switch ( $_POST['cimzett'] )

						{

						case 3:

   			            $v_nev = $egy_sor6["Af_hirdeto_nev"];

   			            $v_email = $egy_sor6["Af_hirdeto_email"];

						break;

					    default:

						  {

   			            $v_vezeteknev = $egy_sor6["Afv_vezeteknev"];

   			            $v_keresztnev = $egy_sor6["Afv_keresztnev"];

						$v_nev = $v_vezeteknev." ".$v_keresztnev;

   			            $v_email = $egy_sor6["Afv_email"];

						  }

						}

	*/

   			            $szoveg = str_replace("\n", "<br>", 'post szoveg');

	

	

	

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->Host = "email.linuxweb.hu";

$mail->SMTPAuth = true;

$mail->Username = "info@szimbol.hu";

$mail->Password = "iN4321Fo";

$mail->From = "info@onedayclub.com";

$mail->IsHTML(true);



$felado = "ONEDAYCLUB.COM";

$email = "info@onedayclub.com";



  //--$cimzett_email = $v_email;
  $cimzett_email =array('motto001@gmail.com','menkuotto@gmail.com','kojef@ttt.hu','gfgeg@tt.hu');

  //--$cimzett = $v_nev;
  $cimzett =array('fhjdj','dfjdjh','dfjdfj','dfjdfjdfj');

  $mail->FromName = $felado;

  $mail->ClearAddresses();

  $mail->ClearReplyTos();

  $mail->AddAddress($cimzett_email, $cimzett);

  $mail->AddReplyTo($email);

		  $level = $szoveg;

  $mail->Subject = $_POST['targy'];

  //

	$mail->Body=$level;

        //

        if(!$mail->Send())

		 {
	$sor=$cimzett_email.";".$cimzett."\n";	 
$fp = fopen("koremail_log.txt", "a+"); // a+ hozzáfűzés
fwrite($fp, $sor);
fclose($fp);
print('		

 <table width="400" border="0" cellspacing="0" cellpadding="0">

 <tr><td align="center" class="kisszoveg1">Nem sikerült a levélküldés! ('.$cimzett_email.')</td></tr>

 </table>

 ');

		 }

		 else

		   {

print('		

 <table width="400" border="0" cellspacing="0" cellpadding="0">

 <tr><td align="center" class="kisszoveg4">Sikerült a levélküldés! ('.$cimzett_email.')</td></tr>

 </table>

 ');

           }

	}

  

//}  

  

?>

                              </td>

                            </tr>

                            <tr> 

                              <td class="adminszoveg1"> 

                                <div align="right">Tárgy:</div></td>

                              <td><input name="targy" type="text" class="formbelso1"></td>

                            </tr>

                            <tr> 

                              <td class="adminszoveg1"> <div align="right">Címzettek:</div></td>

                              <td><select name="cimzett" class="formbelso1a">

                                  <option value="1" selected>Vendégeknek</option>

                                  <option value="2">Clubtagoknap</option>

                                  <option value="3">Szálláshelyeknek</option>

                                </select> </td>

                            </tr>

                            <tr> 

                              <td height="15" class="adminszoveg1"> <div align="right">Szöveg:</div></td>

                              <td rowspan="2" valign="top"><textarea name="szoveg" cols="60" rows="8" class="formbelso1"></textarea></td>

                            </tr>

                            <tr> 

                              <td>&nbsp;</td>

                            </tr>

                            <tr> 

                              <td>&nbsp;</td>

                              <td><input name="elkuld" type="submit" class="formkulso1" value="Levélküldés"></td>

                            </tr>

                            <tr align="right"> 

                              <td colspan="2"><a href="admin.php" class="link1">- 

                                Vissza az Adminba -</a></td>

                            </tr>

                            <tr> </tr>

                          </table>

                        </form>

						

						

					  </td>

                      <td width="2" bgcolor="#9F6048"><img src="grafika/ureshely.gif" width="2" height="16"></td>

                    </tr>

                  </table> 

                </td>

              </tr>

              <tr> 

                <td height="13"><img src="grafika/also_keret_sav.jpg" width="629" height="13"></td>

              </tr>

            </table>

          </td>

        </tr>

        <tr>

          <td height="52" valign="top" background="grafika/alsomenu.jpg">

            <?php

   include("./betetek/lablec.inc");

?>

          </td>

        </tr>

      </table>

      

    </td>

    <td width="155" valign="top">

<?php

   include("./betetek/jobboldal.inc");

?>  

	</td>

  </tr>

</table>

</body>

</html>

