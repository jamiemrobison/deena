<?php

use yii\db\Migration;

/**
 * Handles the creation of table `permission`.
 */
class m171011_134225_create_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('permission', [
            'id' => $this->primaryKey(),
            'position_id' => $this->integer(),
            'menu_id'=> $this->integer(),
            'menu_type_id'=> $this->integer(),
            'name'=>$this->string(),
            'description'=>$this->string(),
            'is_view'=>$this->integer(),
            'is_delete'=>$this->integer(),
            'is_update'=>$this->integer(),
            'is_insert'=>$this->integer(),
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
        $this->dropTable('permission');
    }
}
