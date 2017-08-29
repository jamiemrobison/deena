<?php

use yii\db\Migration;

/**
 * Handles the creation of table `carinfo`.
 */
class m170823_085214_create_car_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car_info', [
            'id' => $this->primaryKey(),
            'brand' => $this->integer(),
            'model' => $this->string(),
            'car_year' => $this->string(),
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
        $this->dropTable('carinfo');
    }
}
