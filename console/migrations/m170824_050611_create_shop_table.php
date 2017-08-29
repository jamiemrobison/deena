<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m170824_050611_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'email' => $this->string(),
            'address' => $this->string(),
            'zipcode' => $this->integer(),
            'phone' => $this->string(),
            'mobile' => $this->string(),
            'logo' =>$this->string(),
            'taxid' => $this->string(),
            'website' =>$this->string(),
            'facebook' => $this->string(),
            'line' => $this->string(),
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
        $this->dropTable('shop');
    }
}
