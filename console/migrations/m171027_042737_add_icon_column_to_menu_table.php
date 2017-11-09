<?php

use yii\db\Migration;

/**
 * Handles adding icon to table `menu`.
 */
class m171027_042737_add_icon_column_to_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('menu','icon',$this->string());
        $this->addColumn('menu','url',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('menu','icon');
        $this->dropColumn('menu','url');
    }
}
