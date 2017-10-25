<?php

use yii\db\Migration;

/**
 * Handles adding role_id to table `permission`.
 */
class m171019_092600_add_role_id_column_to_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user','role_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user','role_id');
    }
}
