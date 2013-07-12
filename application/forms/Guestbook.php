<?php

class Application_Form_Guestbook extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
		
		$this->addElement('text', 'email', array(
			'label' => 'Your email address:',
			'required' => true,
			'filters' => array('StringTrim'),
			'validators' => array(
				'EmailAddress'
			),
		));
		
		$this->addElement('textarea', 'comment', array(
			'label' => 'Please Comment:',
			'required' => true,
			'validators' => array(
				// array('validator' => 'StringLength', 'options' => array(0, 20)),
			),
		));
		
		$this->addElement('captcha', 'captcha', array(
			'label' => 'Please enter the 5 letters displayed below:',
			'required' => true,
			'captcha' => array(
				'captcha' => 'Figlet',
				'wordLen' => 5,
				'timeout' => 300
			),
		));
		
		$this->addElement('submit', 'submit', array(
			'ignore' => true,
			'label' => 'Sign Guestbook',
		));
		
		$this->addElement('hash', 'csrf', array(
			'ignore' => true,
		));
    }
}

