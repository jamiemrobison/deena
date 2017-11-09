<?php

use yii\db\Migration;

/**
 * Handles adding number to table `menu`.
 */
class m171027_085134_add_number_column_to_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('menu','number',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('menu','number');
    }
}
