<?php
/** 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Patterns;

/** 
 * Comments 
 */
class AbstractFactoryTest extends \PHPUnit\Framework\TestCase
{   
    public function testIsItOk()
    {
        $parserFactory = new \Patterns\ParserFactory();
        $csvParser = $parserFactory->createCsvParser();
        $jsonParser = $parserFactory->createJsonParser();
        $this->assertEquals(['csv'=>'parsed 1'], $csvParser->parse(''));
        $this->assertEquals(['json'=>'parsed'], $jsonParser->parse(''));
    }
}