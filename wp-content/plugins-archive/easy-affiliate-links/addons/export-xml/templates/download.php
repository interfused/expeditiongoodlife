<?php
header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="EAFL_Links.xml"');

$exportLinks = isset( $_POST['exportLinks'] ) ? base64_decode( $_POST['exportLinks'] ) : 'Link export failed.';
echo $exportLinks;