<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m170824_013606_create_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'employee_code' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'position_id' => $this->integer(),
            'phone' => $this->string(),
            'photo' => $this->string(),
            'user_id' => $this->integer(),
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
        $this->dropTable('employee');
    }
}
