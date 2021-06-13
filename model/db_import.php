<?php

include("db.php");

$db = db_connect();

db_import($db, "blog.sql", true);
echo "done!";