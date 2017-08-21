<?php
namespace tests;

use app\components\RandomArrayComponent;

class RandomArrayComponentTest extends \Codeception\Test\Unit
{
    private $randArr;

    protected function setUp()
    {
        $this->randArr = new RandomArrayComponent();
    }

    protected function tearDown()
    {
        $this->randArr = NULL;
    }

    public function testAdd()
    {
        $result = $this->randArr->add(1, 2);
        $this->assertEquals(3, $result);
    }
}