<?php

namespace app\commands;

use yii\console\Controller;
use Yii;
use app\models\MailQueue;
use app\models\MailTemplates;
use app\models\Students;
use yii\db\Exception;

class CronController extends Controller
{

    public function actionIndex() {
        echo "cron service running";
    }

    /**
     * send mail all students in queue
     * if mail sent in queue change status to 1 (sent)
     * if mail cannot sent in queue change status to 2 (error mail not sent)
     * if function print false function not found students who need send mail
     * @return void
     * @throws
     */
    public final function actionSendMails():void
    {
        /** @var MailQueue $item */
        $queue = MailQueue::find()->where(['status' => 0])->all();
        if(count($queue) > 0){
            foreach ($queue as $item){
                /** @var Students $student */
                $student = Students::find()->where(['id' => $item->student_id])->one();
                /** @var MailTemplates $template */
                $template = MailTemplates::find()->where(['id' => $item->template_id])->one();
                $mailSent = false;
                try{
                    $mailSent = Yii::$app->mailer->compose()
                        ->setFrom('myMail@domain.com')
                        ->setTo($student->email)
                        ->setSubject($template->theme)
                        ->setHtmlBody($template->body)
                        ->send();
                }catch (\Exception $e){
                    if(!$mailSent){
                        throw new Exception("Configure Your Mail");
                    }
                }
                if($mailSent){
                    $item->status = 1;
                }else{
                    $item->status = 2;
                }
                echo ($item->save())."\n";
            }
        }
        echo false."\n";
    }
}
