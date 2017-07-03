<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersStatusCodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersStatusCodesTable Test Case
 */
class UsersStatusCodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersStatusCodesTable
     */
    public $UsersStatusCodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_status_codes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersStatusCodes') ? [] : ['className' => 'App\Model\Table\UsersStatusCodesTable'];
        $this->UsersStatusCodes = TableRegistry::get('UsersStatusCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersStatusCodes);

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
}
