<?php
namespace backend\controllers;

use Yii;
use backend\models\User2;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class NobugController extends Controller
{   //后台页面
   public function actionIndex(){
    return $this->render('index.html');
   }
   //登录
   public function actionLogin(){
        $request = YII::$app->request->post();//请求组件 全局的YII前面加\
        // print_r($request);die;
    if($request){
        $username=$request['UserName'];
        // print_r($username);
                $arr="select * from user2 where username= "."'$username'";
                 $demo= User2::findBySql($arr)->asArray()->one();
            if($demo){
                $password=$request['password'];
                if($password==$demo['password']){
                $session=Yii::$app->session;
                $session->open();
                $session->set('username',$demo['UserName']);
                     return "<script>alert('登陆成功');location.href='?r=nobug/index'</script>";
                }else{
                    return "<script>alert('登陆失败,密码错误');history.go(-1)</script>";
                }
            }else{
                if(empty($arr1)){
                    return "<script>alert('登陆失败,用户名不存在');history.go(-1)</script>";
                }
            }
    }else{

    return $this->render('login.html');
    }

   }
   //退出登录
   public function actionLoginout(){
        Yii::$app->user->logout();
        return $this->render('login.html');
   }

}
