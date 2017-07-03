<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QrcodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QrcodesTable Test Case
 */
class QrcodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QrcodesTable
     */
    public $Qrcodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.qrcodes',
        'app.events',
        'app.costs',
        'app.event_coordinators',
        'app.event_files',
        'app.faculty_coordinators',
        'app.revenues',
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
        $config = TableRegistry::exists('Qrcodes') ? [] : ['className' => 'App\Model\Table\QrcodesTable'];
        $this->Qrcodes = TableRegistry::get('Qrcodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Qrcodes);

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
