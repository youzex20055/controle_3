<?php
require_once '../index.php';

function testAdd() {
    assert(add(2, 3) === 5, '2 + 3 doit égaler 5');
    assert(add(-1, 1) === 0, '-1 + 1 doit égaler 0');
}

testAdd();
echo "Tous les tests sont passés.\n";
?>
