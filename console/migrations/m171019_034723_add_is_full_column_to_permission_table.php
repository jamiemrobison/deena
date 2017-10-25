<?php

use yii\db\Migration;

/**
 * Handles adding is_full to table `permission`.
 */
class m171019_034723_add_is_full_column_to_permission_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('permission','role_id',$this->integer()->after('position_id'));
        $this->addColumn('permission','is_full',$this->integer()->after('description'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('permission','role_id');
        $this->dropColumn('permission','is_full');
    }
}
