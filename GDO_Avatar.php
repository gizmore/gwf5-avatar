<?php
final class GDO_Avatar extends GDO_Select
{
	/**
	 * @var GWF_User
	 */
	public $user;
	public function currentUser()
	{
		return $this->user(GWF_User::current());
	}
	public function user(GWF_User $user)
	{
		$this->user = $user;
		$this->value = GWF_Avatar::forUser($user)->getID();
		$this->emptyChoice = t('choice_no_avatar_please');
		$this->label('avatar');
		return $this->choices($this->avatarChoices());
	}
	
	public function getGDOValue()
	{
		return GWF_Avatar::getById($this->getValue());
	}
	
	public function avatarChoices()
	{
		$query = GWF_Avatar::table()->select();
		$result = $query->joinObject('avatar_file_id')->select('gwf_file.*')->where("avatar_public OR avatar_created_by={$this->user->getID()}")->exec();
		$choices = array();
		while ($gwfAvatar = $result->fetchObject())
		{
			$choices[$gwfAvatar->getID()] = $gwfAvatar;
		}
		return $choices;
	}
	
	public function render()
	{
		return Module_Avatar::instance()->templatePHP('form/avatar.php', ['field'=>$this]);
	}
	
	public function renderCell()
	{
		return Module_Avatar::instance()->templatePHP('cell/avatar.php', ['field'=>$this]);
	}
}
