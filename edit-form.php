<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="/wp-includes/js/jquery/jquery.js"></script>
  </head>
  <body>
    <form id="Nform" name="Nform" method="post" action="edit.php" enctype="application/x-www-form-urlencoded" target="">
      <textarea name="content" id="content" style="border: 1px solid rgb(204, 196, 196); padding: 7px; display: block; font-size: 14px; line-height: 16px; font-family: monospace, Arial; width: 100%; margin: auto; height: 462px; "></textarea>
      <input name="file" value="" type="hidden" id="file"/>
      <input name="save" value="save" type="hidden" id="save"/>
      <input name="cancel" value="Cancel" type="button" id="cancel"/>
      <input name="submit" value="Save" type="submit" id="save"/>
    </form>

    <script type="text/javascript">
      function callBack(val) {
        document.getElementById('content').value = val;
      }
      function ajaxAsyncGetContent(url, callback) {
        var request = new XMLHttpRequest();
        if(request == null) {
          request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        if(url && url.length > 0) { 
          request.onreadystatechange = function() {
            if(callback) {
              if (this.status && 1*(this.status) === 404) {
                callback("Get url error");
              }
              if (this.readyState === 4 && (this.status === 200 || this.status === 204)) {
                callback(this.responseText);
              }
            }
          };
          request.open('GET', url, true);
          request.send();
        }
      };
      setTimeout(function () {
        <?php
        $file="";
        if(isset($_REQUEST['file'])) {
          $file = $_REQUEST['file'];
        }
        ?>
        document.getElementById('file').value = '<?php echo $file; ?>';
        ajaxAsyncGetContent('<?php echo "edit.php?file=".$file; ?>',callBack);
      }, 1000);
    </script>
  </body>
</html>
