<?php
/**
 * Set an avatar picture out of possible choices.
 * @author gizmore
 */
final class Avatar_Set extends GWF_MethodForm
{
	public function isUserRequired() { return true; }
	
	public function createForm(GWF_Form $form)
	{
		$form->addField(GDO_Avatar::make('avt_avatar_id')->currentUser());
		$form->addField(GDO_Submit::make());
		$form->addField(GDO_Button::make('btn_upload')->label('btn_upload')->href(href('Avatar', 'Upload')));
		$form->addField(GDO_AntiCSRF::make());
	}
	
	public function formValidated(GWF_Form $form)
	{
		GWF_UserAvatar::update(GWF_User::current(), $form->getVar('avt_avatar_id'));
		return $this->message('msg_avatar_set')->add($this->renderPage());
	}
}
