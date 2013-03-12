<tr class="<?=($index % 2)?'odd':'even' ?>">
	<td><?=CHtml::encode($data->id); ?></td>
	<td><?=(isset($data->bnrVisible) and $data->bnrVisible==1)?'Да':'Нет'; ?></td>
	<td><?=CHtml::encode($data->bnrTag); ?></td>
	<td>
                <?
                        switch($data->bnrTyp)
                        {
                                case 'img' : { $r='<img width="'.$data->bnrWidth.'" height="'.$data->bnrHeight.'" src="'.$this->module->webFolder.$data->bnrFile.'">'; break; }
                                case 'swf' : { $r='<embed width="'.$data->bnrWidth.'" height="'.$data->bnrHeight.'" type="application/x-shockwave-flash" src="'.$this->module->webFolder.$data->bnrFile.'" pluginspage="http://www.adobe.com/go/getflashplayer" />'; break; }
                                case 'text': {
                                               $r=str_replace("\r",'',$data->bnrDescr);
                                               $r=strtr($r,
                                                          array(
                                                                '{bnrClick}'=>CController::createUrl('/brotate/click',array('id'=>$data->id)),
                                                                '{bnrUrl}'=>$data->bnrUrl
                                                                )
                                                        );
                                               break;
                                             }
                        }
                        echo $r;
                ?>
        </td>
	<td><?=CHtml::encode($data->bnrTyp); ?></td>
	<td><?=CHtml::encode($data->bnrViewedCurrent); ?></td>
	<td><?=CHtml::encode($data->bnrViewedTotal); ?></td>
	<td><?=CHtml::encode($data->bnrClicks); ?></td>
	<td>
                <?=CHtml::link('Edit',array('admin/update','id'=>$data->id));?>
                &nbsp;|&nbsp;
                <?=CHtml::link('Delete',array('admin/delete','id'=>$data->id));?>
                &nbsp;|&nbsp;
                <?=CHtml::link('Copy',array('admin/copyBanner','id'=>$data->id));?>
        </td>
</tr>