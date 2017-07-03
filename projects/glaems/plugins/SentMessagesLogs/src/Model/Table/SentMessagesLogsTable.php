<?php
namespace SentMessagesLogs\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SentMessagesLogs Model
 *
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog get($primaryKey, $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog newEntity($data = null, array $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog[] newEntities(array $data, array $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog[] patchEntities($entities, array $data, array $options = [])
 * @method \SentMessagesLogs\Model\Entity\SentMessagesLog findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SentMessagesLogsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('sent_messages_logs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('sent_to')
            ->allowEmpty('sent_to');

        $validator
            ->allowEmpty('message_text');

        return $validator;
    }
}
