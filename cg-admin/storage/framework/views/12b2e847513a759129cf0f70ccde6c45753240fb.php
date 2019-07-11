<?php 
$url  = base_path().'/public/json/adminmodules.json';
$data1 = Session::get('data');
$menuitems = explode(',', $data1->module_list);
$data = file_get_contents($url);
$data = json_decode($data,true);
$menulist = array();
foreach ($menuitems as $key => $items){
  foreach ($data  as $key1=> $value){
    if($items == $key1)
    {$menulist[] = $value;}
}
} 
?>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="active" id="home">
          <a href="<?php echo url('/'.'home') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
         </li>
       <?php
            foreach($menulist as $k=>$v){
               if(!isset($menulist[$k]['child'])){
        ?>
        <li id="id_<?php echo $v['url'];?>">
          <a href="<?php echo url('/'.$v['url']) ?>">
            <img src="<?php echo url('/public/images/'.$v['image_name']);?>" />&nbsp;&nbsp; <span><?php echo $v['name'];?></span>            
          </a>
        </li>
        <?php
               }
                else
               {
        ?>
        <li class="treeview parent">
          <a href="#<?php echo $v['url'];?>">
             <img src="<?php echo url('/public/images/'.$v['image_name']);?>" />&nbsp;&nbsp; <span href="#<?php echo $v['url'];?>"><?php echo $v['name'];?></span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <ul class="treeview-menu in" id="<?php echo $v['url'];?>">
          <?php
                  foreach($menulist[$k]['child'] as $k1=>$v1){
                ?>
            <li class="active" id="id_<?php echo $v1['url'];?>">
            <a href="<?php echo url('/'.$v1['url']) ?>">
            <i class="fa fa-circle-o"></i> <?php echo $v1['name'];?></a>
            </li>
           <?php
                 }
                ?>
          </ul>
        </li>
       <?php }} ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    
    