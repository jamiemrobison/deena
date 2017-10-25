<?php

use yii\db\Migration;

/**
 * Handles adding act to table `quotation_detail`.
 */
class m171015_015636_add_act_column_to_quotation_detail_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('quotation','act_amount',$this->float());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('quotation','act_amount');
    }
}
