<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_price`.
 */
class m170917_041009_create_product_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_price', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer(),
            'package_id' =>$this->integer(),
            'car_start_year'=>$this->integer(),
            'car_end_year'=>$this->integer(),
            'amount_start'=>$this->float(),
            'amount_end' =>$this->float(),
            'total'=>$this->float(),
            'alltotal'=>$this->float(),
            'is_discount'=>$this->integer(),
            'is_introduce'=>$this->integer(),
            'is_line'=>$this->integer(),
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
        $this->dropTable('product_price');
    }
}
