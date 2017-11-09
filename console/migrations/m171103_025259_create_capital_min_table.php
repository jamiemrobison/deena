<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_min`.
 */
class m171103_025259_create_capital_min_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_min', [
            'id' => $this->primaryKey(),
            'capital_car_id'=>$this->integer(),
            'min'=>$this->float(),
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
        $this->dropTable('capital_min');
    }
}
