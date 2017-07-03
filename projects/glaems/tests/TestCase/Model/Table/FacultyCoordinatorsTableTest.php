<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FacultyCoordinatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FacultyCoordinatorsTable Test Case
 */
class FacultyCoordinatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FacultyCoordinatorsTable
     */
    public $FacultyCoordinators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.faculty_coordinators',
        'app.events',
        'app.costs',
        'app.event_coordinators',
        'app.event_files',
        'app.qrcodes',
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
        $config = TableRegistry::exists('FacultyCoordinators') ? [] : ['className' => 'App\Model\Table\FacultyCoordinatorsTable'];
        $this->FacultyCoordinators = TableRegistry::get('FacultyCoordinators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FacultyCoordinators);

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
