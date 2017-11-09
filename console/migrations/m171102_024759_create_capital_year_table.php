<?php

use yii\db\Migration;

/**
 * Handles the creation of table `capital_year`.
 */
class m171102_024759_create_capital_year_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('capital_year', [
            'id' => $this->primaryKey(),
            'cap_year' => $this->integer(),
            'description' => $this->string(),
            'insure_company_id' => $this->integer(),
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
        $this->dropTable('capital_year');
    }
}
