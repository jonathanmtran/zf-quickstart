<?php
class GuestbookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $guestbook = new Application_Model_GuestbookMapper();
		$this->view->entries = $guestbook->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
		$form = new Application_Form_Guestbook();
		
		if($this->getRequest()->isPost()) {
			if($form->isValid($request->getPost())) {
				$comment = new Application_Model_Guestbook($form->getValues());
				$mapper = new Application_Model_GuestbookMapper();
				$mapper->save($comment);
				return $this->_helper->redirector('index');
			}
		}
		
		$this->view->form = $form;
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
		
		if($this->getRequest()->isGet()) {
			$params = $request->getParams();
			
			if(isset($params['id']))		
				$form = new Zend_Form();
		}
		else if($request->isPost()) {
			$params = $request->getParams();
			
			if(!isset($params['id']))
				return $this->_helper->redirector('index');	
			
			if($params['delete'] == 1) {
				$mapper = new Application_Model_GuestbookMapper();
				$comment = new Application_Model_Guestbook();
				
				$mapper->find($params['id'], $comment);
				$mapper->delete($comment);
			}

			return $this->_helper->redirector('index');
		}
		
		$this->view->form = $form;
    }
}




