<?php
final class Avatar_Image extends GWF_Method
{
	public function execute()
	{
		if (Common::getRequestInt('file') == 0)
		{
			header('Content-Type: image/jpeg');
			die(Module_Avatar::instance()->templateFile('img/default.jpeg'));
		}
		return Module_GWF::instance()->getMethod('GetFile')->execute();
	}
}
