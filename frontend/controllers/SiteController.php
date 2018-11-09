<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use dektrium\user\models\User;
use frontend\models\Tblpersonalinfo;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('dev-index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
     
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionConfirmregister(){
         $this->layout = false;

         $request = Yii::$app->request;
        if ($request->isGet &&  $request->get('user')!=NULL)  {
            $user = $request->get('user', null);
            $model = User::find()
            ->where('id = :user', [':user' => $user])
            ->one();
            $confirmed_at=$model['created_at'];

            $modelTblpersonalinfo=Tblpersonalinfo::find()
            ->where('CID = :CID', [':CID' => $model['CID']])->one();

       

        return $this->render('confirmregister',[
            'test'=>$model,
            'model'=>$model,
            'confirmed_at'=>$confirmed_at,
            'modelTblpersonalinfo'=>$modelTblpersonalinfo,
            ]);
        }else{                       
            $request = Yii::$app->request;
            if ($request->isPost){
                $personal=$request->post('Tblpersonalinfo',NULL);
                $user=$request->post('User',NULL);
                // var_dump($personal);
                // var_dump($user);
                #var_dump($request->post());
                if($user['CID']==$request->post('confCID')){   
                var_dump($request->post());             
                // Yii::$app->db->createCommand()
                //  ->update('tblpersonalinfo', 
                //     [
                //       #'PName' => $personal['PName'],
                //       'FName' => $personal['FName'],
                //       'LName' => $personal['LName'],
                //       'TelNo1' => $personal['TelNo1'],
                //       #'TelNo2' => $personal['TelNo2'],
                //       'eMail1' => $personal['eMail1'],
                //       #'eMail2' => $personal['eMail2'],
                //     ], 
                //     ['CID' => $user['CID']])
                //  ->execute();
                //  Yii::$app->db->createCommand()
                //  ->update('user', 
                //     [
                //       'confirmed_at' => $user['confirmed_at'],
                //       'username' => $user['username'],
                //       'password_hash' => \Yii::$app->security->generatePasswordHash($user['password_hash']),
                //     ], 
                //     ['CID' => $user['CID']])
                //  ->execute();
                }else{  // else if chk confirm CID
                    return $this->redirect(['confirmregister', 'user' => $user['id']]);
                }// if chk confirm CID
            }
            
           #return $this->redirect(['confirmprofile', 'user' => $user]);
          # return $this->goHome();
        }//end if isGet

       
       # return $this->render('confirmregister');
    }
    public function actionTmpchart(){
           $data = (new \yii\db\Query())
              ->select('*')
              ->from('test_chart')
             # ->where('hospcode = :hospcode', [':hospcode' => $users[$i]['hospcode']] )        
              ->all(\Yii::$app->db);
        $this->layout = false;
       // for($i = 0; $i < sizeof($data);$i++)
       //  {
       //      $result[]=['txtname'=>$data[$i]['txtname'],'y'=>$data[$i]['y']];
       //  }
        return $this->render('tmpchart',['data'=>$data]);
    }

}
