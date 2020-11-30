<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m201129_223533_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'cmd' => $this->string(),
            'async' => $this->integer(1)->notNull()->defaultValue(0),
            'cnt' => $this->integer()->notNull()->defaultValue(1),
            'done' => $this->integer(1)->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
