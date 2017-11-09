<?php

use yii\db\Migration;

/**
 * Class m171031_134502_add_insure_amount_to_quotation_detail_table
 */
class m171031_134502_add_insure_amount_to_quotation_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('quotation_detail','insure_amount',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       $this->dropColumn('quotation_detail','insure_amount');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171031_134502_add_insure_amount_to_quotation_detail_table cannot be reverted.\n";

        return false;
    }
    */
}
