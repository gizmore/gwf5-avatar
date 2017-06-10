<?php $field instanceof GDO_Avatar; ?>
<gwf-avatar
 gwf-gender="<?php $field->user->getGender(); ?>">
  <img
   alt="<?php l('avatar_of', [$field->user->displayName()]); ?>"
   src="<?php echo href('Avatar', 'Image', '&ajax=1&file=' . $field->gdo->getVar('file_id')); ?>" />
</gwf-avatar>
