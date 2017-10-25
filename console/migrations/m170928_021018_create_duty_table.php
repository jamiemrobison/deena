<?php

use yii\db\Migration;

/**
 * Handles the creation of table `duty`.
 */
class m170928_021018_create_duty_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('duty', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('duty');
    }
}
