<?php

use yii\db\Migration;

/**
 * Handles the creation of table `installment_detail`.
 */
class m171005_155849_create_installment_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('installment_detail', [
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
        $this->dropTable('installment_detail');
    }
}
