<?php

$Shield = new Api\Shield();

# Protect Request Method
$Shield->Method('GET');

# Protect Request Params
$Shield->Params(['Name', 'Password']);

$Shield->Protect();

Api\Response::success('Ok');
