<?php

use yii\db\Migration;

/**
 * Class m171003_140524_add_column_to_product_package_table
 */
class m171003_140524_add_column_to_product_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('product_package','score_rate',$this->float());
        $this->addColumn('product_package','promotion',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('product_package','score_rate');
        $this->dropColumn('product_package','promotion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171003_140524_add_column_to_product_package_table cannot be reverted.\n";

        return false;
    }
    */
}
