<?php

use yii\db\Migration;

/**
 * Handles adding sub_number to table `menu`.
 */
class m171110_103838_add_sub_number_column_to_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('menu','sub_number',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('menu','sub_number');
    }
}
