<?php

use yii\db\Migration;

/**
 * Class m170922_142749_add_column_to_member_table
 */
class m170922_142749_add_column_to_member_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('member','district',$this->integer());
        $this->addColumn('member','amphur',$this->integer());
        $this->addColumn('member','province',$this->integer());
        $this->addColumn('member','zipcode',$this->integer());
        $this->addColumn('member','member_into',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
     $this->dripColumn('member','district');
     $this->dripColumn('member','amphur');
     $this->dripColumn('member','province');
     $this->dripColumn('member','zipcode');
     $this->dripColumn('member','member_into');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170922_142749_add_column_to_member_table cannot be reverted.\n";

        return false;
    }
    */
}
