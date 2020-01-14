<div>
      <h1 style='text-align:center; font-weight:bold;'><?php echo $oDB->lang('ReportTitle') ?></h1>
      <h3 style='text-align:center;'><?php echo $oDB->lang('LastUpdateTime') ?> : <?php echo date('d-m-Y H:i:s') ?></h3>
    </div>
  <div>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
      <tr style="background-color:#C6CAC9;">
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Stt') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Products') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Line') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Plan') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Total') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Rate') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Type') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times1') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times2') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times3') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times4') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times5') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Remark') ?></td>
      </tr>

      <tr style="background-color:#C6CAC9;">
        <?php
          for ($i=1; $i < 7 ; $i++) { 
            echo "<td>".$oDB->lang('Ok')."</td>";
            echo "<td>".$oDB->lang('Ng')."</td>";
          }
        ?>
      </tr>

      <?php
      $today = date("Y-m-d");
$sql = "select line.LineId,line.LineName,products.ProductsID,products.ProductsName 
from line inner join `products` on line.ProductsId = products.ProductsId";
$list = $oDB -> fetchAll($sql);

foreach ($list as $key => $value) {
  ?>
      <tr>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $key+1 ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $value['ProductsName'] ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $value['LineName'] ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($oDB->getplan($value['LineId'])) ?></td>
        <?php
          $ok = $oDB->getlineqty("OK",$value['LineId']);
          $ng = $oDB->getlineqty("NG",$value['LineId'])
        
        ?>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($ok) ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($ng) ?></td>
        <?php
        $total = $ok + $ng;
        $total = $oDB->getplan($value['LineId']);
        $rate = ($total!=0) ? round($ok/$total,3)*100 ." %" : "-" ;
        echo "<td rowspan='2' style='vertical-align: middle; padding:1px;'>".$rate."</td>";
        echo "<td>".$oDB->lang('Target')."</td>";
         for ($i=1; $i < 6 ; $i++) { 
           $target = $oDB->getarget($value['LineId'],$i);
          echo "<td colspan='2'>".viewprice($target)."</td>";
        }
        ?>

        <td rowspan="2"><?php echo $oDB->getremark($value['LineId']) ?></td>
      </tr>

      <tr>

        <?php
         echo "<td>".$oDB->lang('Actual')."</td>";
         for ($i=1; $i < 6 ; $i++) { 
           $qtyok = $oDB->getqty('OK',$value['LineId'],$i);
           $ratetime = ($qtyok=='') ? '' : $qtyok/$target ;
            if ($ratetime>=1) {
              $color = 'green';
            } elseif($ratetime>=0.95&&$ratetime<1) {
              $color = 'yellow';
            } elseif($ratetime=='') {
              $color = '#b3ffe6';
            } else {
              $color = 'red';
            }

          echo "<td style='background-color:".$color.";'>".viewprice($qtyok)."</td>";
          echo "<td style='background-color:".$oDB->lang('color2','#b3ffe6').";color:red;'>".viewprice($oDB->getqty('NG',$value['LineId'],$i))."</td>";
        }
        ?>

      </tr>
  <?php
}
?>
      
    </table>
    </div>