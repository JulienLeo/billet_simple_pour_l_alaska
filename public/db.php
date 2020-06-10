<?php
    $host= 'db5000441005.hosting-data.io';
    $user= 'dbu598024';
    $pass= '5Fevrier1949!';
    $db= 'dbs422147';
    system (sprintf( 'mysql -h %s -u %s -p%s %s < blog_ecrivain.sql ', $host, $user, $pass, $db ));
    echo '+DONE';