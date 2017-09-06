<?php

use yii\db\Migration;

/**
 * Handles adding parent_id to table `product`.
 */
class m170831_140647_add_parent_id_column_to_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('product','parent_id',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('product','parent_id');
    }
}
