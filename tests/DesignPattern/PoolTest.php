<?php declare(strict_types=1);
/**
 * 
 */
namespace Patterns;

/**
 * PoolTest
 */
class PoolTest extends \PHPUnit\Framework\TestCase
{
    /**
     * SetUp
     * @return void
     */
    public function setUp(): void 
    {

    }

    /**
     * TearDown
     */
    public function tearDown(): void
    {

    }

    public function dataProvidy()
    {
        return array(
           // 'explicite' => ['essai','test'],
            //'alpha'     => [545645,'two'],
           'beta'      => ['r','three']
        );    
    }

    public function testReturnArray()
    {
        $this->assertTrue(true);
        return 'expert';
    }

    public function testReturnArray2()
    {
        $this->assertTrue(true);
        return 'expert2';
    }

    /*
     * Test method
     * //@depends testReturnArray
     * //@depends testReturnArray2
     * //@dataProvider dataProvidy
     */
    public function testMethod()
    {
        $pool = new WorkerPool(); 
        
        //if($a==='essai')
          //  $this->assertEquals($b,'test','TestOne');
        
        $worker1 = $pool->get();
        $worker2 = $pool->get();

        //echo "\n".\spl_object_hash($worker1)."\n".$worker1->id;

        $this->assertCount(2, $pool);
        $pool->dispose($worker1);

        $this->assertCount(2, $pool);
        //$work->blob(12);
        //$work->blob($a);

    }
}

