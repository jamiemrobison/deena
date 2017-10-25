<?php

use yii\db\Migration;

/**
 * Handles adding bank_account to table `insure_payment`.
 */
class m170909_122845_add_bank_account_column_to_insure_payment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
         $this->addColumn('insure_payment','bank_account',$this->integer());
         $this->addColumn('insure_payment','bank_account_name',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
         $this->dropColumn('insure_payment','bank_account');
         $this->dropColumn('insure_payment','bank_account_name');
    }
}
