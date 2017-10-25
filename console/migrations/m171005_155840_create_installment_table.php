<?php

use yii\db\Migration;

/**
 * Handles the creation of table `installment`.
 */
class m171005_155840_create_installment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('installment', [
                'id' => $this->primaryKey(),
                'payment_type'=>$this->integer(),
                'period' => $this->integer(),
                'first_period' => $this->float(),
                'remain' => $this->integer(),
                'period_per'=>$this->float(),
                'description' => $this->string(),
                'fee'=>$this->float(),
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
        $this->dropTable('installment');
    }
}
