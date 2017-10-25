<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `member`.
 */
class m170928_031400_add_user_id_column_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('member','user_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user','user_id');
    }
}
