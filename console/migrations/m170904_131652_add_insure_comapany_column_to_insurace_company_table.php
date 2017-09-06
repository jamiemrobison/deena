<?php

use yii\db\Migration;

/**
 * Handles adding insure_comapany to table `insurace_company`.
 */
class m170904_131652_add_insure_comapany_column_to_insurace_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('commission_insure','insure_company_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('commission_insure','insure_company_id');
    }
}
