<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bank`.
 */
class m170827_125844_create_bank_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bank', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'account_no' => $this->string(),
            'brance' => $this->string(),
            'logo' => $this->string(),
            'party_type_id' =>$this->integer(),
            'party_id' => $this->integer(),
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
        $this->dropTable('bank');
    }
}
