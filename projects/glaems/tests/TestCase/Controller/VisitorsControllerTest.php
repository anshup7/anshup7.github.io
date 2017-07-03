<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VisitorsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VisitorsController Test Case
 */
class VisitorsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
