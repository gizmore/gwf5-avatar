<?php
final class GWF_UserAvatar extends GDO
{
	public function gdoCached() { return false; }
	
	public function gdoColumns()
	{
		return array(
			GDO_User::make('avt_user_id')->primary(),
			GDO_Object::make('avt_avatar_id')->klass('GWF_Avatar')->notNull(),
			GDO_EditedAt::make('avt_edited_at'),
		);
	}
	
	public static function updateAvatar(GWF_User $user, $avatarId)
	{
		$user->tempUnset('gwf_avatar');
		if ($avatarId > 0)
		{
			GWF_UserAvatar::blank(['avt_user_id'=>$user->getID(), 'avt_avatar_id'=>$avatarId])->replace();
		}
		else
		{
			GWF_UserAvatar::table()->deleteWhere('avt_user_id='.$user->getID())->exec();
		}
		$user->recache();
	}
}
