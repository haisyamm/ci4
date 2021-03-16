<?php

/***********************************************************************************
 * Description
 * Looping menu if has child
 * 
 * Parameter
 * $raw       => $array data from database result
 * $parent_id => parent_id column
 * 
 * Return
 * array data
 * 
***********************************************************************************/
function template($view_name, $data)
{
  echo view('layout/header');
  //   <!-- begin::Body -->
  echo '<div class="dashboard-main-wrapper">'; // BEGIN
    // <!-- BEGIN: Left Aside -->
  echo '<div class="nav-left-sidebar sidebar-dark">';
  echo view('layout/navbar', $data);
  echo '</div>';
    //  <!-- END: Left Aside -->
  echo '<div class="dashboard-wrapper"><div class="dashboard-ecommerce">';
  echo view( $view_name, $data); //Konten
  echo "</div></div>"; //END dashboard-main-wrapper
  //    <!-- end:: Body -->

  echo  '<div class="footer">
          <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="text-md-right footer-links d-none d-sm-block">
                
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="text-md-right footer-links d-none d-sm-block">
                Copyright © 2021. All rights reserved.
                    <a href="javascript: void(0);">IK19B</a>
                </div>
            </div>
        </div>
    </div>';
  echo view('layout/footer', $data);
}
