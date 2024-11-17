<?php 


$exec = file_get_contents('test.txt');

preg_match_all('{"id":"(\d*?)"}',$exec,$matches,PREG_PATTERN_ORDER);

echo '<pre>';
print_r($matches);

?>