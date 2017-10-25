<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promotion`.
 */
class m171003_142048_create_promotion_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('promotion', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
            'amount' => $this->float(),
            'promotion_type' => $this->integer(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'photo' => $this->string(),
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
        $this->dropTable('promotion');
    }
}
