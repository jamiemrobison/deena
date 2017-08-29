<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insure_company`.
 */
class m170823_090105_create_insure_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insure_company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'logo' => $this->string(),
            'credit_limit' => $this->decimal(),
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
        $this->dropTable('insure_company');
    }
}
