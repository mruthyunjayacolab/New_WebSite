<?php
include("header.php");
?>
<script type="text/javascript">
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.KANNADA],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['data']);
        control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
      }
      google.setOnLoadCallback(onLoad);
</script> 
<script type="text/javascript">
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.KANNADA],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['data1']);
        control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
      }
      google.setOnLoadCallback(onLoad);
</script> 

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="card-title">Breaking News</strong>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#smallmodal">Add Breaking News</button>
                                    </div>
                                    <div class="col-sm-12">
                                        <?php
                                        if (isset($_SESSION['success'])) {
                                            ?>
                                            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                                <span class="badge badge-pill badge-success">Success</span> <?= $_SESSION['success'];?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <?php
                                            unset($_SESSION['success']);
                                        }
                                        elseif (isset($_SESSION['error'])) {
                                            ?>
                                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                                <span class="badge badge-pill badge-danger">Error</span> <?= $_SESSION['error'];?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Breaking News</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 1;
                                        $q = mysqli_query($db,"SELECT * FROM breaking_news");
                                        while ($r = mysqli_fetch_array($q)) {
                                            ?>
                                            <tr>
                                                <td><?= $c;?></td>
                                                <td><?= $r[1]?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-success" onclick="catEdit('<?= $r[0]?>','<?= $r[1]?>')" data-toggle="modal" data-target="#smallmodal1">Edit</button>
                                                </td>
                                                <td>
                                                    <form action="breaking_news1.php" method="post">
                                                        <input type="hidden" name="rid" value="<?= $r[0]?>">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                            $c++;
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Add Breaking News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form action="breaking_news1.php" method="post" novalidate="novalidate">
                    
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Breaking News in Kannada</label>
                        <input  id="data" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                        
                        <div>
                            <button id="payment-button" type="submit" name="add" class="btn btn-lg btn-info btn-block">
                                
                                <span id="payment-button-amount">ADD</span>
                            </button>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smallmodal1" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Edit Breaking News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form action="breaking_news1.php" method="post" novalidate="novalidate">
                    <input type="hidden" name="rid" id="rid">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Breaking News in Kannada</label>
                        <input  id="data1" name="name1" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                        
                        <div>
                            <button id="payment-button" type="submit" name="update" class="btn btn-lg btn-info btn-block">
                                
                                <span id="payment-button-amount">UPDATE</span>
                            </button>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function catEdit(rid,str)
    {
        document.getElementById('rid').value = rid;
        document.getElementById('data1').value = str;
    }
</script>
<?php
include("footer.php");
?>