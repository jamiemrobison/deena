<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m170824_013009_create_address_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'party_id'=> $this->integer(),
            'party_type_id'=> $this->integer(),
            'address_type_id' => $this->integer(),
            'address'=> $this->string(),
            'zipcode'=>$this->integer(),
            'province'=>$this->integer(),
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
        $this->dropTable('address');
    }
}
