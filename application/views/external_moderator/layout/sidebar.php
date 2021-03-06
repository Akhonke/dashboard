<div id="sidebar" class="sidebar py-3">

  <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"><?php $moderator_id =$_SESSION['external_moderator']['id'];
                            $moderator = $this->common->accessrecord('external_moderator', [], array('id'=>$moderator_id), 'row');
                            echo $moderator_nm = $moderator->fullname.' '.$moderator->surname;
                            ?></div>

  <ul class="sidebar-menu list-unstyled">

    <li class="sidebar-list-item"><a href="<?= base_url() . 'external-Moderator-dashboard' ?>" class="sidebar-link text-white active"><i class="o-home-1 mr-3 text-gray"></i><span>Dashboard</span></a>

    </li>
    <li class="sidebar-list-item">
      <a href="#" data-toggle="collapse" data-target="#pages6" aria-expanded="false" aria-controls="pages5" class="sidebar-link text-white">
        <i class="o-code-window-1 mr-3 text-gray"></i><span>Manage Moderation</span></a>
      <div id="pages6" class="collapse">
        <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
          <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>external-moderator-create-moderation" class="sidebar-link text-white pl-lg-5">Create Moderation Report</a>
          </li>
          <li class="sidebar-list-item">
            <a href="<?= BASEURL ?>external-moderator-moderation-list" class="sidebar-link text-white pl-lg-5">My Moderation Reports</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>

</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
  function subscriptionMessage() {
    Swal.fire({
      title: 'Membership Required ',
      text: "A membership required to use these features. Just go explore membership and subscribe and use features.",
      icon: 'error',
      cancelButtonColor: 'btn-primary',
    })

  }
</script>