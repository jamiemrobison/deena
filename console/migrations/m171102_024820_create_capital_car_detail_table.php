<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_car_detail`.
 */
class m171102_024820_create_capital_car_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_car_detail', [
            'id' => $this->primaryKey(),
            'capital_car_id'=> $this->integer(),
            'year_amount' => $this->integer(),
            'yeat_text' => $this->string(),
            'capital_min' => $this->float(),
            'capital_max' => $this->float(),
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
        $this->dropTable('capital_car_detail');
    }
}
