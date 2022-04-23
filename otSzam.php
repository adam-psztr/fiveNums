<?php
	
	if (!empty($_POST)) {

	$hiba = [];
	
	$otSzam = [];
 
	$urlapInput = [
		"elso" => filter_input(INPUT_POST, 'elso', FILTER_VALIDATE_FLOAT),
		"masodik" => filter_input(INPUT_POST, 'masodik', FILTER_VALIDATE_FLOAT),
		"harmadik" => filter_input(INPUT_POST, 'harmadik', FILTER_VALIDATE_FLOAT),
		"negyedik" => filter_input(INPUT_POST, 'negyedik', FILTER_VALIDATE_FLOAT),
		"otodik" => filter_input(INPUT_POST, 'otodik', FILTER_VALIDATE_FLOAT)
	];

	foreach($urlapInput as $sorszam => $ertek) {
		if ($ertek === false){
			$hiba[$sorszam] = "Nem szám! A megadott érték csak számot tartalmazhat!";
		} elseif (array_search($ertek, $otSzam) !== false) {
			$hiba[$sorszam] = "Előzőekben már felhasznált szám! Adjon meg újat!";
		} else {
			$otSzam[$sorszam] = $ertek;
		}
	};

	asort($otSzam);

};
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>5 különböző számot kérek!</title>
	<style>
		* {padding: 0;margin: 0;box-sizing: border-box; font-size: 20px;}
		html,body{height: 100%;width: 100%;}
		body>div{background-color: lightgray;height: 100%;width: 100%;display: flex; justify-content: center; align-content: center; align-items: center;}
		body>div>div{width: 70%;height: 50%;background-color: rgba(240, 255, 255, 0.664);border-radius: 10px;box-shadow: 0 0 5px gray; display: flex; position: relative;}
		body>div>div>div.ico{position: absolute;display: none;}
		body>div>div>div.icok{position: absolute;top: -25px;right: -25px; display: block; padding: 10px;border-radius: 100px; background-color: greenyellow; border: 3px solid white; color: white;font-size: 30px; box-shadow: 0 0 10px greenyellow;}
		body>div>div>div.icno{position: absolute;top: -25px;right: -25px; display: block; padding: 10px;border-radius: 100px; background-color: lightcoral; border: 3px solid white; color: white;font-size: 30px; box-shadow: 0 0 10px lightcoral;}
		body>div>div>div.urlap{width: 49%; padding: 30px; text-align: right;}
		body>div>div>div.urlap>h2{margin-bottom: 30px;}
		body>div>div>div.urlap>form>label{display: inline-block; width: 55%; margin: 0 10px 15px 0;}
		body>div>div>div.urlap>form>input{display: inline-block; width: 40%; text-align: center;}
		body>div>div>div.urlap>form>input.rossz{background-color: lightcoral;}
		body>div>div>div.urlap>form>input.helyes{background-color: greenyellow;}
		body>div>div>div.urlap>form>button{padding: 15px 35px; background-color: chartreuse; border-radius: 20px;margin: 20px 20px 0 0;}
		body>div>div>div.kep{width: 49%; background: url(1*B7d5Fr27lsH3uHvzF720IA.png) no-repeat; background-position: center; background-size: cover;}
		body>div>div>div.jo{width: 49%; padding: 30px; text-align: center;}
		body>div>div>div.jo>h2{width: 60%; padding-bottom: 10px; margin: 0 auto;}
		body>div>div>div.jo>h3{font-size: 30px; padding: 5px; text-align: center;}
		body>div>div>div.hiba{width: 49%; padding: 30px 0; text-align: center;}
		body>div>div>div.hiba>h2{width: 60%; padding-bottom: 30px; margin: 0 auto;}
		body>div>div>div.hiba>h3{padding-bottom: 19px; text-align: left; margin-left: -35px;}
		body>div>div>div.hiba>h3.lightcoral{text-shadow: 2px 2px 3px lightcoral}
		body>div>div>div.hiba>h3.yellow{text-shadow: 2px 2px 3px yellow}
		body>div>div>div.hiba>h3.greenyellow{color: greenyellow}
	</style>
</head>
<body>
	<div>
		<div>
			<div class="<?php if (empty($_POST)) {echo 'ico';} elseif (empty($hiba)) {echo 'icok';} else {echo 'icno';}?>"> <?php if (empty($hiba)) {echo 'OK';} else {echo 'NO';}?> </div>
			<div class="urlap">
				<h2>Kérem, adjon meg 5 darab különböző számot!</h2>
				<form method="post">
				<label for="elso">Kérem az első számot:</label>
					<input class="<?php if (empty($_POST)) {echo '';} elseif (empty($hiba['elso'])) {echo 'helyes';} else {echo 'rossz';}?>" type="text" name="elso" id="elso" value="<?php echo getValue('elso'); ?>">
				<label for="masodik">Kérem a második számot:</label>
					<input class="<?php if (empty($_POST)) {echo '';} elseif (empty($hiba['masodik'])) {echo 'helyes';} else {echo 'rossz';}?>" type="text" name="masodik" id="masodik" value="<?php echo getValue('masodik'); ?>">
				<label for="harmadik">Kérem a harmadik számot:</label>
					<input class="<?php if (empty($_POST)) {echo '';} elseif (empty($hiba['harmadik'])) {echo 'helyes';} else {echo 'rossz';}?>" type="text" name="harmadik" id="harmadik" value="<?php echo getValue('harmadik'); ?>">
				<label for="negyedik">Kérem a negyedik számot:</label>
					<input class="<?php if (empty($_POST)) {echo '';} elseif (empty($hiba['negyedik'])) {echo 'helyes';} else {echo 'rossz';}?>" type="text" name="negyedik" id="negyedik" value="<?php echo getValue('negyedik'); ?>">
				<label for="otodik">Kérem az ötödik számot:</label>
					<input class="<?php if (empty($_POST)) {echo '';} elseif (empty($hiba['otodik'])) {echo 'helyes';} else {echo 'rossz';}?>" type="text" name="otodik" id="otodik" value="<?php echo getValue('otodik'); ?>">
					<button>ENTER</button>
				</form>
			</div>
			<?php
			if (empty($_POST)) {
			echo '<div class="kep"></div>';
			} elseif (empty($hiba)) {
			echo '<div class="jo">
				<h2>A megadott 5 darab szám emelkedő számsorrendben a következő:</h2>
				<h3>' . $otSzam[array_keys($otSzam)['0']] . '</h3>
				<h3>' . $otSzam[array_keys($otSzam)['1']] . '</h3>
				<h3>' . $otSzam[array_keys($otSzam)['2']] . '</h3>
				<h3>' . $otSzam[array_keys($otSzam)['3']] . '</h3>
				<h3>' . $otSzam[array_keys($otSzam)['4']] . '</h3>
			</div>';
			} else {
				echo '<div class="hiba">
					<h2>Hiba!</h2>
					<h3 class="' . color('elso') . '">' . hiba('elso') . '</h3>
					<h3 class="' . color('masodik') . '">' . hiba('masodik') . '</h3>
					<h3 class="' . color('harmadik') . '">' . hiba('harmadik') . '</h3>
					<h3 class="' . color('negyedik') . '">' . hiba('negyedik') . '</h3>
					<h3 class="' . color('otodik') . '">' . hiba('otodik') . '</h3>
					</div>';
			}
			?>
		</div>
	</div>
</body>
</html>
<?php

function getValue($fieldName) {
    return filter_input(INPUT_POST, $fieldName);
}

function hiba($fieldName) {
	global $hiba;
	if (isset($hiba[$fieldName])) {
		return '<- ' . $hiba[$fieldName];
	} else {
		return "|";
	};
}

function color($fieldName){
	global $hiba;
	if (empty($hiba[$fieldName])) {return 'greenyellow';} elseif ($hiba[$fieldName] ==="Előzőekben már felhasznált szám! Adjon meg újat!") {return 'yellow';} else {return 'lightcoral';}
}

?>