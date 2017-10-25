<?php

use yii\db\Migration;

/**
 * Class m170930_135740_add_column_to_insure_table
 */
class m170930_135740_add_column_to_insure_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','seat',$this->string());
        $this->addColumn('insurance_table','weight',$this->float());
        $this->addColumn('insurance_table','cc',$this->float());
        $this->addColumn('insurance_table','level_id',$this->integer());
        $this->addColumn('insurance_table','intro_id',$this->integer());
        $this->addColumn('insurance_table','line_id',$this->integer());
        $this->addColumn('insurance_table','photo_contact',$this->integer());
        $this->addColumn('insurance_table','photo_number',$this->integer());
        $this->addColumn('insurance_table','photo_remark',$this->string());
        $this->addColumn('insurance_table','note_date',$this->integer());
        $this->addColumn('insurance_table','note_remark',$this->string());
        $this->addColumn('insurance_table','note_empid',$this->integer());
        $this->addColumn('insurance_table','note_status',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('insurance_table','seat');
        $this->dropColumn('insurance_table','weight');
        $this->dropColumn('insurance_table','cc');
        $this->dropColumn('insurance_table','level_id');
        $this->dropColumn('insurance_table','intro_id');
        $this->dropColumn('insurance_table','line_id');
        $this->dropColumn('insurance_table','photo_contact');
        $this->dropColumn('insurance_table','photo_number');
        $this->dropColumn('insurance_table','photo_remark');
        $this->dropColumn('insurance_table','note_date');
        $this->dropColumn('insurance_table','note_remark');
        $this->dropColumn('insurance_table','note_empid');
        $this->dropColumn('insurance_table','note_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170930_135740_add_column_to_insure_table cannot be reverted.\n";

        return false;
    }
    */
}
