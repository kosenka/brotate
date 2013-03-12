<table width="100%" cellpadding="0" cellspacing="1" class="contentList1">
        <tr class="odd">
                <td>
                        <?=CHtml::link('Добавить',array('admin/update'));?>
                        <!--&nbsp;|&nbsp;<?//=CHtml::link('Статистика',array('admin/stat'));?> -->
                </td>
        </tr>
        <tr class="even">
                <td>
                        <? $this->renderPartial('_bannersListGrid',array('model'=>$model)); ?>
                </td>
        </tr>
</table>

