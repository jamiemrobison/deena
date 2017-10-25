<?php

use yii\db\Migration;

/**
 * Handles the creation of table `actprotect`.
 */
class m170913_154948_create_actprotect_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('actprotect', [
            'id' => $this->primaryKey(),
            'protect_id' => $this->integer(),
            'name' => $this->string(),
            'description'=>$this->string(),
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
        $this->dropTable('actprotect');
    }
}
