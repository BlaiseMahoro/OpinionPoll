<?php

require 'opinion_poll_model.php';

$model = new OpinionPoll();
echo 'reached 1';
$res = $model->execute_query('INSERT INTO `js_libraries` (`choice`, `ts`) VALUES (4,NOW());');
echo 'Inserted '.$res.'\n';

?>
