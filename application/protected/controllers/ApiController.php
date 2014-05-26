<?php

class ApiController extends Controller
{
    /**
     * After validateApiToken filter is run, $_user will store the
     * authenticated user based on api_token
     * @var User
     */
    private $_user;

    /**
     * Define filters that should be run before processing requests, primarily for auth
     * @return array
     */
    public function filters()
    {
        return array(
            'validateApiToken',
        );
    }


    /**
     * Function accepts the api_token parameter and validates it. If valid it loads the user into $this->_user.
     * @param $filterChain
     */
    public function filterValidateApiToken($filterChain)
    {
        /**
         * Validate API token before continuing
         */
        $api_token = Yii::app()->request->getParam('api_token',false);
        if($api_token){
            $user = User::model()->findByAttributes(array('api_token' => $api_token));
        } else {
            if(!Yii::app()->user->isGuest){
                $user = Yii::app()->user->user;
            } else {
                $user = false;
            }
        }
        if(!$user){
            $e = new \Exception('Invalid API Token',403);
            $this->returnError($e,403);
        } else {
            $this->_user = $user;
            $filterChain->run();
        }
    }

    public function actionServiceAccount($id=false)
    {
        /**
         * If ID is provided, ensure this user owns it
         */
        if($id){
            $message = Message::model()->findByAttributes(array('id' => $id,'user_id' => $this->_user->id));
            if(!$message){
                $this->returnError(new Exception('Message with ID '.$id.' not found.',404),404);
            }
        }

    }

    public function actionMessage($id=false)
    {
        /**
         * if $id, validate that $this->_user owns it
         *
         * get request method
         *
         * call other function for getMessage or updateMessage, etc.
         *
         * return response or catch error and return error
        */
    }

}