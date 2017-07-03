<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventFilesTable Test Case
 */
class EventFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventFilesTable
     */
    public $EventFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.event_files',
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
        $config = TableRegistry::exists('EventFiles') ? [] : ['className' => 'App\Model\Table\EventFilesTable'];
        $this->EventFiles = TableRegistry::get('EventFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventFiles);

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
