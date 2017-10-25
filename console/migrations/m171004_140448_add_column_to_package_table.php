<?php

use yii\db\Migration;

/**
 * Class m171004_140448_add_column_to_package_table
 */
class m171004_140448_add_column_to_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('product_package','car_code',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('product_package','car_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171004_140448_add_column_to_package_table cannot be reverted.\n";

        return false;
    }
    */
}
