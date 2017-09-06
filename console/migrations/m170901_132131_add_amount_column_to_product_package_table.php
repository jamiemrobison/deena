<?php

use yii\db\Migration;

/**
 * Handles adding amount to table `product_package`.
 */
class m170901_132131_add_amount_column_to_product_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product_package_detail','amount',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product_package_detail','amount');
    }
}
