<?php

use yii\db\Migration;

/**
 * Class m171003_140559_add_column_to_product_price_table
 */
class m171003_140559_add_column_to_product_price_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('product_price','score',$this->float());
     }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('product_price','score');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171003_140559_add_column_to_product_price_table cannot be reverted.\n";

        return false;
    }
    */
}
