<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTypesCodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTypesCodesTable Test Case
 */
class UsersTypesCodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTypesCodesTable
     */
    public $UsersTypesCodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('UsersTypesCodes') ? [] : ['className' => 'App\Model\Table\UsersTypesCodesTable'];
        $this->UsersTypesCodes = TableRegistry::get('UsersTypesCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTypesCodes);

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
