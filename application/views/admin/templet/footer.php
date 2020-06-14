  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
          <b><a href="" target="_blank">diri sendiri</a></b>
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- jquery -->
<script src="<?php echo base_url('assets/') ?>ruangAdmin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>ruangAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- boostrap min -->
<script src="<?php echo base_url('assets/') ?>ruangAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ruangadmin -->
<script src="<?php echo base_url('assets/') ?>ruangAdmin/js/ruang-admin.min.js"></script>
<!-- datatable -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/datatable/js/jquery.datatables.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- sweetalert -->
<script src="<?php echo base_url('assets/') ?>sweetalert/sweetalert2.all.min.js"></script>
</body>

</html>


<script type="text/javascript">
  <?php if(empty($id_tabel)){ ?>
     let id_tabel = '';
 <?php  }else{ ?>
     let id_tabel ="<?php echo $id_tabel ?>";
  <?php } ?>

  if(id_tabel === ''){

  }else{
   $(`#${id_tabel}`).DataTable({
    "paging": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  })
 }

 $(document).ready(function(){

 })



</script>




