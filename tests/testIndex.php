<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../index.php';

class IndexTest extends TestCase {
    public function testAdd() {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(0, add(-2, 2));
    }

    public function testSubtract() {
        $this->assertEquals(0, subtract(2, 2));
        $this->assertEquals(-4, subtract(-2, 2));
    }
}
?>
