<?php

namespace console\controllers;

use yii\console\Controller;
use common\models\Task;

class WorkerController extends Controller
{       
	public $id;
	public $cnt;
	
    public function actionIndex($id, $cnt = 1)
    {
		for ($i = 1; $i <= $cnt; $i++) {
			echo "Worker start for task ID=$id\n";
			$task = Task::findOne($id);
			if (is_null($task)) {
				echo 'Not found';
				return 404;
			}
			echo 'Task is: ' . $task->cmd . "\n";
			ob_start();
			eval($task->cmd);
			$output = ob_get_clean();
			//exec('/usr/local/bin/php -r "' . stripslashes($task->cmd) . '"', $output);
			file_put_contents(
				"/app/console/runtime/logs/workers$id-$i.log", 
				$output . "\n",
				FILE_APPEND
				);
			$task = Task::findOne($id);
			$task->done++;
			$task->save();
			echo "Worker end\n";
		}
    }
}