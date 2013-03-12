<table width="100%" cellpadding="0" cellspacing="1" class="contentList">
        <tr class="odd">
                <td><?=CHtml::link('Добавить',array('admin/update'));?></td>
        </tr>
        <tr class="even">
                <td>
                        <table cellpadding="0" cellspacing="1" border="0" class="contentList">
                                <tr class="odd">
                                        <td>ID</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>&nbsp;</td>
                                </tr>
                       <? $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$model->search(),
                            'itemView'=>'_bannersListView', // представление для одной записи
                            'ajaxUpdate'=>false, // отключаем ajax поведение
                            //'emptyText'=>'В данной категории нет товаров.',
                            'summaryText'=>"{start}&mdash;{end} из {count}",
                            'template'=>'{summary} {sorter} {items} <hr> {pager} <br>',
                            'sorterHeader'=>'Сортировать по:',
                            // ключи, которые были описаны $sort->attributes
                            // если не описывать $sort->attributes, можно использовать атрибуты модели
                            // настройки CSort перекрывают настройки sortableAttributes
                            'sortableAttributes'=>array('bnrViewedCurrent'),
                            'pager'=>array(
                                'class'=>'CLinkPager',
                                //'header'=>false,
                                //'cssFile'=>'/css/pager.css', // устанавливаем свой .css файл
                                //'htmlOptions'=>array('class'=>'pager'),
                            ),
                        )); ?>

                        </table>
                </td>
        </tr>
</table>
