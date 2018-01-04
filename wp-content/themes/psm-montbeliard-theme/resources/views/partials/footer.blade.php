<!-- Footer start -->
<footer>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 ">
            <?php
            if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
            }
            ?>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 ">
            <?php
            if(is_active_sidebar('footer-sidebar-2')){
                dynamic_sidebar('footer-sidebar-2');
            }
            ?>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-xl-3 ">
            <?php
            if(is_active_sidebar('footer-sidebar-3')){
                dynamic_sidebar('footer-sidebar-3');
            }
            ?>
        </div>
    </div>
</footer>

<!-- Footer end -->

{{--<footer class="content-info">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))
  </div>
</footer>--}}
