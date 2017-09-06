<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insure_payment`.
 */
class m170905_163122_create_insure_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insure_payment', [
            'id' => $this->primaryKey(),
            'payment_date' => $this->integer(),
            'payment_time' => $this->time(),
            'period_no' => $this->integer(),
            'amount' => $this->float(),
            'remark' => $this->string(),
            'insure_no' => $this->integer(),
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
        $this->dropTable('insure_payment');
    }
}
