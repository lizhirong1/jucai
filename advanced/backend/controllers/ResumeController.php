<?php
namespace backend\controllers;
use Yii;
use backend\models\Members;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Resume;
use yii\data\Pagination;//分页
/**
 * Site controller
 */
class ResumeController extends Controller
{   
	public $enableCsrfValidation = false;//报400遇到这种情况，是因为YII2的防止csrf攻击,关闭csrf验证 
	//后台个人简历列表
	public function actionIndex(){
			$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('index', [
					'res' => $models,
					'pages'  => $pages
				]);
		// $arr="select * from resume";
  //       $res= Resume::findBySql($arr)->asArray()->all();
		// return $this->render('index',['res'=>$res]);

	}
	//后台个人待审核简历列表
	public function actionDoindex(){
				$id=isset($_GET['id'])?$_GET['id']:'';
		if($id){
			$connection = \Yii::$app->db;
            $command = $connection->createCommand('UPDATE resume SET is_audit=1 WHERE id='.$id);
            $integral=$command->execute();
         //    $arr="select * from resume";
        	// $res= Resume::findBySql($arr)->asArray()->all();

        		$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->where("is_audit=0")->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('doindex', [
					'res' => $models,
					'pages'  => $pages
				]);
        	// return $this->render('index',['res'=>$res]);
		}else{
			$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->where("is_audit=0")->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('doindex', [
					'res' => $models,
					'pages'  => $pages
				]);
		// $arr="select * from resume";
  //       $res= Resume::findBySql($arr)->asArray()->all();
		// return $this->render('index',['res'=>$res]);
	}
	}
	//个人简历详情列表
	public function actionResume(){
		$id=isset($_GET['id'])?$_GET['id']:'';
		$arr="select * from resume where id=$id";
        $res= Resume::findBySql($arr)->asArray()->all();
		return $this->render('resume',['res'=>$res]);
	}
	//后台高级人才列表
	public function actionTalent(){
		$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->where("talent=1")->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('talent', [
					'res' => $models,
					'pages'  => $pages
				]);
	}
	//后台待审核人才列表
	public function actionDotalent(){
						$id=isset($_GET['id'])?$_GET['id']:'';
			if($id){
			$connection = \Yii::$app->db;
            $command = $connection->createCommand('UPDATE resume SET talent=1 WHERE id='.$id);
            $integral=$command->execute();
         //    $arr="select * from resume";
        	// $res= Resume::findBySql($arr)->asArray()->all();

        		$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->where("talent=0")->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('dotalent', [
					'res' => $models,
					'pages'  => $pages
				]);
        	// return $this->render('index',['res'=>$res]);
		}else{
			$test=new Resume();	//实例化model模型
				$arr=$test->find();
				//$countQuery = clone $arr;
				$pages = new Pagination([
				//'totalCount' => $countQuery->count(),
				'totalCount' => $arr->where("talent=0")->count(),
				'pageSize'   => 1   //每页显示条数
					]);
				$models = $arr->offset($pages->offset)
					->limit($pages->limit)
					->all();
				return $this->render('dotalent', [
					'res' => $models,
					'pages'  => $pages
				]);
		// $arr="select * from resume";
  //       $res= Resume::findBySql($arr)->asArray()->all();
		// return $this->render('index',['res'=>$res]);
	}
	}
	//后台个人简历删除
	public function actionDel(){
		$id=$_GET['id'];
		$Resume = Resume::findOne($id);
		if($Resume->delete()){
			return "<script>alert('删除成功');location.href='?r=resume/index'</script>";
		}else{
			return "<script>alert('删除失败');location.href='?r=resume/index'</script>";
		}
	}
	//个人会员
	public function actionPerson(){
		$arr="select * from Members";
        $demo= Members::findBySql($arr)->asArray()->all();
		return $this->render('person',['list'=>$demo]);
	}
	//添加个人会员
	public function actionPersonadd(){
		if($_POST){
			$data=$_POST;
			if($data['password']!=$data['pwd']){
				return "<script>alert('密码不一致');location.href='?r=resume/personadd'</script>";
			}else{
				$data['addtime']=time();
				$test=new Members();
				$test->username=$data['username'];
				$test->password=$data['password'];
				$test->email=$data['email'];
				$test->addtime=$data['addtime'];
	        	$test->validate();   //调用rule函数验证数据
	        	if($test->hasErrors()){
	        	echo '数据不合法';
	        	die();
	        	}
	        	if($test->save()){
	        		return "<script>alert('添加成功');location.href='?r=resume/person'</script>";
	        	}
				}
			}else{
				return $this->render('add');
			}
	}
	//删除个人会员
	public function actionPersondel(){
		$id=$_GET['id'];
		$Members = Members::findOne($id);
		if($Members->delete()){
			return "<script>alert('删除成功');location.href='?r=resume/person'</script>";
		}else{
			return "<script>alert('删除失败');location.href='?r=resume/person'</script>";
		}
	}
	//修改
	public function actionResumesave(){
		$id=$_GET['id'];
		$arr="select * from resume where id=$id";
        $res= Resume::findBySql($arr)->asArray()->all();
        return $this->render('save',['res'=>$res]);
	}
	//保存修改
	public function actionA_update(){
		$id= Yii::$app->request->post('id');
		$fullname=Yii::$app->request->post('fullname');
		$nametype=Yii::$app->request->post('nametype');
		$sex=Yii::$app->request->post('sex');
		$education=Yii::$app->request->post('education');
		$experience=Yii::$app->request->post('experience');
		$height=Yii::$app->request->post('height');
		$email=Yii::$app->request->post('email');
		$birthday=Yii::$app->request->post('birthday');
		$residence=Yii::$app->request->post('residence');
		$m_id=Yii::$app->request->post('m_id');
		$marriage=Yii::$app->request->post('marriage');
		$householdaddress=Yii::$app->request->post('householdaddress');
		$current=Yii::$app->request->post('current');
		$nature=Yii::$app->request->post('nature');
		$t_id=Yii::$app->request->post('t_id');
		$i_id=Yii::$app->request->post('i_id');
		$d_id=Yii::$app->request->post('d_id');
		$wage=Yii::$app->request->post('wage');
		$sql="update resume set fullname='$fullname',
		nametype='$nametype',
		sex='$sex',
		education='$education',
		experience='$experience',
		height='$height',
		email='$email',
		birthday='$birthday',
		residence='$residence',
		m_id='$m_id',
		marriage='$marriage',
		householdaddress='$householdaddress',
		current='$current',
		nature='$nature',
		t_id='$t_id',
		i_id='$i_id',
		d_id='$d_id',
		wage='$wage' where id='$id'";
		$res=Yii::$app->db->createCommand($sql)->execute();
        if($res){
        	return "<script>alert('修改成功');location.href='?r=resume/resume&id=$id'</script>";
        }else{
        	return "<script>alert('修改失败');location.href='?r=resume/resume&id=$id'</script>";
        }
	}

}
