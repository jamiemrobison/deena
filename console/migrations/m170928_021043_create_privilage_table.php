<?php

use yii\db\Migration;

/**
 * Handles the creation of table `privilage`.
 */
class m170928_021043_create_privilage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('privilage', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'module_type' => $this->integer(),
            'action_id' => $this->integer(),
            'permission' => $this->integer(),
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
        $this->dropTable('privilage');
    }
}
