<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m170707_082026_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'product_code' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
            'photo' => $this->string(),
            'category_id' => $this->integer(),
            'weight' => $this->float(),
            'unit_id' => $this->integer(),
            'price' => $this->money(),
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
        $this->dropTable('product');
    }
}
