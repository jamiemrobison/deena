<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_car`.
 */
class m171102_024811_create_capital_car_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_car', [
            'id' => $this->primaryKey(),
            'cap_year_id' => $this->integer(),
            'brand_id' => $this->integer(),
            'model_id' => $this->integer(),
            'brand_name' => $this->string(),
            'model_name' => $this->string(),
            'car_group' =>$this->string(),
            'car_code' => $this->string(),
            'cpg' => $this->string(),
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
        $this->dropTable('capital_car');
    }
}
