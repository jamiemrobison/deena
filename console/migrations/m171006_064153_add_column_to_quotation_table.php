<?php

use yii\db\Migration;

/**
 * Class m171006_064153_add_column_to_quotation_table
 */
class m171006_064153_add_column_to_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
       $this->addColumn('quotation','car_code',$this->integer());
       $this->addColumn('quotation','car_brand',$this->integer());
       $this->addColumn('quotation','car_model',$this->integer());
       $this->addColumn('quotation','car_year',$this->integer());
       $this->addColumn('quotation','has_part',$this->integer());
       $this->addColumn('quotation','remark',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('quotation','car_code');
       $this->dropColumn('quotation','car_brand');
       $this->dropColumn('quotation','car_model');
       $this->dropColumn('quotation','car_year');
       $this->dropColumn('quotation','has_part');
       $this->dropColumn('quotation','remark');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171006_064153_add_column_to_quotation_table cannot be reverted.\n";

        return false;
    }
    */
}
