<?php

use yii\db\Migration;

/**
 * Handles adding year_count to table `capital_max`.
 */
class m171103_030718_add_year_count_column_to_capital_max_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
         $this->addColumn('capital_max','year_count',$this->integer());
        $this->addColumn('capital_max','year_text',$this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('capital_max','year_count');
        $this->dropColumn('capital_max','year_text');
    }
}
