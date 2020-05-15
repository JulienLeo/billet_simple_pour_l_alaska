<?php
    $host= 'db5000441005.hosting-data.io';
    $user= 'dbu598024';
    $pass= '5Février1949';
    $db= 'blog_ecrivain';
    system (sprintf( 'mysql -h %s -u %s -p%s %s < blog_ecrivain.sql ', $host, $user, $pass, $db ));
    echo '+DONE';