<?php

use yii\db\Migration;

/**
 * Handles the creation of table `act`.
 */
class m170910_083937_create_act_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('act', [
            'id' => $this->primaryKey(),
            'car_code' => $this->integer(),
            'car_type_id' => $this->integer(),
            'car_description' => $this->string(),
            'tax_premium' => $this->float(),
            'tax' => $this->float(),
            'duty' => $this->float(),
            'all_premium' => $this->float(),
            'protect_amount' => $this->float(),
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
        $this->dropTable('act');
    }
}
