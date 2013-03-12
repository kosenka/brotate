<table width="740" cellpadding="0" cellspacing="1" class="contentList">
        <?=CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
        <?=CHtml::activeHiddenField($model,'id',array('value'=>$model->id)); ?>
        <tr>
                <td colspan=2>
                        <b><?=CHtml::Label($update ? 'Редактируем баннер' : 'Добавляем баннер',''); ?></b>
                </td>
        </tr>
        <?if(CHtml::errorSummary($model)):?>
        <tr class="odd">
                <td colspan=2><?=CHtml::errorSummary($model); ?></td>
        </tr>
        <? endif; ?>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrTag'); ?></td>
                <td><?=CHtml::activeTextField($model,'bnrTag',array('size'=>70)); ?></td>
        </tr>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrTyp'); ?></td>
                <td><?=CHtml::activeDropDownList($model,'bnrTyp',Banners::model()->bannersTyp); ?></td>
        </tr>
        <tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrFile'); ?></td>
                <td><?=CHtml::activeFileField($model, 'bnrFile'); ?></td>
        </tr>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrWidth'); ?></td>
                <td><?=CHtml::activeTextField($model, 'bnrWidth',array('size'=>5)); ?></td>
        </tr>
        <tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrHeight'); ?></td>
                <td><?=CHtml::activeTextField($model, 'bnrHeight',array('size'=>5)); ?></td>
        </tr>
        <tr class="even">
                <? if($model->bnrTyp==Banners::BANNERS_TYP_TEXT and !empty($model->bnrDescr)): ?>
                <td colspan=2><?=$model->bnrDescr; ?></td>
                <? elseif($model->bnrTyp==Banners::BANNERS_TYP_IMG and !empty($model->bnrFile)): ?>
                <td colspan=2><img width="<?=$model->bnrWidth; ?>" height="<?=$model->bnrHeight; ?>" src="<?=$model->webFolder.$model->bnrFile; ?>"></td>
                <? elseif($model->bnrTyp==Banners::BANNERS_TYP_SWF and !empty($model->bnrFile)): ?>
                <td colspan=2><embed width="<?=$model->bnrWidth; ?>" height="<?=$model->bnrHeight; ?>" type="application/x-shockwave-flash" src="<?=$model->webFolder.$model->bnrFile; ?>" pluginspage="http://www.adobe.com/go/getflashplayer" /></td>
                <? endif; ?>
        </tr>
        <tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrUrl'); ?></td>
                <td><?=CHtml::activeTextField($model,'bnrUrl',array('size'=>70)); ?></td>
        </tr>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrVisible'); ?></td>
                <td><?=CHtml::activeCheckBox($model,'bnrVisible'); ?></td>
        </tr>
        <tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrDescr'); ?></td>
                <td><?=CHtml::activeTextArea($model,'bnrDescr',array('rows'=>10,'cols'=>55)); ?></td>
        </tr>
        <tr class="even">
                <td colspan=2>
                        <?=CHtml::submitButton('Сохранить'); ?>
                </td>
        </tr>
        <?=CHtml::endForm(); ?>
</table>
