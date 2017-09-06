<?php

use yii\db\Migration;

/**
 * Handles adding photo to table `member`.
 */
class m170829_125421_add_photo_column_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('member','photo',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('member','photo');
    }
}
