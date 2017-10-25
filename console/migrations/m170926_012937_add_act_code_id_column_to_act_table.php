<?php

use yii\db\Migration;

/**
 * Handles adding act_code_id to table `act`.
 */
class m170926_012937_add_act_code_id_column_to_act_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('act','act_code_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('act','act_code_id');
    }
}
