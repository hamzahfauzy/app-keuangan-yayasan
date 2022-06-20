<?php if(!isset($_GET['cetak'])): ?>
<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-success-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Laporan Anggaran STIKES</h2>
                        <h5 class="text-white op-7 mb-2">Laporan anggaran STIKES</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                            <input type="hidden" name="r" value="reports/stikes">
                            <div class="form-group">
                                <label for="">Filter</label>
                                <div class="d-flex">
                                    <input type="number" placeholder="Tahun" name="year" onchange="updateDate(this.value)" class="form-control" value="<?=@$_GET['year']?>">
                                    &nbsp;
                                    <input type="date" id="from" name="from" class="form-control" value="<?=@$_GET['from']?>">
                                    &nbsp;
                                    <input type="date" id="to" name="to" class="form-control" value="<?=@$_GET['to']?>">
                                    &nbsp;
                                    <button name="tampil" class="btn btn-success">Tampilkan</button>
                                    &nbsp;
                                    <button name="cetak" class="btn btn-primary">Cetak</button>
                                </div>
                            </div>
                            </form>

                            <?php if($render && is_object($render)): ?>
                            <table class="table table-bordered table-hover">
                            <?php endif ?>
                                <?php else: ?>
                                <script>window.print()</script>
                                <h1 align="center" style="margin:0;padding:0">LAPORAN KEUANGAN</h1>
                                <p align="center"><?=$_GET['from']?> - <?=$_GET['to']?></p>
                                <?php if($render && is_object($render)): ?>
                                <table border="1" cellpadding="5" cellspacing="0" width="100%">
                                <?php endif ?>

                                <?php endif ?>
                                <?php if($render && is_object($render)): ?>
                                <?= $render?$render->head:'' ?>
                                <?= $render?$render->rows:'' ?>
                                <?php endif ?>
                            <?php if($render && is_object($render)): ?>
                            </table>
                            <?php endif ?>

                            <?= $render&&!is_object($render)?$render:''?>
                            <?php if(!isset($_GET['cetak'])): ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>
<script>
function updateDate(year)
{
    document.getElementById('from').setAttribute("min", year + "-01-01");
    document.getElementById('from').setAttribute("max", year + "-12-31");

    document.getElementById('to').setAttribute("min", year + "-01-01");
    document.getElementById('to').setAttribute("max", year + "-12-31");
}
</script>
<?php endif ?>