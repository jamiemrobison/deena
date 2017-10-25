<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car_type`.
 */
class m170910_084452_create_car_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car_type', [
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
        $this->dropTable('car_type');
    }
}
