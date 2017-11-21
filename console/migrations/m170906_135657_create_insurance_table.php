<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insurance`.
 */
class m170906_135657_create_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insurance', [
            'id' => $this->primaryKey(),
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
        $this->dropTable('insurance');
    }
}
