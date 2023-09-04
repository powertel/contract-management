          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="<?php echo site_url();?>/dashboard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="submenu">
                    
                        <a href="#">
                        <i class="glyphicon  glyphicon-list"></i>Contracts
                        <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo site_url();?>/contract">View All</a></li>
                            <li><a href="<?php echo site_url();?>/contract/create">Create New</a></li>
                            
                        </ul>
                        
                        </li>
                    <li class="submenu">
                      <a href="#">
                      <i class="glyphicon glyphicon-list"></i>Contract Types
                      <span class="caret pull-right"></span>
                      </a>
                      <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo site_url();?>/contracttype">View All</a></li>
                            <li><a href="<?php echo site_url();?>/contracttype/create">Create New</a></li>
                            
                        </ul>

                    </li>


                      <li class="submenu">
                      <a href="#">
                      <i class="glyphicon glyphicon-list"></i>Statuses
                      <span class="caret pull-right"></span>
                      </a>
                      <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo site_url();?>/status">View All</a></li>
                            <li><a href="<?php echo site_url();?>/status/create">Create New</a></li>
                            
                        </ul>

                    </li>


                    <li><a href="<?php echo site_url();?>/report""><i class="glyphicon glyphicon-stats"></i> Reports</a></li>
                   <!-- <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Buttons</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Editors</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Configuration</a></li>-->
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Users
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo site_url();?>/auth">View All</a></li>
                            <li><a href="<?php echo site_url();?>/auth/create_user">Create New</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
          </div>