

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset="iso-8859-1" />

<html>

<head>

<title>Sample form from WorxWare.com</title>

<style>

body, p, table, th, td, div {

  font-family: Arial, Helvetica, sans-serif;

  font-size: 12px;

}

th {

  background-color:#0080C0;

  color:white;

  font-weight:bold;

  font-size:18px;

  border: 1px solid #0080C0;

}

input.text, textarea {

  font-family: Arial, Helvetica, sans-serif;

  font-size: 11px;

  width: 99%;

}

.text:focus, textarea:focus {

  background-color: #FFFACC;

  border: 1px solid #000000;

}

#mydiv {

  margin-left: auto ;

  margin-right: auto ;

  width: 500px;

  text-align: left;

}

td.colone {

  text-align: right;

  vertical-align: top;

  padding-top:6px;

  width:20%;

}

td.coltwo {

  color:red;

  text-align: center;

  vertical-align: top;

  padding-top:9px;

}

td.colthree {

  width:80%

}

table.border {

  border: 1px solid #0080C0;

  border-collapse: collapse;

}

</style>

</head>

<body>

<div id="mydiv">



  

<form method="POST" action="../_lib/phpmailer-fe.php" enctype="multipart/form-data">







<input type="hidden" value="samplecontactus.html" name="referer">

<table class="border" width="500" cellpadding="3" cellspacing="0">

  <tr>

    <th colspan="3" align="center">WorxWare.com Sample Contact Us Form</th>

  </tr>

  <tr>

    <td colspan="3"><div style="height:5px;"></div></td>

  </tr>

  <tr>

    <td class="colone">Name</td>

    <td class="coltwo">*</td>

    <td class="colthree"><input class="text" type="text" name="frmName" style="width:98%;"></td>

  </tr>

  <tr>

    <td class="colone">City</td>

    <td class="coltwo">&nbsp;</td>

    <td class="colthree"><input class="text" type="text" name="frmCity" style="width:98%;"></td>

  </tr>



  <tr>

    <td class="colone">CityArr</td>

    <td class="coltwo">&nbsp;</td>

    <td class="colthree"><input class="text" type="text" name="frmCityArr[]" style="width:98%;"></td>

  </tr>

  <tr>

    <td class="colone">CityArr</td>

    <td class="coltwo">&nbsp;</td>

    <td class="colthree"><input class="text" type="text" name="frmCityArr[]" style="width:98%;"></td>

  </tr>





  <tr>

    <td class="colone">Email</td>

    <td class="coltwo">*</td>

    <td class="colthree"><input class="text" type="text" name="email" style="width:98%;"></td>

  </tr>

  <tr>

    <td class="colone">Telephone</td>

    <td class="coltwo">&nbsp;</td>

    <td class="colthree">

      <table width="100%" cellpadding="0" cellspacing="0">

        <tr>

          <td width="200"><input class="text" type="text" name="frmTelephone" style="width:200px;"></td>

          <td>

            <select size="1" name="frmPhoneType">

            <option value="Home">Home</option>

            <option value="Worx">Worx</option>

            <option value="Pager">Pager</option>

            </select>

          </td>

        </tr>

      </table>

    </td>

  </tr>

  <tr>

    <td class="colone">Contact by</td>

    <td class="coltwo">&nbsp;</td>

    <td class="colthree">

      <table width="100%" cellpadding="0" cellspacing="0">

        <tr>

          <td width="1">

            <select size="1" name="frmContactBy">

            <option value="Telephone">Telephone</option>

            <option value="Email">Email</option>

            </select>

          </td>

          <td>

            <select size="1" name="frmBestTime">

            <option value="Morning">in Morning</option>

            <option value="Afternoon">in Afternoon</option>

            <option value="Evening">in Evening</option>

            </select>

          </td>

        </tr>

      </table>

    </td>

  </tr>

  <tr>

    <td class="colone">Message</td>

    <td class="coltwo">*</td>

    <td class="colthree"><textarea class="text" name="frmMessage" style="width:98%;height:100px;"></textarea></td>

  </tr>

  <tr>

    <td class="colone" colspan="2">&nbsp;</td>

    <td class="colthree"><input type="submit" value="Submit" name="submit"><input type="reset" value="Reset" name="reset"></td>

  </tr>

  <tr>

    <td colspan="3"><div style="height:5px;"></div></td>

  </tr>

</table>

</form>

<span style="color:red;">*</span> = required<br />

</div>

</body>

</html>

