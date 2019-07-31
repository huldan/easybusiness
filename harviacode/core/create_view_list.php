<?php
$string="<?php if(\$this->session->flashdata('message')) {
  \$flashMessage=\$this->session->flashdata('message');
echo \"<script>alert('\$flashMessage')</script>\";
} ?>
";
$string .= "<div class=\"row\">
    <div class=\"col-12\">
        <div class=\"card\">
            <div class=\"card-body\">
              <div class=\"row\">
                  <div class=\"col-md-6\">
                      <h4 class=\"card-title\">Data ".ucfirst($table_name)."</h4>
                      <h6 class=\"card-subtitle\">Export data to Copy, CSV, Excel, PDF & Print</h6>
                  </div>
                  <div class=\"col-md-6 text-right\">
                      <?php echo anchor(site_url(\$module.'/".$c_url."/create'), '+ Tambah Data', 'class=\"btn btn-primary\"'); ?>
      	    </div>
              </div>


                <div class=\"table-responsive m-t-40\">
                    <table id=\"example23\" class=\"display nowrap table table-hover table-striped table-bordered\" cellspacing=\"0\" width=\"100%\">
                        <thead>
                            <tr>
                                <?php foreach (\$datafield as \$d): ?>
                                  <th><?php echo str_replace(\"_\",\" \",\$d) ?></th>
                                <?php endforeach; ?>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach (\$data$c_url as \$d): ?>
                            <tr>
                              <?php foreach (\$datafield as \$df): ?>
                                <td><?php echo \$d->\$df ?></td>
                              <?php endforeach; ?>
                                <td>
                                <a href=\"<?php echo base_url().\$module?>/$c_url/edit/<?php echo \$d->$pk ?>\">
                                        <button class=\"btn btn-success waves-effect waves-light m-r-10\">Edit</button>
                                    </a>
                                    <button  data-toggle=\"modal\" data-target=\"#responsive-modal\" class=\"btn btn-danger waves-effect waves-light m-r-10 modalDelete\" value=\"<?php echo \$d->$pk ?>\">Delete</button>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
";

$string .="<div id=\"responsive-modal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" style=\"display: none;\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                <h4 class=\"modal-title\"></h4>
            </div>
            <div class=\"modal-body\">
              <p id=\"modalMsg\"></p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default waves-effect\" data-dismiss=\"modal\">Tutup</button>
                <a id=\"modalHref\" href=\"#\">
                <button type=\"button\" class=\"btn btn-danger waves-effect waves-light\">Ya!</button>
                </a>
            </div>
        </div>
    </div>
</div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
