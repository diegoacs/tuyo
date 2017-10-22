<?php

function paginate($recharge_table, $page, $tpages, $adjacents) {
  $prevlabel = "&lsaquo; Anterior";
  $nextlabel = "Siguiente &rsaquo;";
  $out = '<ul id="bscPa" class="pagination pagination-large">';

  // previous label

  if($page==1) {
    $out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
  } else if($page==2) {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='1'>$prevlabel</a></span></li>";
  }else {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='".($page-1)."'>$prevlabel</a></span></li>";

  }

  // first label
  if($page>($adjacents+1)) {
    $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='1'>1</a></li>";
  }
  // interval
  if($page>($adjacents+2)) {
    $out.= "<li><a>...</a></li>";
  }

  // pages

  $pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
  $pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
  for($i=$pmin; $i<=$pmax; $i++) {
    if($i==$page) {
      $out.= "<li class='active'><a>$i</a></li>";
    }else if($i==1) {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='1'>$i</a></li>";
    }else {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$i'>$i</a></li>";
    }
  }

  // interval

  if($page<($tpages-$adjacents-1)) {
    $out.= "<li><a>...</a></li>";
  }

  // last

  if($page<($tpages-$adjacents)) {
    $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$tpages'>$tpages</a></li>";
  }

  // next

  if($page<$tpages) {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='".($page+1)."'>$nextlabel</a></span></li>";
  }else {
    $out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
  }

  $out.= "</ul>";
  return $out;
}

function paginate_class($recharge_table, $page, $tpages, $adjacents,$class) {
  $prevlabel = "&lsaquo; Anterior";
  $nextlabel = "Siguiente &rsaquo;";
  $out = '<ul id="bscPa" class="pagination pagination-large">';

  // previous label

  if($page==1) {
    $out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
  } else if($page==2) {
    $out.= "<li><span><a class='".$class."' href='javascript:void(0);' data-value='1'>$prevlabel</a></span></li>";
  }else {
    $out.= "<li><span><a class='".$class."' href='javascript:void(0);' data-value='".($page-1)."'>$prevlabel</a></span></li>";

  }

  // first label
  if($page>($adjacents+1)) {
    $out.= "<li><a class='".$class."' href='javascript:void(0);' data-value='1'>1</a></li>";
  }
  // interval
  if($page>($adjacents+2)) {
    $out.= "<li><a>...</a></li>";
  }

  // pages

  $pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
  $pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
  for($i=$pmin; $i<=$pmax; $i++) {
    if($i==$page) {
      $out.= "<li class='active'><a>$i</a></li>";
    }else if($i==1) {
      $out.= "<li><a class='".$class."' href='javascript:void(0);' data-value='1'>$i</a></li>";
    }else {
      $out.= "<li><a class='".$class."' href='javascript:void(0);' data-value='$i'>$i</a></li>";
    }
  }

  // interval

  if($page<($tpages-$adjacents-1)) {
    $out.= "<li><a>...</a></li>";
  }

  // last

  if($page<($tpages-$adjacents)) {
    $out.= "<li><a class='".$class."' href='javascript:void(0);' data-value='$tpages'>$tpages</a></li>";
  }

  // next

  if($page<$tpages) {
    $out.= "<li><span><a class='".$class."' href='javascript:void(0);' data-value='".($page+1)."'>$nextlabel</a></span></li>";
  }else {
    $out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
  }

  $out.= "</ul>";
  return $out;
}


function paginateBsc($recharge_table, $page, $tpages, $adjacents) {
  $prevlabel = "&lsaquo; Anterior";
  $nextlabel = "Siguiente &rsaquo;";
  $out = '<ul class="pagination pagination-large">';

  // previous label

  if($page==1) {
    $out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
  } else if($page==2) {
    $out.= "<li><span><a class='paginateBsc' href='javascript:void(0);' data-value='1'>$prevlabel</a></span></li>";
  }else {
    $out.= "<li><span><a class='paginateBsc' href='javascript:void(0);' data-value='".($page-1)."'>$prevlabel</a></span></li>";

  }

  // first label
  if($page>($adjacents+1)) {
    $out.= "<li><a class='paginateBsc' href='javascript:void(0);' data-value='1'>1</a></li>";
  }
  // interval
  if($page>($adjacents+2)) {
    $out.= "<li><a>...</a></li>";
  }

  // pages

  $pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
  $pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
  for($i=$pmin; $i<=$pmax; $i++) {
    if($i==$page) {
      $out.= "<li class='active'><a>$i</a></li>";
    }else if($i==1) {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='1'>$i</a></li>";
    }else {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$i'>$i</a></li>";
    }
  }

  // interval

  if($page<($tpages-$adjacents-1)) {
    $out.= "<li><a>...</a></li>";
  }

  // last

  if($page<($tpages-$adjacents)) {
    $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$tpages'>$tpages</a></li>";
  }

  // next

  if($page<$tpages) {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='".($page+1)."'>$nextlabel</a></span></li>";
  }else {
    $out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
  }

  $out.= "</ul>";
  return $out;
}

function paginate_mini($recharge_table, $page, $tpages, $adjacents) {
  $prevlabel = "&lsaquo;&lsaquo;";
  $nextlabel = "&rsaquo;&rsaquo;";
  $out = '<ul class="pagination pagination-sm">';

  // previous label

  if($page==1) {
    $out.= "<li class='disabled'><span><a>$prevlabel</a></span></li>";
  } else if($page==2) {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='1'>$prevlabel</a></span></li>";
  }else {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='".($page-1)."'>$prevlabel</a></span></li>";

  }

  // first label
  if($page>($adjacents+1)) {
    $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='1'>1</a></li>";
  }
  // interval
  if($page>($adjacents+2)) {
    $out.= "<li><a>...</a></li>";
  }

  // pages

  $pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
  $pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
  for($i=$pmin; $i<=$pmax; $i++) {
    if($i==$page) {
      $out.= "<li class='active'><a>$i</a></li>";
    }else if($i==1) {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='1'>$i</a></li>";
    }else {
      $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$i'>$i</a></li>";
    }
  }

  // interval

  if($page<($tpages-$adjacents-1)) {
    $out.= "<li><a>...</a></li>";
  }

  // last

  if($page<($tpages-$adjacents)) {
    $out.= "<li><a class='paginate' href='javascript:void(0);' data-value='$tpages'>$tpages</a></li>";
  }

  // next

  if($page<$tpages) {
    $out.= "<li><span><a class='paginate' href='javascript:void(0);' data-value='".($page+1)."'>$nextlabel</a></span></li>";
  }else {
    $out.= "<li class='disabled'><span><a>$nextlabel</a></span></li>";
  }

  $out.= "</ul>";
  return $out;
}

 ?>
