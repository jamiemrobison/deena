<?php

use yii\db\Migration;

/**
 * Class m170913_162952_add_column_to_product_package_detail_table
 */
class m170913_162952_add_column_to_product_package_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('product_package_detail','actprotect_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('product_package_detail','actprotect_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170913_162952_add_column_to_product_package_detail_table cannot be reverted.\n";

        return false;
    }
    */
}
