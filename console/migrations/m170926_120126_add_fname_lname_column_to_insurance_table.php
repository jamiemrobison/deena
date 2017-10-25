<?php

use yii\db\Migration;

/**
 * Handles adding fname_lname to table `insurance`.
 */
class m170926_120126_add_fname_lname_column_to_insurance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('insurance_table','fname',$this->string());
        $this->addColumn('insurance_table','lname',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('insurance_table','fname');
        $this->dropColumn('insurance_table','lname');
    }
}
