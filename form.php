<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script language="JavaScript">
function formCheck(formobj){

	var fieldRequired = Array("firstname", "lastname", "phone", "email");
	var fieldDescription = Array("First Name", "Last Name", "Phone", "Email");
	var alertMsg = "Please complete the following fields:\n";
	
	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}
</script>
<form action="formcode.php" method="get" name="form" id="form" onSubmit="return formCheck(this);">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150" class="text_normal">FIRST NAME</td>
              <td><label for="firstname"></label>
                <input name="firstname" type="text" class="formborder_100S" id="firstname"></td>
            </tr>
            <tr>
              <td class="text_normal">LAST NAME</td>
              <td><input name="lastname" type="text" class="formborder_100S" id="lastname"></td>
            </tr>
            <tr>
              <td class="text_normal">PHONE</td>
              <td><input name="phone" type="text" class="formborder_100S" id="phone"></td>
            </tr>
            <tr>
              <td class="text_normal">EMAIL ADDRESS</td>
              <td><input name="email" type="text" class="formborder_100S" id="email"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="button" type="submit" class="button" id="button" value="Submit"></td>
            </tr>
          </table>
        </form>
</body>
</html>
