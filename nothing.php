<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	이름: <?php print "SharPinG"; ?>

	<br/><br/>

	개수: <?php print 1+2+3+4+5; ?>

	<br/><br/>

	표:

	<table border=1>
		<?php
			for($i=0; $i<5; $i+=1){
				print "<tr><td>".($i+1)."</td></tr>";
			}
		?>
	</table>

</body>
</html>
