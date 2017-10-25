<?php

use yii\db\Migration;

/**
 * Handles adding is_approve to table `permission`.
 */
class m171022_014729_add_is_approve_column_to_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('permission','is_approve',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('permission','is_approve');
    }
}
