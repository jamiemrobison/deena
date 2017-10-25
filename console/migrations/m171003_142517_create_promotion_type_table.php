<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promotion_type`.
 */
class m171003_142517_create_promotion_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('promotion_type', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
            'description'=>$this->string(),
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
        $this->dropTable('promotion_type');
    }
}
