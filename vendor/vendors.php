#!/usr/bin/env php
<?php

set_time_limit(0);

echo "> Downloading composer\n";
system(sprintf('curl -s http://getcomposer.org/installer | php'));
echo "> Running composer install\n";
system(sprintf('php composer.phar install'));