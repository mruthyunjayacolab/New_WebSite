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
        control.makeTransliteratable(['data1']);
        control.makeTransliteratable(['data2']);
        control.makeTransliteratable(['data3']);
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
                                        <strong class="card-title">News Details</strong>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <?php
                                date_default_timezone_set('Asia/Kolkata');
                                $id = $_POST['rid'];
                                $q = mysqli_query($db,"SELECT * FROM `news` WHERE id = '$id'");
                                if ($r = mysqli_fetch_array($q)) {
                                
                                ?>
                                    <form action="news1.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="rid" value="<?= $id?>">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Title in Kannada</label>
                                            <input id="data" name="title" type="text" class="form-control" value="<?= $r[2]?>" aria-required="true" aria-invalid="false" placeholder="Title in kannada">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Main Image</label>
                                                    <input name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title in kannada">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="news_images/<?= $r[3]?>" style="height: 100px;width: 100px;">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Image Caption in Kannada</label>
                                            <input  id="data1" name="caption" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Image Caption in Kannada" value="<?= $r[4]?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">First Part Description</label>
                                            <textarea id="data2" name="desc1" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Part Description"><?= $r[5]?></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Sub Images</label>
                                                    <input name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title in kannada" multiple="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                $x = $r[6];
                                                $string = preg_replace('/\.$/', '', $x);
                                                $ar = explode(',', $string);
                                               for($i=1;$i<sizeof($ar);$i++ )
                                                {
                                                    ?><img src="news_images/<?= $ar[$i];?>" alt="multi_image" style="width:100px;height:100px;margin:10px;">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Second Part Description</label>
                                            <textarea id="data3" name="desc2" class="form-control" aria-required="true" aria-invalid="false" placeholder="Second Part Description"><?= $r[7]?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Youtube Video Link</label>
                                            <input name="youtube" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Youtube Video Link" value="<?= $r[8]?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">News Date</label>
                                            <input name="date" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="News Date" value="<?= $r[9]?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">News Time</label>
                                            <input name="time" type="time" class="form-control" aria-required="true" aria-invalid="false" placeholder="News Time" value="<?= $r[10]?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Category</label>
                                            <select class="form-control" name="cat">
                                                <?php
                                                $q1 = mysqli_query($db,"select * from categories where id='$r[1]'");
                                                while($r1 = mysqli_fetch_array($q1))
                                                {
                                                    ?>
                                                    <option value="<?= $r1[0]?>" selected><?= $r1[1]?></option>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                $q1 = mysqli_query($db,"select * from categories where id!='$r[1]'");
                                                while($r1 = mysqli_fetch_array($q1))
                                                {
                                                    ?>
                                                    <option value="<?= $r1[0]?>"><?= $r1[1]?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                            
                                        <div>
                                            <button id="payment-button" type="submit" name="update" class="btn btn-lg btn-info btn-block">
                                                
                                                <span id="payment-button-amount">UPDATE</span>
                                            </button>
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                date_default_timezone_set('Asia/Kolkata');
                $today = date("Y-m-d");
                $time = date("h:i");
                ?>
                <form action="news1.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Title in Kannada</label>
                        <input  id="data" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title in kannada">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Main Image</label>
                        <input name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title in kannada">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Image Caption in Kannada</label>
                        <input  id="data1" name="caption" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Image Caption in Kannada">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">First Part Description</label>
                        <textarea id="data2" name="desc1" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Part Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Sub Images</label>
                        <input name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title in kannada" multiple="">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Second Part Description</label>
                        <textarea id="data3" name="desc2" class="form-control" aria-required="true" aria-invalid="false" placeholder="Second Part Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Youtube Video Link</label>
                        <input name="youtube" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Youtube Video Link">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">News Date</label>
                        <input name="date" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="News Date" value="<?= $today?>">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">News Time</label>
                        <input name="time" type="time" class="form-control" aria-required="true" aria-invalid="false" placeholder="News Time" value="<?= $time; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category</label>
                        <select class="form-control" name="cat">
                            <option value="">Select Category</option>
                            <?php
                            $q1 = mysqli_query($db,"select * from categories");
                            while($r1 = mysqli_fetch_array($q1))
                            {
                                ?>
                                <option value="<?= $r1[0]?>"><?= $r1[1]?></option>
                                <?php
                            }
                            ?>
                        </select>
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
<?php
include("footer.php");
?>