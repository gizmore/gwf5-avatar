<?php
/**
 * An avatar image file.
 * @author gizmore
 */
class GWF_Avatar extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDO_AutoInc::make('avatar_id'),
			GDO_File::make('avatar_file_id')->notNull(),
			GDO_CreatedBy::make('avatar_created_by')->notNull(),
			GDO_Bool::make('avatar_public')->initial('0'),
		);
	}
	
	public function getID() { return $this->getVar('avatar_id'); }
	
	public static function default()
	{
		return self::table()->blank(['avatar_id'=>'0']);
	}
	
	/**
	 * @param GWF_User $user
	 * @return GWF_Avatar
	 */
	public static function forUser(GWF_User $user)
	{
		if (!($avatar = $user->get('gwf_avatar')))
		{
			$avatarTable = self::table();
			
			$query = GWF_UserAvatar::table()->select();
			$query->joinObject('avt_avatar_id')->select('gwf_file.*');
			$query->join('JOIN gwf_file ON file_id = avatar_file_id');
			$query->where('avt_user_id='.$user->getID())->first();
			if (!($avatar = $query->exec()->fetchAs($avatarTable)))
			{
				$avatar = self::default();
			}
			$user->set('gwf_avatar', $avatar);
		}
		return $avatar;
	}
	
	public function getGDOAvatar(GWF_User $user)
	{
		static $gdoType;
		if (!$gdoType) $gdoType = GDO_Avatar::make();
		return $gdoType->user($user)->gdo($this);
	}
}
