<?php /* Smarty version 2.6.18, created on 2013-07-30 11:52:16
         compiled from home/home.html */ ?>
<script src="includes/js/highcharts/highcharts.js"></script>
<script src="includes/js/highcharts/modules/exporting.js"></script>

<script type="text/javascript">
    var datauser = [<?php $_from = $this->_tpl_vars['count_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['foo']):
?><?php echo $this->_tpl_vars['foo']; ?>
, <?php endforeach; endif; unset($_from); ?>];
    <?php echo '
    $(function () {
        $(\'#char\').highcharts({
            chart: {
                zoomType: \'xy\'
            },
            title: {
                text: \'\'
            },
            
            xAxis: [{
                    categories: [\'Jan\', \'Feb\', \'Mar\', \'Apr\', \'May\', \'Jun\',
                        \'Jul\', \'Aug\', \'Sep\', \'Oct\', \'Nov\', \'Dec\']
                }],
            yAxis: [{ // Primary yAxis
                    labels: {
                        format: \'{value}$\',
                        style: {
                            color: \'#89A54E\'
                        }
                    },
                    title: {
                        text: \'balance\',
                        style: {
                            color: \'#89A54E\'
                        }
                    }
                }, { // Secondary yAxis
                    title: {
                        text: \'Users\',
                        style: {
                            color: \'#4572A7\'
                        }
                    },
                    labels: {
                        format: \'{value}\',
                        style: {
                            color: \'#4572A7\'
                        }
                    },
                    opposite: true
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: \'vertical\',
                align: \'left\',
                x: 120,
                verticalAlign: \'top\',
                y: 100,
                floating: true,
                backgroundColor: \'#FFFFFF\'
            },
            series: [{
                    name: \'Uers\',
                    color: \'#4572A7\',
                    type: \'column\',
                    yAxis: 1,
                    data: datauser,
                    tooltip: {
                        valueSuffix: \'\'
                    }
    
                }]
//            , {
//                    name: \'Balance\',
//                    color: \'#89A54E\',
//                    type: \'spline\',
//                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
//                    tooltip: {
//                        valueSuffix: \'$\'
//                    }
//                }]
        });
    });
    '; ?>


</script>

<div class="page-title" style="z-index: 780;">
    <div class="in" style="z-index: 770;">
        <div class="titlebar" style="z-index: 760;">	
            <h2>Dashboard</h2>	
        </div>
    </div>
</div>

<div class="content" style="z-index: 730;">
    <!-- START CHART -->
    <div class="simplebox grid740">

        <div class="titleh">
            <h3>Chart</h3>
        </div>

        <div class="body" id="char">
        </div>

    </div>
    <!-- END CHART -->
</div>