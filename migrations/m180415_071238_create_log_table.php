<?php

use yii\db\Migration;

/**
 * Handles the creation of table `log`.
 */
class m180415_071238_create_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('log', [
            'id' => $this->primaryKey(),
            'item' => $this->string(255)->notNull(),
            'desc' => $this->text(),
            'type' => "ENUM('debit', 'credit')",
            'cost' => $this->integer(),
            'datetime' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('log');
    }
}
