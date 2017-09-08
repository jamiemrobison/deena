<?php

use yii\db\Migration;

/**
 * Handles the creation of table `insurance_table`.
 */
class m170907_072539_create_insurance_table_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('insurance_table', [
            'id' => $this->primaryKey(),
            'inform_code' => $this->string(),
            'insure_code' => $this->string(),
            'insure_company_id'=>$this->integer(),
            'insure_type_id' => $this->integer(),
            'product_id' => $this->integer(),
            'insure_no' => $this->string(),
            'id_card' => $this->integer(),
            'prefix' => $this->integer(),
            'customer' => $this->string(),
            'address' => $this->string(),
            'district' => $this->string(),
            'city' => $this->string(),
            'province' => $this->integer(),
            'zipcode' => $this->integer(),
            'phone' => $this->string(),
            'mobile' => $this->string(),
            'email' => $this->string(),
            'car_code' => $this->integer(),
            'car_brand' => $this->integer(),
            'car_model' => $this->integer(),
            'plate_license' => $this->string(),
            'plate_province' => $this->integer(),
            'body_no' => $this->string(),
            'machine_no' => $this->string(),
            'car_additional' => $this->string(),
            'body_model' => $this->string(),
            'car_year' => $this->integer(),
            'car_usage' => $this->string(),
            'protect_start_date' => $this->integer(),
            'protect_end_date' => $this->integer(),
            'additional_protect' => $this->string(),
            'insure_capital' => $this->float(),
            'include_dis' => $this->string(),
            'total' => $this->float(),
            'grand_total' => $this->float(),
            'receive_date' => $this->integer(),
            'member_id' => $this->integer(),
            'insure_driver' => $this->integer(),
            'driver_one' => $this->string(),
            'driver_two' => $this->string(),
            'driver_date_one' => $this->integer(),
            'driver_date_two' => $this->integer(),
            'insure_renew_date' => $this->integer(),
            'beneficiary' => $this->string(),
            'remark' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('insurance_table');
    }
}
