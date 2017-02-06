<?php
include "../database.php";
include "../class.php";

echo json_encode(categoriesClass::selectAll());