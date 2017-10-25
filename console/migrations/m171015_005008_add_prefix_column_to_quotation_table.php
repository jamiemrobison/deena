<?php

use yii\db\Migration;

/**
 * Handles adding prefix to table `quotation`.
 */
class m171015_005008_add_prefix_column_to_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('quotation','prefix_id',$this->integer());
        $this->addColumn('quotation','fname',$this->string());
        $this->addColumn('quotation','lname',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('quotation','prefix_id');
        $this->dropColumn('quotation','fname');
        $this->dropColumn('quotation','lname');
    }
}
