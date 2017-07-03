<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevenuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevenuesTable Test Case
 */
class RevenuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RevenuesTable
     */
    public $Revenues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.revenues',
        'app.events',
        'app.costs',
        'app.event_coordinators',
        'app.event_files',
        'app.faculty_coordinators',
        'app.qrcodes',
        'app.users',
        'app.users_status_codes',
        'app.users_types_codes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Revenues') ? [] : ['className' => 'App\Model\Table\RevenuesTable'];
        $this->Revenues = TableRegistry::get('Revenues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Revenues);

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
