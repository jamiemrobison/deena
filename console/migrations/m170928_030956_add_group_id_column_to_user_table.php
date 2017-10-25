<?php

use yii\db\Migration;

/**
 * Handles adding group_id to table `user`.
 */
class m170928_030956_add_group_id_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user','group_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user','group_id');
    }
}
