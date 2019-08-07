<?php

$Shield = new Api\Shield();

# Protect Request Method
$Shield->Method('GET');

# Protect Request Params
$Shield->Params(['Name']);

$Shield->Protect();
