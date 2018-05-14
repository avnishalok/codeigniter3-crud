<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: welcome ::</title>

<style>
body{ padding:0px; margin:0px; font-size:12px; font-family: "arial"; color: #000;}
.wrapper{ 
	width:100%; 
	margin:0 auto;
	font-family: "arial"; color: #000; 
}
 @font-face {
		font-family:"MICR Encoding";
	src: url("micrenc.ttf") format("truetype");
	}


 /*
  * span.myfont { 
    font-family: "my_custom_font", Verdana, Tahoma;
}
 */
 /*here 'my_custom_font' is using through mpdf. 
 * follow the link for the strategy: http://stackoverflow.com/questions/15367101/use-font-in-mpdf-generated-document
 */
span.myfont { 
    font-family: "my_custom_font", Verdana, Tahoma;
}

</style>

</head>

<body>
<div class="wrapper"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="33%" style="padding:10px; color:#000; line-height:18px; text-transform:uppercase; padding-left:15px; font-size:15px; font-family:arial;"><?= $info->custName ?><br />
<?= $info->custStreetAddress ?>,<br />
<?= $info->custCity ?>, <?= $info->custState ?> <?= $info->custZipCode ?></td>
		<td width="7%">&nbsp;</td>
		<td width="32%" align="center" style="padding:10px; color:#000; line-height:17px;font-size:14px;text-transform: uppercase; font-family:arial; "><strong style="font-size:13px;"><?= $info->bankName ?> <br>
		</strong>
		
		<?= $info->bankAddress ?> <br>
<?= $info->bankCity ?>, <?= $info->bankState ?></td>
		<td width="1%">&nbsp;</td>
		<td width="25%" align="right"><table width="125" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="padding:5px; font-size:16px; padding-right:9px; font-family:arial;" align="right"><strong><?= $info->checkNo ?></strong></td>
                        </tr>
                    </table></td>
		<td width="2%">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:00px;">&nbsp;</td>
		<td>&nbsp;</td>
		<td align="right"><table width="125" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="padding:5px; border-bottom:2px solid #000; font-family:arial;  font-size:16px; padding-right:9px;" align="right"><?= dateFormat('m/d/Y',$info->createdDtm) ?></td>
                        </tr>
                    </table></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" valign="bottom" style="height:10px"></td>
		</tr>
	<tr>
		<td colspan="3" align="left" valign="bottom" style="padding:2px;   color:#434343; padding-left:15px; font-family:arial;"><table width="116%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="11%" style="font-size:13px; font-family:arial; ">Pay To The<br /> 
				Order Of</td>
				<td colspan="2" width="89%" valign="bottom" style="padding-left:50px; border-bottom:2px solid #000; border-right:2px solid #000; font-size: 14px; font-family:arial;"><strong><?= $info->cmp ?></strong></td>
			</tr>
		</table></td>
		<td>&nbsp;</td>
		<td align="right"><table width="100" border="0" cellspacing="0" cellpadding="0" style="margin-left:22px;">
                        <tr>
                            <td align="right" valign="baseline" style="padding:0;border: 1px solid #000;font-size: 15px; font-family:arial; font-weight: bold;vertical-align: baseline;height:34px;vertical-align: bottom;padding-right: 8px;">$ <?= number_format($info->amount, 2, '.', '') ?></td>
                     </tr>
                    </table></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" style="height:15px;"></td>
		</tr>
	<tr>
		<td colspan="2" align="center" valign="bottom" style="padding-left: 50px; margin-left:5px; font-size:15px; font-weight:bold;  font-style:italic;">Pay Exactly</td>
		<td colspan="3" align="center" valign="bottom" style="padding:0px; padding-right: 20px; font-size:15px; font-weight:bold;  ">$<?= number_format($info->amount, 2, '.', '') ?> Dollars And Cents ////////////////////////////</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" align="center"><table width="95%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style=" border-top:2px solid #000;">&nbsp;</td>
			</tr>
		</table></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" style="padding:10px; padding-left:100px;  font-size:14px;">&nbsp;</td>
		<td colspan="4" style="font-size:13px; font-weight:bold; font-family: arial; padding-left:180px;">SIGNATURE NOT REQUIRED</td>
		
	</tr>
	<tr>
		<td colspan="5" valign="top" style="padding:0px; font-size:16px; color:#434343;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="6%">&nbsp;</td>
				<td width="49%">&nbsp;</td>
				<td width="45%" rowspan="4" valign="bottom" style="font-size:11px; padding:4px;padding-left:38px; font-family: arial;">Payment has been authorized by the depositor. <br>
Payee to hold you harmless for payment of this document. <br>
This document shall be deposited only to credit of payee. <br>
Absence of endorsement is guaranteed by payee's bank.</td>
				</tr>

			<tr>
						<td colspan="2" style="padding-left:125px; font-size:13px; ">Customer authorization obtained : <?= dateFormat('m/d/Y',$info->createdDtm) ?></td>
				</tr>
			<tr>
				<td valign="bottom" style="padding-right: 0px;padding-left:15px;">Memo</td>
				<td valign="bottom" style="border-bottom:2px solid #000; padding:0px;">Geek</td>
				</tr>
		</table></td>
		<td>&nbsp;</td>
	</tr>
<tr>
		<td colspan="5" style="padding:10px; height:25px;"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" align="center" valign="bottom" style="padding:10px; font-size:24px;"> <span class="myfont">  C00<?= $info->checkNo ?>C &nbsp;&nbsp; A<?= $info->routingNo ?>A &nbsp;&nbsp; <?= $info->accountNo ?>C </span> </td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="padding:10px;">&nbsp;</td>
		<td>&nbsp;</td>
		<td align="center" style="padding:10px;">&nbsp;</td>
		<td>&nbsp;</td>
		<td align="center" style="padding:10px; font-family:Georgia, 'Times New Roman', Times, serif">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>



</div>
</body>
</html>
