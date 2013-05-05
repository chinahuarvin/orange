<?php

class SelftestAction extends CommonAction{

	public function index(){
 		$this->display();
	}

	public function paper(){
		$xzQues = 'xuanze';
		$tkQues = 'tiankong';
		$wdQues = 'wenda';
		$id = $_GET['id'];
		$xz = array('type'=>'一、选择题','question'=>$xzQues);
		$tk = array('type'=>'二、填空题','question'=>$tkQues);
		$wd = array('type'=>'三、问答题','question'=>$wdQues);
		$arr = array('xz'=>$xz,'tk'=>$tk,'wd'=>$wd);

		$this->assign('id',$id);
		$this->assign('arr',$arr);
 		$this->display();
	}
}
?>
