<html>
<head>
<title>TimeZone</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://timezonedb.googlecode.com/files/timezonedb.js" type="text/javascript"></script>
<script type="text/javascript">
function displayZone(){
	    var cityname=$( "#city" ).val();
	    $.ajax({
				  type: "POST",
				  url: "display.php",
				  data: $( "#form1" ).serialize(),
				  success: function(msg){
					  var disp=msg.split("_");
					  var zone='';
					  var tz = new TimeZoneDB;
					   tz.getJSON({
							key: "VYMLGTUN3CJ6",
							lat: disp[0],
							lng: disp[1]
						}, function(data){
							zone=data.zoneName;
						   var display='<table border="1"><tr><td>Latitude</td><td>Logitude</td><td>Timezone</td></tr><tr><td>'+disp[0]+'</td><td>'+disp[1]+'</td><td>'+zone+'</td>';
							$('#period').html(display);

							
						});
						
					
				  }
			});	
   }
</script>
<form name="form1" id="form1" action="" method="post">
	City  : <input type="text" name="city" id="city" value=""/>
    <input type="button" name="submit" id="submit" value="Submit" onClick="displayZone();"/>
</form>
<div id="period"></div>
