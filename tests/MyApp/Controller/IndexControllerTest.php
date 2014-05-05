<?php
namespace Test;

/**
 * Class IndexControllerTest
 */
class IndexControllerTest extends \UnitTestCase
{
    public function testCreateInstance()
    {
        new \MyApp\Controller\IndexController();
    }

    /**
     * @depends testCreateInstance
     */
    public function testIndexAction()
    {
        $controller = new \MyApp\Controller\IndexController();
        $this->assertTrue(method_exists($controller, 'index'));

        $response = $controller->index('test');
        $this->assertEquals('{"status":"OK","body":"test"}', $response->getContent());
    }
}
