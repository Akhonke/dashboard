<div class="container-fluid px-xl-5">
    <section class="py-5">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12 mb-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="h6 text-uppercase mb-0">Create New Complaints/Suggestions</h3>
                    </div>
                    <?php 
                       if (!empty($this->session->flashdata('error'))) { ?>
                        <div style="color:red;text-align:center"><?= $this->session->flashdata('error'); ?></div>
                    <?php } ?>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" id="CreateComplaintsForm">
                            <div class="form-group row">
                                <div class="col-md-6">
                                   <label class="form-control-label">Complaints and suggestions</label><br>
                                    <label><input type="radio" name="type" value="complaints"> Complaints</label>
                                    <label><input type="radio" name="type" value="suggestions"> Suggestions</label>
                                    <label id="type-error" class="error" for="type"></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-control-label">Description</label>
                                <textarea name="description" id="description" rows="10" cols="80" required=""></textarea>
                                <label id="description-error" class="error" for="description"></label>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 <script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};
CKEDITOR.replace('description');
</script>
