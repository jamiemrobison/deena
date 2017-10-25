<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sub_category`.
 */
class m170912_075216_create_sub_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sub_category', [
            'id' => $this->primaryKey(),
            'category_id'=>$this->integer(),
            'name'=> $this->string(),
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
        $this->dropTable('sub_category');
    }
}
