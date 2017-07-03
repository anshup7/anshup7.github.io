<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitorsTable Test Case
 */
class VisitorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitorsTable
     */
    public $Visitors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visitors',
        'app.events',
        'app.costs',
        'app.event_coordinators',
        'app.event_files',
        'app.faculty_coordinators',
        'app.qrcodes',
        'app.users',
        'app.users_status_codes',
        'app.users_types_codes',
        'app.revenues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Visitors') ? [] : ['className' => 'App\Model\Table\VisitorsTable'];
        $this->Visitors = TableRegistry::get('Visitors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Visitors);

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
