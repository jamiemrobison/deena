<?php

use yii\db\Migration;

/**
 * Class m171002_070613_add_column_to_insurance_table
 */
class m171002_070613_add_column_to_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insurance_table','act_amount',$this->float());
        $this->addColumn('insurance_table','score',$this->float());
        $this->addColumn('insurance_table','promotion',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('insurance_table','act_amount');
      $this->dropColumn('insurance_table','score');
      $this->dropColumn('insurance_table','promotion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171002_070613_add_column_to_insurance_table cannot be reverted.\n";

        return false;
    }
    */
}
