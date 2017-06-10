<?php $field instanceof GDO_Avatar; ?>
<md-input-container class="md-block md-float md-icon-left" flex>
  <label><?php echo $field->displayLabel(); ?></label>
  <md-select
   ng-controller="GWFSelectCtrl"
   ng-model="data.selection"
   ng-init="init('#gwfsel_<?php echo $field->name; ?>', '<?php echo $field->displayFormValue(); ?>')"
   ng-change="valueSelected()">
    <md-option value="0"><?php l('no_avatar'); ?></md-option>
    <?php foreach ($field->choices as $value => $gwfAvatar) : $gwfAvatar instanceof GWF_Avatar; ?>
    <md-option value="<?php echo $value; ?>">
      <?php echo $gwfAvatar->getGDOAvatar($field->user)->renderCell(); ?>
      <?php echo $gwfAvatar->getVar('file_name'); ?>
    </md-option>
    <?php endforeach; ?>
  </md-select>
  <input
   class="n"
   type="hidden"
   id="gwfsel_<?php echo $field->name; ?>"
   value="<?php echo $field->displayFormValue(); ?>"
   name="form[<?php echo $field->name?>]" />
  <div class="gwf-error"><?php echo $field->displayError(); ?></div>
</md-input-container>
