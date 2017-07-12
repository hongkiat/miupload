<?php

/**
 * Custom function to process string value with final forward slash
 *
 * @param string $string String to validate
 * @return string
 */
function includeTrailingCharacter($string, $character)
{
	if (strlen($string) > 0) {
		if (substr($string, -1) !== $character) {
			return $string . $character;
		} else {
			return $string;
		}
	} else {
		return $character;
	}
}

$newdir  = includeTrailingCharacter($_POST['newdir'], '/');
$thefile = 'uploadpath.json';

$string = file_get_contents($thefile);
$json_array = json_decode($string, true);

$newcontent = '{
	"rootdir": "'.$json_array['rootdir'].'",
	"rooturl": "'.$json_array['rooturl'].'",
	"dirpath": "'.$newdir.'"
}';

$openedfile = fopen($thefile, "w");
fwrite($openedfile, $newcontent);
fclose($openedfile);

echo 'success';
die();

?>