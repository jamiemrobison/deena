<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package_condition`.
 */
class m170831_142635_create_product_package_condition_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_package_condition', [
            'id' => $this->primaryKey(),
            'package_id'=> $this->integer(),
            'title_id' => $this->integer(),
            'condition_text' => $this->string(),
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
        $this->dropTable('product_package_condition');
    }
}
