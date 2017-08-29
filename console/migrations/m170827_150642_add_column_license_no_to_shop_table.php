<?php

use yii\db\Migration;

/**
 * Class m170827_150642_add_column_license_no_to_shop_table
 */
class m170827_150642_add_column_license_no_to_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('shop','license_no',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('shop','license_no');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170827_150642_add_column_license_no_to_shop_table cannot be reverted.\n";

        return false;
    }
    */
}
