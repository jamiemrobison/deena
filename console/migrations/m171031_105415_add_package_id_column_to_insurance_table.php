<?php

use yii\db\Migration;

/**
 * Handles adding package_id to table `insurance`.
 */
class m171031_105415_add_package_id_column_to_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('insurance_table','package_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('insurance_table','package_id');
    }
}
