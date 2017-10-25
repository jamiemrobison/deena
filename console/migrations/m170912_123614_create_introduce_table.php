<?php

use yii\db\Migration;

/**
 * Handles the creation of table `introduce`.
 */
class m170912_123614_create_introduce_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('introduce', [
            'id' => $this->primaryKey(),
            'intro_code' => $this->string(),
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
        $this->dropTable('introduce');
    }
}
