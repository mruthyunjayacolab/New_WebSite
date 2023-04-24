<?php
include("header.php");
?>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="card-title">Advertisement</strong>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#smallmodal">Add Advertisement</button>
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
                           
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Advertisement News</th>
                                   
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 1;
                                        $q = mysqli_query($db,"SELECT * FROM ads");
                                        while ($r = mysqli_fetch_array($q)) {
                                            ?>
                                            <tr>
                                                <td><?= $c;?></td>
                                                <td>
                                                    <embed src="advrt/<?php echo $r['ads']; ?>" width="150px" height="50px"></embed>
                                                </td>
                                               
                                                <td>
                                                    <form action="del_ads.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="rid" value="<?= $r['id']?>">
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
                <h5 class="modal-title" id="smallmodalLabel">Add Advertisement </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                 <div class="card-body">
                                
                                <form  method="post" action="ads.php" enctype="multipart/form-data" >
                    
                    <div class="col-md-12 mt-3 mt-md-0" >
                        
                        <input type="file" id="adp"  name="adp" class="form-control"  accept="image/*" >
                    </div>
                          <div class="col-md-12 mt-3 mt-md-0">
                                   <select class="form-control" name="type">
                                       <option value="Temporary">Temporary</option>
                                       <option value="Sidepanel">Sidepanel</option>
                                       <option value="Permanent">Permanent</option>
                                       <option value="Carousel">Carousel</option>
                                       <option value="Video">Video</option>
                                   </select>
                          </div>
                        <div>
                           <center> <button  type="submit" name="adds" class="btn btn-lg btn-info mt-2 ">
                                
                                ADD
                            </button></center>
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