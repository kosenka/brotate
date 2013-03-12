<table width="100%" cellpadding="0" cellspacing="0">
<tr>
        <td>
                <?
                    Yii::import('zii.widgets.grid.CGridColumn');
                    class CBannerColumn extends CGridColumn
                    {
                        public function renderDataCellContent($row, $data) { echo Banners::model()->bannersResult($data); }
                    }
                    $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'bannersListGridID',
                    'dataProvider'=>$model->search(),
                    'template'=>"{pager}<br />{items}<br />{pager}<br />",
                    'pager'=>array(
                                   'class'=>'CLinkPager',
                        	   'header'=>'',
                        	   'firstPageLabel'=>'&lt;&lt;',
                        	   'prevPageLabel'=>'&lt;',
                        	   'nextPageLabel'=>'&gt;',
                        	   'lastPageLabel'=>'&gt;&gt;',
                                  ),
                    'filter'=>$model,
                    'columns'=>array(
                        array(
                            'name'=>'bnrDefault',
                            //'type'=>'raw',
                            'value'=>'$data->bnrDefault',
                            'htmlOptions' => array('style' => 'font-size:10px;width:100px;text-align:center;'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'bnrTag',
                            //'type'=>'raw',
                            'value'=>'$data->bnrTag',
                            'htmlOptions' => array('style' => 'font-size:10px;width:100px;'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'bnrTyp',
                            //'type'=>'raw',
                            'value'=>'$data->bnrTyp',
                            'filter'=>$model->BannersTyp,
                            'htmlOptions' => array('style' => 'font-size:10px;text-align:center;'),
                        ),
                        array(
                            'name'=>'bnrVisible',
                            //'type'=>'raw',
                            'value'=>'$data->bnrVisible',
                            'htmlOptions' => array('style' => 'font-size:10px;width:100px;text-align:center;'),
                            'filter'=>'',
                        ),
                        /*array(
                            'name'=>'bnrVisibleLimit',
                            //'type'=>'raw',
                            'value'=>'$data->bnrVisibleLimit',
                            'htmlOptions' => array('style' => 'font-size:10px;width:10px;text-align:center;'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'bnrVisibleDate',
                            //'type'=>'raw',
                            'value'=>'$data->bnrVisibleFrom . " - " . $data->bnrVisibleTo',
                            'htmlOptions' => array('style' => 'font-size:10px;width:10px;text-align:center;'),
                            'filter'=>'',
                        ),*/
                        array(
                            'class'=>'CBannerColumn',
                        ),
                        array(
                            'name'=>'bnrUrl',
                            'type'=>'raw',
                            'value'=>'(isset($data->bnrUrl) and !empty($data->bnrUrl))?CHtml::link($data->bnrUrl,$data->bnrUrl,array("target"=>"_blank")):""',
                            'htmlOptions' => array('style' => 'font-size:10px;'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'bnrClicks',
                            //'type'=>'raw',
                            'value'=>'$data->bnrClicks',
                            'htmlOptions' => array('style' => 'font-size:10px;text-align:center;'),
                            'filter'=>'',
                        ),
                        array(
                            'name'=>'bnrViewedTotal',
                            //'type'=>'raw',
                            'value'=>'$data->bnrViewedTotal+$data->bnrViewedCurrent',
                            'htmlOptions' => array('style' => 'font-size:10px;text-align:center;'),
                            'filter'=>'',
                        ),
                        array(
                            'class'=>'CButtonColumn',
                            'template'=>'{update} {delete}',
                            'buttons'=>array(
                                'update'=>array(
                                    'url'=>'array("admin/update","id"=>$data->id)',
                                ),
                                'delete'=>array(
                                    'url'=>'array("admin/delete","id"=>$data->id)',
                                ),
                            ),
                        ),

                    ),
                ));
                ?>
        </td>
</tr>
</table>
