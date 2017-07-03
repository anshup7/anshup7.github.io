<?php
namespace SentMessagesLogs\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use SentMessagesLogs\Model\Table\SentMessagesLogsTable;

/**
 * SentMessagesLogs\Model\Table\SentMessagesLogsTable Test Case
 */
class SentMessagesLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \SentMessagesLogs\Model\Table\SentMessagesLogsTable
     */
    public $SentMessagesLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.sent_messages_logs.sent_messages_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SentMessagesLogs') ? [] : ['className' => 'SentMessagesLogs\Model\Table\SentMessagesLogsTable'];
        $this->SentMessagesLogs = TableRegistry::get('SentMessagesLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SentMessagesLogs);

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
