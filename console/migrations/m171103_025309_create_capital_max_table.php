<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_max`.
 */
class m171103_025309_create_capital_max_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_max', [
            'id' => $this->primaryKey(),
            'capital_car_id'=>$this->integer(),
            'max'=>$this->float(),
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
        $this->dropTable('capital_max');
    }
}
