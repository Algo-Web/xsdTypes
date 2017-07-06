<?php


namespace AlgoWeb\xsdTypes;

/**
 * Generated Test Class.
 */
class xsDateTimeTest extends \PHPUnit_Framework_TestCase
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
     * @dataProvider testxsDateTimeValidDataProvider
     */
    public function testxsDateTimeValid($input, $message)
    {
        try {
            $d = new xsDateTime($input);
            $e = (string)$d;
        } catch (\Exception $e) {
    $this->fail($message . ' with Exception ' . $e->getMessage());
}
    }

    public function testxsDateTimeValidDataProvider()
{
        return array(
            array('2004-04-12T13:20:00', '1:20 pm on April 12, 2004'),
            array('2004-04-12T13:20:15.5', '1:20 pm and 15.5 seconds on April 12, 2004'),
            array('2004-04-12T13:20:00-05:00', '1:20 pm on April 12, 2004, US Eastern Standard Time'),
            array('2004-04-12T13:20:00Z', '	1:20 pm on April 12, 2004, Coordinated Universal Time (UTC)'),
        );
    }

    /**
     * @dataProvider testxsDateTimeInvalidDataProvider
     */
    public function testxsDateTimeInvalid($input, $message)
{
        try {
            $d = new xsDateTime($input);
            $e = (string)$d;
            $this->fail($message);
        } catch (\Exception $e) {
        }
        $this->assertEquals('', $e, $message);
    }

    public function testxsDateTimeInvalidDataProvider()
{
        return array(
            array('2004-04-12T13:00', 'seconds must be specified'),
            array('2004-04-1213:20:00', 'the letter T is required'),
            array('99-04-12T13:00', 'the century must not be left truncated'),
            array('2004-04-12', 'the time is required'),
            array('', 'an empty value is not valid, unless xsi:nil is used'),
        );
    }
}