<?php

use yii\db\Migration;

/**
 * Handles the creation of table `commission_insure`.
 */
class m170903_150200_create_commission_insure_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('commission_insure', [
            'id' => $this->primaryKey(),
            'insure_type'=> $this->integer(),
            'promotion_name' => $this->string(),
            'commission_percent' => $this->integer(),
            'commission_amont' => $this->integer(),
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
        $this->dropTable('commission_insure');
    }
}
