<?php $__env->startSection('contentHome'); ?>
<div class="container">
    <div class="row title-page">
        <h1>Lista de Imóveis</h1>
    </div>
    <div class="row">
        <div class="form-horizontal filter">
            <div class="form-group">
                <label for="filter-imobiliarias" class="col-md-2 control-label">Filtrar por</label>
                <div class="col-md-6">
                    <select class="form-control filter-imobiliarias col-md-2" name="filter-imobiliarias">
                        <option value="">Todas</option>    
                        <?php $__currentLoopData = $imobiliarias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value['imobiliaria']); ?>"><?php echo e($value['imobiliaria']); ?></option>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-wraper">
            <table class="table table-bordered" id="list-itens">
                <thead class="thead-inverse">
                    <tr>
                      <th>id</th>
                      <th>Imobiliriaria</th>
                      <th>Tipo</th>
                      <th>Descrição</th>
                      <th>Endereço</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $imoveis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td scope="row" class="id_row"><?php echo e($value['id']); ?></td>                  
                      <td><?php echo e($value['imobiliaria']); ?></td>
                      <td><?php echo e($value['type']); ?></td>
                      <td><?php echo e($value['description']); ?></td>
                      <td><?php echo e($value['adress']); ?></td>
                      <td><a href="/edit/<?php echo e($value['id']); ?>" class="btn btn-primary" role="button"><span class="fa fa-pencil-square-o btn"></span></a></td>
                      <td><a class="btn btn-danger delete" role="button"><span class="fa fa-times btn"></span></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </tbody>
            </table>            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <a href="/add" class="add-imovel btn btn-success"><i class="fa fa-plus">&nbsp;&nbsp;Novo</i></a>
        </div>       
    </div>
</div>
<script id="template-table-home" type="text/x-custom-template">
    <tr>
        <td scope="row" class="id_row"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="/edit/" class="btn btn-primary" role="button"><span class="fa fa-pencil-square-o btn"></span></a></td>
        <td><a class="btn btn-danger delete" role="button"><span class="fa fa-times btn"></span></a></td>
    </tr>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>