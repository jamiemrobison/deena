<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string $description
 * @property int $start_date
 * @property int $end_date
 * @property string $photo
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['category_id','title'],'required'],
        [['start_date', 'end_date', ],'safe'],
            [['category_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'description', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'หัวข้อข่าว',
            'category_id' => 'หมวดข่าว',
            'description' => 'รายละเอียดข่าว',
            'start_date' => 'ตั้งแต่วันที่',
            'end_date' => 'ถึงวันที่',
            'photo' => 'รูปภาพ',
            'status' => 'สถานะ',
            'created_at' => 'สร้างเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
