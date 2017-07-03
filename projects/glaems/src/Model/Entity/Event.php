<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $event_name
 * @property \Cake\I18n\Time $date_of_registration
 * @property \Cake\I18n\Time $date_of_commencement
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Cost[] $costs
 * @property \App\Model\Entity\EventCoordinator[] $event_coordinators
 * @property \App\Model\Entity\EventFile[] $event_files
 * @property \App\Model\Entity\FacultyCoordinator[] $faculty_coordinators
 * @property \App\Model\Entity\Qrcode[] $qrcodes
 * @property \App\Model\Entity\Revenue[] $revenues
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
