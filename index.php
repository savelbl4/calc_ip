<html>
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.min.css">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<div class="calc">
			<div class="question">
				<?php
				foreach($_REQUEST as $key => $val) {
					if(isset($$key)) unset($$key);
					};
				if (get_magic_quotes_gpc()) {
					$_GET = array_map('stripslashes', $_GET);
					$_POST = array_map('stripslashes', $_POST);
					$_COOKIE = array_map('stripslashes', $_COOKIE);
					};
				ini_set("magic_quotes_gpc","0");
				ini_set("magic_quotes_runtime","0");
				ini_set("display_errors","1");
				if (version_compare(phpversion(), "5.0.0", ">")==1) {
					ini_set("error_reporting", E_ALL | E_STRICT);
					} else {
						ini_set("error_reporting", E_ALL);
						};
				?>
				<form action="index.php" method="GET">
				<input type="text"  maxlength="6" name="eva" autocomplete="off">
				<input type="submit" value="Вперде!">
				</form>
			</div>
			<div class="answer">
				<?php
				if (isset($_REQUEST["eva"])) {
					$eva=$_REQUEST["eva"];
					$str=$eva."";
					if (isset($str[0])) {$S=$str[0];} else {$S="";};
					if (isset($str[1])&&isset($str[2])) {$AA=$str[1].$str[2];} else {$AA="";};
					if (isset($str[3])) {$B=$str[3];} else {$B="";};
					if (isset($str[4])&&isset($str[5])) {$CC=$str[4].$str[5];} else {$CC="";};
					$evaS=(int)$S;
					$evaAA=(int)$AA;
					$evaB=(int)$B;
					$evaCC=(int)$CC;
					if (!$evaS) {
						echo "иди проспись!";
					} else if ($evaS==5) {
						if ($evaAA<4||$evaAA>43) {
							echo "иди проспись!";
						} else {
							if (!$evaB||$evaB>6) {
								echo "иди проспись!";
							} else {
								if ($evaCC>23) {
									echo "иди проспись!";
								} else {
									$ad2=144+floor($evaAA/16);
									$ad3=($evaAA%16)*16+$evaB;
									if (floor($evaAA/2)==$evaAA/2) {$ad4=($evaAA%16)*16;} else {$ad4=--$evaAA%16*16;};
									echo "eva".$eva.'<br />';
									echo "address 10.".$ad2.".".$ad3.".".$evaCC.'<br />';
									echo "gateway 10.".$ad2.".".$ad4.".254".'<br />';
									echo "netmask 255.255.224.0";
								}
							}
						}
					} else if ($evaS==6) {
						if ($evaAA<4) {
							echo "иди проспись!";
						} else {
							if ($evaCC>31) {
								echo "иди проспись!";
							} else {
								if ( ( $evaAA & 1 ) && ( $evaB == 0 ) ) {
									echo "Нет такого шкафа";
								} else {
									$ad2=148+floor($evaAA/16);
									$ad3=($evaAA%16)*16+$evaB;
									$ad4=($evaAA%16)*16;
										if ($evaB+$evaCC==0) {$ad5=224;} else {$ad5=$evaCC;};
									echo "eva".$eva.'<br />';
									echo "address 10.".$ad2.".".$ad3.".".$ad5."<br />";
									echo "gateway 10.".$ad2.".".$ad4.".254"."<br />";
									echo "netmask 255.255.240.0";
								}
							}
						}
					} else {echo "не попал!";}
				} else {$eva="";}
				?>
			</div>
		</div>
		<div class="img">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	</body>
</html>