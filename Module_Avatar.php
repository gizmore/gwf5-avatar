<?php
final class Module_Avatar extends GWF_Module
{
	##############
	### Module ###
	##############
	public function onLoadLanguage() { return $this->loadLanguage('lang/avatar'); }
	public function getClasses() { return ['GDO_Avatar','GWF_Avatar','GWF_UserAvatar']; }
	
	##############
	### Navbar ###
	##############
	public function onRenderFor(GWF_Navbar $navbar)
	{
		$user = GWF_User::current();
		if ( ($navbar->isRight()) && (!$user->isGhost()) )
		{
// 			$this->initModule();
			$icon = GDO_Avatar::make('avatar')->user($user)->gdo(GWF_Avatar::forUser($user))->renderCell()->getHTML();
			$navbar->addField(GDO_Link::make('btn_avatar')->rawIcon($icon)->href($this->getMethodHREF('Set')));
		}
	}
}
