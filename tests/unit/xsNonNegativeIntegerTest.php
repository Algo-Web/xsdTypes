<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsNonNegativeIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @dataProvider testxsNonNegativeIntegerTestValidDataProvider
     */
    public function testxsNonNegativeIntegerTestValid($duration, $message) {
        $d = new xsNonNegativeInteger($duration);
        $e = (string)$d;
        $this->assertEquals($duration,$e,$message);

    }

    public function testxsNonNegativeIntegerTestValidDataProvider() {
        return array(
            array(3, '3'),
            array('0', 'Zero'),
            array('00122', 'leading zeros are permitted'),
        );
    }
    /**
     * @dataProvider testxxsNonNegativeIntegerTestInvalidDataProvider
     */
    public function testxsNonNegativeIntegerTestInvalid($duration, $message) {
        try {
            $d = new xsNonNegativeInteger($duration);
            $e = (string)$d;
            $this->fail($message);
        }catch(\Exception $e){}
    }

    public function testxsNonNegativeIntegerTestInvalidDataProvider() {
        return array(
            array('-3', 'value cannot be negative'),
            array('3.0', 'value must not contain a decimal point'),
            array('', '	an empty value is not valid, unless xsi:nil is used'),
        );
    }
}
