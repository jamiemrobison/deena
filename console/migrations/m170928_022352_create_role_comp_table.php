<?php

use yii\db\Migration;

/**
 * Handles the creation of table `role_comp`.
 */
class m170928_022352_create_role_comp_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('role_comp', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer(),
            'duty_id' => $this->integer(),
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
        $this->dropTable('role_comp');
    }
}
