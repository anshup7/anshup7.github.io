<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventCoordinatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventCoordinatorsTable Test Case
 */
class EventCoordinatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventCoordinatorsTable
     */
    public $EventCoordinators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.event_coordinators',
        'app.events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EventCoordinators') ? [] : ['className' => 'App\Model\Table\EventCoordinatorsTable'];
        $this->EventCoordinators = TableRegistry::get('EventCoordinators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventCoordinators);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
