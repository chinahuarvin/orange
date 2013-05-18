<?php

class SelftestAction extends CommonAction{

	public function index(){
		$testCategory = M('TestCategory');
 		$this->display();
	}

	public function paper(){
		$xzQues = array();
		$tkQues = array();
		$wdQues = array();
		$arr = array('code'=>'200');
		$testPaper = D('testPaper');//试卷类
		$id = $_REQUEST['id'];
		$paperCondition['cid'] = $id;
		$paper = $testPaper->where($paperCondition)->find();
		if($paper){
			$testStory = D('TestStory');//题目类
			$storyCondition['paper_id'] = $paper['id'];
			$storys = $testStory->where($storyCondition)->select();
			if($storys){
				
			}else{
				$arr['code'] = '301';
				$arr['msg'] = '这张试卷没有题目啊，换张试卷吧!';
				$this->assign('arr',$arr);
				$this->display();
			}
		}else{
			$arr['code'] = '301';
			$arr['msg'] = '找不到这张试卷了，联系下管理员!';
			$this->assign('arr',$arr);
			$this->display();
		}
		$xzQues[] = array('num'=>'1','title'=>'1+1=?','options'=>array(array('A','2'),array('B','3'),array('C','4'),array('D','5')));
		$xzQues[] = array('num'=>'2','title'=>'2+1=?','options'=>array(array('A','2'),array('B','3'),array('C','4'),array('D','5')));
		$xzQues[] = array('num'=>'3','title'=>'3+1=?','options'=>array(array('A','2'),array('B','3'),array('C','4'),array('D','5')));
		$xzQues[] = array('num'=>'4','title'=>'4+1=?','options'=>array(array('A','2'),array('B','3'),array('C','4'),array('D','5')));
		$xz = array('type'=>1,'typeStr'=>'一、选择题','question'=>$xzQues);
		$arr = array('xz'=>$xz,'tk'=>$tk,'wd'=>$wd);

		$this->assign('id',$id);
		$this->assign('arr',$arr);
 		$this->display();
	}
}
?>
