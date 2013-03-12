<table width="740" cellspacing="2" cellspacing="0" border="1">
        <?=CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
        <?=CHtml::activeHiddenField($model,'id',array('value'=>$model->id)); ?>
        <tr class="odd">
                <td colspan="2">
                        <strong><?=CHtml::Label($update ? 'Редактируем баннер' : 'Добавляем баннер',''); ?></strong>
                </td>
        </tr>
        <?if(CHtml::errorSummary($model)):?>
        <tr style="padding: 5px 5px 5px 5px;">
                <td colspan="2"><?=CHtml::errorSummary($model); ?></td>
        </tr>
        <? endif; ?>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrDefault'); ?></td>
                <td><?=CHtml::activeCheckBox($model,'bnrDefault',array()); ?></td>
        </tr>
        <tr class="odd">
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
        <!--tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrWidth'); ?></td>
                <td><?=CHtml::activeTextField($model, 'bnrWidth',array('size'=>5)); ?></td>
        </tr>
        <tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrHeight'); ?></td>
                <td><?=CHtml::activeTextField($model, 'bnrHeight',array('size'=>5)); ?></td>
        </tr-->
        <tr class="even">
                <? if($model->bnrTyp==Banners::BANNERS_TYP_TEXT and !empty($model->bnrDescr)): ?>
                <td colspan=2><?=$model->bnrDescr; ?></td>
                <? elseif($model->bnrTyp==Banners::BANNERS_TYP_IMG and !empty($model->bnrFile)): ?>
                <td colspan=2><img width="<?=$model->bnrWidth; ?>" height="<?=$model->bnrHeight; ?>" src="<?=Yii::app()->controller->module->webFolder.$model->bnrFile; ?>"></td>
                <? elseif($model->bnrTyp==Banners::BANNERS_TYP_SWF and !empty($model->bnrFile)): ?>
                <td colspan=2><embed width="<?=$model->bnrWidth; ?>" height="<?=$model->bnrHeight; ?>" type="application/x-shockwave-flash" src="<?=Yii::app()->controller->module->webFolder.$model->bnrFile; ?>" pluginspage="http://www.adobe.com/go/getflashplayer" /></td>
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
        <!--tr class="odd">
                <td><?=CHtml::activeLabel($model,'bnrVisibleLimit'); ?> (0 - без ограничений)</td>
                <td><?=CHtml::activeTextField($model,'bnrVisibleLimit',array('size'=>70)); ?></td>
        </tr>
        <tr class="even">
                <td><?=CHtml::activeLabel($model,'dropViewed'); ?></td>
                <td><?=CHtml::activeCheckBox($model,'dropViewed'); ?></td>
        </tr>
        <tr class="odd">
                <td>Виден</td>
                <td colspan="2">
                        с
                        <? $this->widget('zii.widgets.jui.CJuiDatePicker',
                                     array(
                                           'name'=>'bnrVisibleFrom',
                                           'model'=>$model,
                                           'attribute'=>'bnrVisibleFrom',
                                           'options'=>array(
                                                            'dateFormat'=>'dd.mm.yy',
                                                            'changeMonth' => 'true',
                                                            'changeYear'=>'true',
                                                            'showButtonPanel' => 'true',
                                                            'showAnim'=>'fold'
                                                           ),
                                            //'htmlOptions'=>array('style'=>'height:130px;')
                                           )
                                    ); ?>
                        по
                        <? $this->widget('zii.widgets.jui.CJuiDatePicker',
                                     array(
                                           'name'=>'bnrVisibleTo',
                                           'model'=>$model,
                                           'attribute'=>'bnrVisibleTo',
                                           'options'=>array(
                                                            'dateFormat'=>'dd.mm.yy',
                                                            'changeMonth' => 'true',
                                                            'changeYear'=>'true',
                                                            'showButtonPanel' => 'true',
                                                            'showAnim'=>'fold'
                                                           ),
                                            //'htmlOptions'=>array('style'=>'height:130px;')
                                           )
                                    ); ?>
                </td>
        </tr-->

        <tr class="even">
                <td><?=CHtml::activeLabel($model,'bnrDescr'); ?></td>
                <td><?=CHtml::activeTextArea($model,'bnrDescr',array('rows'=>10,'cols'=>55)); ?></td>
        </tr>
        <tr class="odd">
                <td colspan=2>
                        <?=CHtml::submitButton('Сохранить'); ?>
                </td>
        </tr>
        <?=CHtml::endForm(); ?>
</table>
