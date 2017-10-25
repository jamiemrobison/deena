<?php

use yii\db\Migration;

/**
 * Handles adding act_id to table `car`.
 */
class m170926_011636_add_act_id_column_to_car_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('car','car_code_id',$this->integer());
        $this->addColumn('car','act_code',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('car','car_code_id');
        $this->dropColumn('car','act_code');
    }
}
