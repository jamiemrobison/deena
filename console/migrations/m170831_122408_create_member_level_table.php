<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member_level`.
 */
class m170831_122408_create_member_level_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('member_level', [
            'id' => $this->primaryKey(),
            'level' => $this->string(),
            'name' => $this->string(),
            'condition' => $this->string(),
            'description' => $this->string(),
            'disc_per' => $this->integer(),
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
        $this->dropTable('member_level');
    }
}
