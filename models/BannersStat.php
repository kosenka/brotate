<?php

class BannersStat extends CActiveRecord
{
        /**
        * Returns the static model of the specified AR class.
        * @return CActiveRecord the static model class
        */
        public static function model($className=__CLASS__)
        {
                return parent::model($className);
        }

        /**
        * @return string the associated database table name
        */
        public function tableName()
        {
                return 'brotate_stat';
        }

        /**
        * @return array validation rules for model attributes.
        */
        public function rules()
        {
                return array(
                );
        }

        /**
        * @return array relational rules.
        */
        public function relations()
        {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
        }

        /**
        * @return array customized attribute labels (name=>label)
        */
        public function attributeLabels()
        {
                return array(
                );

        }

        public function updateStat($id=null)
        {
                $showRef=serialize(
                                   array(
                                         'HTTP_REFERER'    => $_SERVER['HTTP_REFERER'],
                                         'REMOTE_ADDR'     => $_SERVER['REMOTE_ADDR'],
                                         'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
                                        )
                                  );
                $this->dbConnection->createCommand("insert into ".self::tableName()."(bannerId,showTime,showRef)values(:bannerId,:showTime,:showRef)")->execute(array(':bannerId'=>(int)$id,':showTime'=>time(),':showRef'=>$showRef ));
        }


}
