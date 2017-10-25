<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m170824_013020_create_contact_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'party_id'=> $this->integer(),
            'party_type_id'=> $this->integer(),
            'name' => $this->string(),
            'contact_type_id' => $this->integer(),
            'contact_txt' => $this->string(),
            'is_primary' => $this->integer(),
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
        $this->dropTable('contact');
    }
}
