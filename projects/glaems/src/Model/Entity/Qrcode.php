<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Qrcode Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $event_visitor_id
 * @property string $code_value
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\User $user
 */
class Qrcode extends Entity
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
