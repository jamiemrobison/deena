<?php

use yii\db\Migration;

/**
 * Class m170923_013534_add_dealer_id_to_insurance_company_table
 */
class m170923_013534_add_dealer_id_to_insurance_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('insure_company','dealer_id',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
      $this->dropColumn('insure_company','dealer_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_013534_add_dealer_id_to_insurance_company_table cannot be reverted.\n";

        return false;
    }
    */
}
