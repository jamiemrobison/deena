<?php

use yii\db\Migration;

/**
 * Handles the creation of table `docu_ref`.
 */
class m170904_144137_create_docu_ref_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('docu_ref', [
            'id' => $this->primaryKey(),
            'doc_type' => $this->integer(),
            'doc_group_id' => $this->integer(),
            'name' => $this->string(),
            'party_type_id' => $this->integer(),
            'party_id' => $this->integer(),
            'description' => $this->string(),
            'filename' => $this->string(),
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
        $this->dropTable('docu_ref');
    }
}
