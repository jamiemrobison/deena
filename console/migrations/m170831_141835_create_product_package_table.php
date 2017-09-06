<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package`.
 */
class m170831_141835_create_product_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_package', [
            'id' => $this->primaryKey(),
            'company_insure'=> $this->integer(),
            'insure_type' => $this->integer(),
            'name' => $this->string(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'service_type' => $this->integer(),
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
        $this->dropTable('product_package');
    }
}
