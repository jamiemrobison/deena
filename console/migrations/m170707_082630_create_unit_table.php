<?php

use yii\db\Migration;

/**
 * Handles the creation of table `unit`.
 */
class m170707_082630_create_unit_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('unit', [
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
        $this->dropTable('unit');
    }
}
