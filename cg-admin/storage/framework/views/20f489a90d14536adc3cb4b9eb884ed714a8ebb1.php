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
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar sidewidth">
		<ul class="nav menu" id="main_nav">
			  <li class="active"  id="home">
			    <a href="<?php echo url('/home') ?>">
			      <svg class="glyph stroked dashboard-dial">
			        <use xlink:href="#stroked-dashboard-dial"></use>
			      </svg> Dashboard</a>
			  </li>
              <?php
                foreach($menulist as $k=>$v){
                  if(!isset($menulist[$k]['child'])){
                    ?>
                      <li id="id_<?php echo $v['url'];?>">
						<a href="<?php echo url('/'.$v['url']) ?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"/></svg>
							<?php echo $v['name'];?>
						</a>
					  </li>
                    <?php
                  }
                  else
                  {
                     ?>
                       <li class="parent">
                       <a href="#<?php echo $v['url'];?>" data-toggle="collapse" > 
                       <span href="#<?php echo $v['url'];?>"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>
					       <?php echo $v['name'];?>
						     </a>    
						  <ul id="<?php echo $v['url'];?>" class="children collapse" style="">
						    <?php
						      foreach($menulist[$k]['child'] as $k1=>$v1){
						    ?>
						      <li id="id_<?php echo $v1['url'];?>">
									<a href="<?php echo url('/'.$v1['url']) ?>" class="">
										<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"/></svg></span><?php echo $v1['name'];?>
                                	</a>
							  </li>
						    <?php
						     }
						    ?>
						  </ul>
					  </li>
                     <?php
                  }
                }
              ?>
	    </ul>
</div><!--/.row-->
		
		