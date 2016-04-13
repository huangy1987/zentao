<?php
/**
 * The report view file of task module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      wenjie<wenjie@cnezsoft.com>
 * @package     project
 * @version     $Id: report.html.php 1594 2011-04-10 11:00:00Z wj $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/chart.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['task']);?></span>
    <strong><small class='text-muted'><?php echo html::icon($lang->icons['report']);?></small> <?php echo $lang->task->report->common;?></strong>
    <div class='actions' style="margin-top:35px">
      <?php echo html::a($this->createLink('sprint', 'task', "projectID=$projectID"), $lang->goback, '', "class='btn'");?>
    </div>
  </div>  
</div>
<div class='row_report'>
  <div class='col-md-3 col-lg-12'>
    <div class='panel panel-sm'>
      <div class='panel-heading'>
        <strong><?php echo $lang->task->report->select;?></strong>
      </div>
      <div class='panel-body' style='padding-top:0'>
        <form method='post'>
          <!-- <?php echo html::checkBox('charts', $lang->task->report->charts, $checkedCharts, '', 'block')?> -->
          <?php echo html::checkBox('charts', $lang->task->report->charts, $checkedCharts, '', '');?>
          <div class='btn-group'>
            <?php echo html::selectButton('', 'btn-sm'); ?>
            <?php echo html::submitButton($lang->task->report->create, "", 'btn-sm btn-primary');?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class='col-md-9 col-lg-12'>
    <div class='panel panel-sm'>
      <div class='panel-heading'>
        <strong><?php echo $lang->task->report->common;?></strong>
      </div>
      <table class='table active-disabled'>
        <?php foreach($charts as $chartType => $chartOption):?>
        <tr class='text-top'>
          <td>
            <div class='chart-wrapper text-center'>
              <h5><?php echo $lang->task->report->charts[$chartType];?></h5>
              <div class='chart-canvas'><canvas id='chart-<?php echo $chartType ?>' width='<?php echo $chartOption->width;?>' height='<?php echo $chartOption->height;?>' data-responsive='true'></canvas></div>
            </div>
          </td>
          <td style='width: 320px'>
            <div style="overflow:auto;" class='table-wrapper'>
              <table class='table table-condensed table-hover table-striped table-bordered table-chart' data-chart='<?php echo $chartOption->type; ?>' data-target='#chart-<?php echo $chartType ?>' data-animation='false'>
                <caption class='text-left'><?php echo $lang->task->report->charts[$chartType];?></caption>
                <thead>
                  <tr>
                    <th class='w-20px'></th>
                    <th class='chart-label'><?php echo $lang->task->report->$chartType->item;?></th>
                    <th><?php echo $lang->task->report->value;?></th>
                    <th><?php echo $lang->report->percent;?></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($datas[$chartType] as $key => $data):?>
                <tr class='text-center'>
                  <td class='chart-color'><i class='chart-color-dot icon-circle'></i></td>
                  <td class='chart-label'><?php echo $data->name;?></td>
                  <td class='chart-value'><?php echo $data->value;?></td>
                  <td><?php echo ($data->percent * 100) . '%';?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>