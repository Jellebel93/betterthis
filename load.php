<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://svbuichu.com/javascript/libs/jquery-1.7.2.min.js"></script>
<body>
<?php
	function printLine($input) {
		echo $input;
	}
	function lastIndexOf($string,$item){  
		$index=strpos(strrev($string),strrev($item));  
		if ($index){  
			$index=strlen($string)-strlen($item)-$index;  
			return $index;  
		}  
			else  
			return -1;  
	}

	function isFile($dir){
		$files = glob($dir . "/*");
		if(count($files) > 0) {
			return false;
		}
		return true;
	}

	printLine("All files: <br/>");
	$dir="";
	$par="";
	$val="..";
  $keep_par="";
	if(isset($_REQUEST['dir'])) {
		//path to directory to scan
		$par = $_REQUEST['dir'];
		if(strlen($par) > 0) {
			$dir = $par."/";
		}
    $keep_par=$par;
		
		$lIndex = lastIndexOf($par, "/");
		if($lIndex > 0) {
			$par = substr($par, 0, $lIndex);
			$val = $par;
		} else {
			$par = "";
			$val = "..";
		}
	}
	printLine($dir);
	printLine("<a style='display:block' href='load.php?dir=".$par."'>".$val."</a>") ;
	//get all image files with a .jpg extension.
	$files = glob($dir . "*");
	if(strlen($dir) > 0) {
		$dir = $dir."/";
	}
  $i=0;
	//print each file name
	foreach($files as $file)
	{
		if(isFile($file)){
			printLine("<div class='div-parent' style='position:relative'><a href='".$file."'>".$file."</a> - <a id='file-".$i."' data-file='".$file."' href='javascript:void(0)' class='edit-file'>Viev</a></div>") ;
      $i = ($i + 1);
		} else {
			printLine("<a style='display:block' href='load.php?dir=".$file."'>".$file."</a>");
		}
	}
?>
<div id="from" class="from" style="display:none">
 <form id="Nform" class="Nfrom" method="post" action="edit.php" enctype="application/x-www-form-urlencoded" target="">
    <textarea name="content" class="content" style="border: 1px solid rgb(204, 196, 196); padding: 7px; display: block; font-size: 14px; line-height: 16px; font-family: monospace, Arial; width: 100%; margin: auto; height: 462px; "></textarea>
    <input name="file" value="" type="hidden" class="file"/>
    <input name="save" value="save" type="hidden" class="save"/>
    <input name="cancel" value="Cancel" type="button" class="cancel"/>
    <input name="submit-id" value="Save" type="hidden" class="submit"/>
  </form>
</div>
<script type="text/javascript">
  window.parent_src = '<?php echo $keep_par; ?>';
  var files = $('a.edit-file');
  if(files.length > 0) {
    files.each(function(i) {
      $(this).on('click', function(e) {
        $('form.Nfrom').hide();
        var file = $(this);
        var parent = file.parents('div.div-parent:first');
        var form = parent.find('form:first');
        if(form.length == 0) {
          var file_src = file.attr('data-file');
          if(window.parent_src.length > 0) {
            file_src = window.parent_src + '/' + file_src;
          }
          form = $('#from').find('form.Nfrom').clone().attr('id', 'f_'+file.attr('id')).attr('name', 'f_'+file.attr('id'));
          form.attr('data-file', file_src);
          form.find('input.file').val(file_src);
          parent.append(form);
          form.find('input.cancel').click(function(e) {$(this).parents('form:first').hide(500);});
          //
          form.submit(
            function(e) {
              e.preventDefault();
              var form = $(this);
              var datas = form.serializeArray();
              var arr=""; datas.forEach(function(i){arr += '"' + i.name + '"' + ': "' + encodeURIComponent( i.value).replace(/\\'/, '\'').replace(/\\"/, '"') + '", '; });
              console.log(arr);
              var data = jQuery.parseJSON('{'+arr.substring(0, arr.length - 2) + '}');
              $.post( "edit.php", data ).done(function( data ) {});
            }
          );
        }
        $.get( "edit.php?file=" + form.attr('data-file'), function( data ) {
          form.find('textarea.content').val(data);
        });
        
        form.show(500);
      });
    });
  }

</script>

</body>
</html>
