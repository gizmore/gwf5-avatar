<?php
final class Avatar_Upload extends GWF_MethodForm
{
	public function createForm(GWF_Form $form)
	{
		$form->addField(GDO_File::make('avatar_image')->minfiles(1)->imageFile()->action($this->href()));
		$form->addField(GDO_Submit::make()->label('btn_upload'));
		$form->addField(GDO_AntiCSRF::make());
		$form->addField(GDO_Button::make('btn_set_avatar')->href(href('Avatar', 'Set')));
	}
	
	public function formValidated(GWF_Form $form)
	{
		$avatar = GWF_Avatar::blank(['avatar_file_id'=>$form->getVar('avatar_image')])->insert();
		GWF_User::current()->tempUnset('gwf_avatar');
		return $this->message('msg_avatar_uploaded')->add(GWF_Website::redirectMessage(href('Avatar', 'Set')));
	}
}
