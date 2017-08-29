<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `column_bank`.
 */
class m170827_134210_drop_column_bank_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('bank','account_no');
        $this->dropColumn('bank','brance');
        $this->dropColumn('bank','bank_id');
        $this->dropColumn('bank','party_type_id');
        $this->dropColumn('bank','party_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
       $this->addColumn('bank','account_no',$this->string());
       $this->addColumn('bank','brance',$this->string());
       $this->addColumn('bank','bank_id',$this->integer());
       $this->addColumn('bank','party_type_id',$this->integer());
       $this->addColumn('bank','party_id',$this->integer());
    }
}
