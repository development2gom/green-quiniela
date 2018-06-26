<?php

use app\models\WrkQuiniela;
$logoCliente = "http://mundialcentrosantafe.com/web/webAssets/images/logo-bienvenido.png";
$logoClienteH = "90px";
$logoClienteW = "auto";

$colorTitle = "#000";
$colorSubtitle = "#444";
$colorText = "#999";
$colorLink = "blue";

$user = $user; // Usuario del titulo
$usuario = "juanito@mail.com";
$password = "12345678";

$font = "https://fonts.googleapis.com/css?family=Droid+Serif";
$fontSize14 = "14px";
$fontSize16 = "16px";
$fontSize24 = "24px";

$bgHeader = "#F4A21B";
$bgHeaderTrans = "244,162,27";
$bgBody = "#E2E2E2";
$bgBodyWmax = "500px";
$bgBodyWmin = "320px";
$bgBox = "#FFF";

$btnText = "#FFF";
$btnBg = "#B80E29";

$url = $url;

$mailAyuda = "contacto@mundialcentrosantafe.com";
$crAuthor = "&copy; Quiniela mundialista";

$logoAuthor = "http://via.placeholder.com/380x180";
$logoAuthorH = "auto";
$logoAuthorW = "108px";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <!--[if gte mso 9]>
    <style type="text/css">
    .local.active, .visita.active{
      background-color: rgba(244,162,27,0.35) !important;
      padding-top: 4px !important;
      padding-bottom: 8px !important;
    }
    @media (max-width: 620px) {
      .num-res-t{
      padding-top: 32px !important;
    }
    .num-res-b{
      padding-bottom: 32px !important;
    }}
    </style>
<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <title></title>
    <!--[if !mso]><!-- -->
	<link href="<?= $font ?>" rel="stylesheet" type="text/css">
	<!--<![endif]-->
    
    <style type="text/css" id="media-query">
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 600px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 200px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 400px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 300px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 200px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 150px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 120px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 100px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 85px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 75px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 66px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 60px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 54px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 50px !important; }


.btn-empate{
  color: <?=$bgHeader?>;
}
.btn-empate-active{
  background-color: <?=$bgHeader?>;
  color: white;
}

.local,.visita{
  border-left: 1px solid transparent;
  border-top: 1px solid transparent;
  border-right: 1px solid transparent;
  border-bottom: 1px solid transparent;
}
.active{
  background-color: #f4a21b;
  border: 1px solid #f4a21b;
  color: <?=$colorSubtitle?>;
}

.x_visita.x_active, .x_local.x_active{
  background-color: #f4a21b;
  border: 1px solid #f4a21b;
  color: <?=$colorSubtitle?>;
}

@media only screen and (min-width: 620px) {
  .block-grid {
    width: 600px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 600px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 200px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 400px !important; }
  .block-grid.two-up .col {
    width: 300px !important; }
  .block-grid.three-up .col {
    width: 200px !important; }
  .block-grid.four-up .col {
    width: 150px !important; }
  .block-grid.five-up .col {
    width: 120px !important; }
  .block-grid.six-up .col {
    width: 100px !important; }
  .block-grid.seven-up .col {
    width: 85px !important; }
  .block-grid.eight-up .col {
    width: 75px !important; }
  .block-grid.nine-up .col {
    width: 66px !important; }
  .block-grid.ten-up .col {
    width: 60px !important; }
  .block-grid.eleven-up .col {
    width: 54px !important; }
  .block-grid.twelve-up .col {
    width: 50px !important; } }

@media (max-width: 620px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
    .col.col-res{
      max-width: 96% !important;
      margin: 0 auto !important;
    }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; }
    .num-res-t{
      padding-top: 32px !important;
    }
    .num-res-b{
      padding-bottom: 32px !important;
    }}

    </style>
</head>
<body class="clean-body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: <?=$bgBody?>">
  <style type="text/css" id="media-query-bodytag">
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 90%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }
      .col.col-res{
        max-width: 96% !important;
        margin: 0 auto !important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class="ie-browser"><![endif]-->
  <!--[if mso]><div class="mso-container"><![endif]-->
  <table class="nl-container" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: <?= $bgBodyWmin ?>;margin: 0 auto;background-color: <?=$bgBody?>;width: 100%" cellpadding="0" cellspacing="0">
	<tbody>
	<tr style="vertical-align: top">
		<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #F0F0F0;"><![endif]-->

    <div style="background-color: <?=$bgHeader?>;">
      <div style="Margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgHeader?>;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgHeader?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#0D0C0C;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:#FFF;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style="background-color:#050404; width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;display: table-cell;vertical-align: top;">
              <div style="background-color: <?=$bgHeader?>; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:18px; padding-bottom:18px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div align="center" class="img-container center  autowidth  fullwidth " style="padding-right: 0px;  padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px;line-height:0px;"><td style="padding-right: 0px; padding-left: 0px;" align="center"><![endif]-->
  <img class="center  autowidth  fullwidth" align="center" border="0" src="<?=$logoCliente?>" alt="Abogados RYG" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: <?=$logoClienteH ?>;float: none;width: <?=$logoClienteW ?>;max-width: 100%" width="<?=$logoClienteW ?>">
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color: <?=$bgBody?>;">
      <div style="Margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmin ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgBody?>;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgBody?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#F0F0F0;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:#F0F0F0;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    &#160;
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>    <div style="background-color:transparent;">
      <div style="margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgBox?>;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgBox?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:#FFF;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div class="">
	<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
	<div style="line-height:200%;color:#555555;font-family:'Verdanaf', Georgia, Times, 'Times New Roman', serif; padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px;">	
		<div style="font-size: <?= $fontSize16 ?>;line-height:24px;font-family:'Verdana', Georgia, Times, 'Times New Roman', serif;color:#555555;text-align:left;"><p style="margin: 0;font-size: <?= $fontSize16 ?>;line-height: 28px;text-align: left"><span style="font-size: <?= $fontSize24 ?>; font-weight: bold; color: <?= $colorTitle ?>; line-height: 48px;">Hola <?= $user->nombreCompleto ?> </span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class="">
	<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
	<div style="line-height:200%;color:#555555;font-family:'Verdanaf', Georgia, Times, 'Times New Roman', serif; padding-right: 30px; padding-left: 30px; padding-top: 10px; padding-bottom: 10px;">	
        <div style="line-height:24px;color:<?= $colorText ?>;font-family:'Verdanaf', Georgia, Times, 'Times New Roman', serif;text-align:left;">
            <p style="margin: 0;line-height: 24px;text-align: justify;"><span style="font-size: <?= $fontSize16 ?>; line-height: 32px;">Este correo es para notificarte que <strong style="font-family: Verdana;  font-style: italic; font-weight: bold;">has 
            finalizado tu quiniela </strong> </span></p>
            <p style="margin: 0;line-height: 24px;text-align: left;" dir="ltr">&#160;<br></p>
            <p style="margin: 0;line-height: 24px;text-align: left;background-color:red;" dir="ltr"></p>

            </div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>


    <?php
      // $grupoActual = false;
      
      // foreach($partidos as $key => $partido){
      //   $equipo1 = $partido->equipo1;
      //   $equipo2 = $partido->equipo2;
      //   $resultado = WrkQuiniela::find()->where(["id_usuario" => $user->id_usuario, 'id_partido' => $partido->id_partido])->one();
        
      //   $flagEq1 = false;
      //   $flagEq2 = false;
      //   $flagEm3 = false;
      //   if ($resultado) {
      //       if ($equipo1->id_equipo == $resultado->id_equipo_ganador) {
      //           $flagEq1 = true;
      //       } else if ($equipo2->id_equipo == $resultado->id_equipo_ganador) {
      //           $flagEq2 = true;
      //       } else {
      //           $flagEm3 = true;
      //       }
      //   } 

      //   if ($grupoActual && $grupoActual != $partido->txt_grupo) {
      //     echo '</div>';
      // }
        

      //   if($grupoActual != $partido->txt_grupo){
      //     $grupoActual = $partido->txt_grupo;
    ?>



      <div style="background-color:transparent;">
        <div style="Margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgHeader?>;" class="block-grid ">
          <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgHeader?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 500px;"><tr class="layout-full-width" style="background-color:<?=$bgHeader?>;"><![endif]-->

            <!--[if (mso)|(IE)]><td align="center" width="500" style=" width:500px; padding-right: 0px; padding-left: 0px; padding-top:10px; padding-bottom:10px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;display: table-cell;vertical-align: top;">
            <div style="background-color: transparent; width: 100% !important;">
            <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->


            <div class="">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
            <div style="color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">	
            <div style="font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;">
              <p style="margin: 0;font-size: 14px;line-height: 17px;text-align: center">
                <span style="color: #fff; font-size: 24px; font-weight: bold; line-height: 26px; text-transform: uppercase;">
                  GRUPO <?php # $grupoActual?>
                </span>
              </p></div>	
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>

            <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
            </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
          </div>
        </div>
      </div>

    <?php
    // }
    ?>
    
    
    

      <div style="background-color:transparent; background-color: green;">
        <div style="Margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgBox?>; border-bottom: 1px dashed <?=$bgHeader?>;" class="block-grid three-up ">

          <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgBox?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 500px;"><tr class="layout-full-width" style="background-color:transparent;"><![endif]-->

          <!--[if (mso)|(IE)]><td align="center" width="167" style=" width:167px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid <?=$bgHeader?>; border-left: 0px solid <?=$bgHeader?>; border-bottom: 0px solid <?=$bgHeader?>; border-right: 0px solid <?=$bgHeader?>;" valign="top"><![endif]-->
          <div class="col num4" style="max-width: <?= $bgBodyWmin ?>;min-width: 166px;display: table-cell;vertical-align: middle; padding-top: 12px; padding-bottom: 12px;">

            <div style=" width: 100% !important; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px;" class="local">
            <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid <?=$bgHeader?>; border-left: 0px solid <?=$bgHeader?>; border-bottom: 0px solid <?=$bgHeader?>; border-right: 0px solid <?=$bgHeader?>; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

            <div class="">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
            <div style="color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">	
            <div style="font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:center;">
            <p style="margin: 0;font-size: 14px;line-height: 17px; margin-bottom: 12px;">Equipo Local <?php # $equipo1->txt_nombre_equipo?></p>
            <img src="<?php # $equipo1->txt_url_imagen_equipo?>" alt="">

            </div>	
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            </div>

            <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
            </div>
          </div>
          
          
          <!--[if (mso)|(IE)]></td><td align="center" width="167" style=" width:167px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
          <div class="col num4" style="max-width: <?= $bgBodyWmin ?>;min-width: 166px;display: table-cell;vertical-align: middle; padding-top: 12px; padding-bottom: 12px;">
            <div style="background-color: transparent; width: 100% !important;">
            <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

            <div align="center" class="button-container center " style="padding-right: 10px; padding-left: 10px; padding-top:10px; padding-bottom:10px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top:10px; padding-bottom:10px;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31pt; v-text-anchor:middle; width:76pt;" arcsize="10%" strokecolor="transparent" fillcolor="transparent"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:16px;"><![endif]-->
            <!-- <div style="color: #ffffff; background-color: transparent; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; max-width: 102px; width: 62px;width: auto; border-left: 1px solid <?=$bgHeader?>; border-top: 1px solid <?=$bgHeader?>; border-right: 1px solid <?=$bgHeader?>; 
            border-bottom: 1px solid <?=$bgHeader?>; padding-top: 5px; padding-right: 20px; padding-bottom: 5px; padding-left: 20px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; text-align: center; mso-border-alt: none;">
            <span style="font-size:16px;line-height:32px;">Empate</span>
            </div> -->
            <p style="border-left: 1px solid <?=$bgHeader?>; border-top: 1px solid <?=$bgHeader?>; border-right: 1px solid <?=$bgHeader?>; 
            border-bottom: 1px solid <?=$bgHeader?>;border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; padding-left: 8px; padding-top: 4px; padding-right: 8px; padding-bottom: 4px;"  
            class="btn-empate <?php # $flagEm3 ? 'btn-empate-active' : '' ?>">
            Empate</p>
            <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
            </div>

            <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
            </div>
          </div>


          <!--[if (mso)|(IE)]></td><td align="center" width="167" style=" width:167px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
          <div class="col num4" style="max-width: <?= $bgBodyWmin ?>;min-width: 166px;display: table-cell;vertical-align: middle; padding-top: 12px; padding-bottom: 12px;">
            <div style="width: 100% !important; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px;" class="local active">
            <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

            <div class="">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;"><![endif]-->
            <div style="color:#555555;line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">	
            <div style="font-size:12px;line-height:14px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:center;">
            <p style="margin: 0;font-size: 14px;line-height: 17px; margin-bottom: 12px;">Equipo V<?php # $equipo2->txt_nombre_equipo?></p>
            <img src="<?php # $equipo2->txt_url_imagen_equipo?>" alt="">

            </div>	
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
          </div>

          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
          </div>
          </div>

          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
          </div>
        </div>
      </div>   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->

    <?php
    // }
    ?>


    
    
    <div style="background-color: <?=$bgBody?>;">
      <div style="Margin: 0 auto;min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: <?=$bgBody?>;" class="block-grid ">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color: <?=$bgBody?>;">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="background-color:#F0F0F0;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width: 600px;"><tr class="layout-full-width" style="background-color:#F0F0F0;"><![endif]-->

              <!--[if (mso)|(IE)]><td align="center" width="600" style=" width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><![endif]-->
            <div class="col num12" style="min-width: <?= $bgBodyWmin ?>;max-width: <?= $bgBodyWmax ?>;display: table-cell;vertical-align: top;">
              <div style="background-color: transparent; width: 100% !important;">
              <!--[if (!mso)&(!IE)]><!--><div style="border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;"><!--<![endif]-->

                  
                    <div class="">
	<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 20px; padding-bottom: 20px;"><![endif]-->
	<div style="color:#555555;line-height:120%;font-family:'Verdanaf', Georgia, Times, 'Times New Roman', serif; padding-right: 20px; padding-left: 20px; padding-top: 40px; padding-bottom: 20px;">	
		<div style="line-height:14px;color: <?= $colorText ?>;font-family:'Verdanaf', Georgia, Times, 'Times New Roman', serif;text-align: center;">

            <p style="margin: 0;line-height: 24px;text-align: justify; font-size: <?= $fontSize14 ?>">Este correo electrónico fue generado de manera automática por el sistema y no es necesario contestes a el. 
            </p>
            <p style="margin: 0;line-height: 24px;text-align: left; font-size: <?= $fontSize14 ?>" dir="ltr">&#160;<br><br></p>
            <p style="margin: 0;line-height: 17px;text-align: center; font-size: <?= $fontSize16 ?>"> <?= $crAuthor ?> </p>
            <p style="margin: 0;line-height: 24px;text-align: left; font-size: <?= $fontSize14 ?>" dir="ltr">&#160;<br><br></p>
            
        </div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>

