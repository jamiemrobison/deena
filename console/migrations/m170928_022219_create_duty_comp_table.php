<?php

use yii\db\Migration;

/**
 * Handles the creation of table `duty_comp`.
 */
class m170928_022219_create_duty_comp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('duty_comp', [
            'id' => $this->primaryKey(),
            'duty_id' => $this->integer(),
            'privilage_id' => $this->integer(),
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
        $this->dropTable('duty_comp');
    }
}
