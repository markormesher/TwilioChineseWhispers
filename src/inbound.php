<?php

$fh = fopen('last-response.txt', 'w');
fwrite($fh, time() . '//' . $_POST['Body']);
fclose($fh);