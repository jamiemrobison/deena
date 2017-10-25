<?php

use yii\db\Migration;

/**
 * Class m171006_012119_add_column_to_quotation_table
 */
class m171006_012119_add_column_to_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('quotation','car_id',$this->integer());
        $this->addColumn('quotation','plate_category',$this->string());
        $this->addColumn('quotation','plate_number',$this->string());
        $this->addColumn('quotation','plate_province',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('quotation','car_id');
        $this->dropColumn('quotation','plate_category');
        $this->dropColumn('quotation','plate_number');
        $this->dropColumn('quotation','plate_province');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171006_012119_add_column_to_quotation_table cannot be reverted.\n";

        return false;
    }
    */
}
