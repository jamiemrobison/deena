<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_package_detail`.
 */
class m170831_142625_create_product_package_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_package_detail', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer(),
            'coverage_type' => $this->integer(),
            'converage_detail' => $this->string(),
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
        $this->dropTable('product_package_detail');
    }
}
