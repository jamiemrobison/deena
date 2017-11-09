<?php

use yii\db\Migration;

/**
 * Handles adding parent_id to table `menu`.
 */
class m171027_020237_add_parent_id_column_to_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('menu','parent_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('menu','parent_id');
    }
}
