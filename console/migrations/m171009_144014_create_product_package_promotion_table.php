<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package_promotion`.
 */
class m171009_144014_create_product_package_promotion_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_package_promotion', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer(),
            'promotion_id' =>$this->integer(),
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
        $this->dropTable('product_package_promotion');
    }
}
