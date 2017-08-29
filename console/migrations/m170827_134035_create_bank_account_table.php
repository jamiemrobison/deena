<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bank_account`.
 */
class m170827_134035_create_bank_account_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bank_account', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'account_no' => $this->string(),
            'brance' => $this->string(),
            'bank_id' => $this->integer(),
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
        $this->dropTable('bank_account');
    }
}
