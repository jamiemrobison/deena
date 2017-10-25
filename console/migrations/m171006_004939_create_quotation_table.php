<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotation`.
 */
class m171006_004939_create_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quotation', [
            'id' => $this->primaryKey(),
            'quotation_no'=>$this->string(),
            'name' => $this->string(),
            'quotation_date'=>$this->integer(),
            'package_id'=>$this->string(),
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
        $this->dropTable('quotation');
    }
}
