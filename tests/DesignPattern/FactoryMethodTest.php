<?php
/**
 *  
 */

namespace Patterns;

class FactoryMethodTest extends \PHPUnit\Framework\TestCase
{
    
    
    public function testIfCanCreateLogger()
    {
        $this->expectOutputString('salutplus');
        $loggerFactory = new StdoutLoggerFactory();
        $log = $loggerFactory->createLogger();
        $log->log('salut');
    }
}
