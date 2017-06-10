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
		if ( ($navbar->isRight()) && (!GWF_Session::user()->isGhost()) )
		{
			$navbar->addField(GDO_Button::make('avatar')->label('btn_avatar')->href($this->getMethodHREF('Set')));
		}
	}
}
