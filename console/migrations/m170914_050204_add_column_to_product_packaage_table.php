<?php

use yii\db\Migration;

/**
 * Class m170914_050204_add_column_to_product_packaage_table
 */
class m170914_050204_add_column_to_product_packaage_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn("product_package",'package_code',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('product_package','package_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_050204_add_column_to_product_packaage_table cannot be reverted.\n";

        return false;
    }
    */
}
