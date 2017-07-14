<?php $field instanceof GDO_Avatar; ?>
<gwf-avatar
 class="<?php echo $field->user->getGender(); ?> md-avatar">
  <img
   class="md-avatar"
   alt="<?php l('avatar_of', [$field->user->displayNameLabel()]); ?>"
   src="<?php echo href('Avatar', 'Image', '&ajax=1&file=' . $field->gdo->getVar('file_id')); ?>" />
</gwf-avatar>
