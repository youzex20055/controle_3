use PHPUnit\Framework\TestCase;

class TestAddition extends TestCase {
    public function testAddition() {
        $this->assertEquals(4, addition(2, 2));
    }
}
