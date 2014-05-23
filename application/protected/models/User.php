<?php

class User extends UserBase
{
    
    public function rules() {
        $rules = parent::rules();
        $newRules = array_merge($rules, array(
            array('id,api_token','default',
                 'value' => Utils::getRandStr(),
                 'setOnEmpty' => true, 'on' => 'insert'),
            array('created', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert')
        ));
        
        return $newRules;
    }
    
    public static function findOrCreate($email)
    {
        $user = User::model()->findByAttributes(array('email' => $email));
        if($user){
            return $user;
        } else {
            $user = new User();
            $user->email = $email;
            if($user->save()){
                return $user;
            } else {
                throw new Exception('Unable to create new user: '.print_r($user->getErrors(),true));
            }
        }
    }
    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserBase the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}