<?php

use yii\db\Migration;

/**
 * Class m170827_153018_add_column_to_insurancecompany_table
 */
class m170827_153018_add_column_to_insurancecompany_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insure_company','found_date',$this->integer());
        $this->addColumn('insure_company','reg_capital',$this->integer());
        $this->addColumn('insure_company','emergency_call',$this->string());
        $this->addColumn('insure_company','vat',$this->integer());
        $this->addColumn('insure_company','payment_term',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('insure_company','found_date');
        $this->dropColumn('insure_company','reg_capital');
        $this->dropColumn('insure_company','emergency_call');
        $this->dropColumn('insure_company','vat');
        $this->dropColumn('insure_company','payment_term');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170827_153018_add_column_to_insurancecompany_table cannot be reverted.\n";

        return false;
    }
    */
}
