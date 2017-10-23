<?php $__env->startSection('contentHome'); ?>
<div class="container">
    <div class="row title-page">
        <h1>Adicionar de Imóvel</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">            
            <div class="wrapper-formulario">   
                <form  class="formulario-imovel form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo e(route('insert')); ?>">
                    
                    <div class="form-group">
                        <label for="id" class="col-md-2 control-label">Id</label>
                        <div class="col-md-6">
                            <input id="id" type="text" class="form-control col-33" name="id" required readonly>                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imobiliaria" class="col-md-2 control-label">Imobiliaria</label>
                        <div class="col-md-6">
                            <input id="imobiliaria" type="text" class="form-control" name="imobiliaria" required autofocus>                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-md-2 control-label">Tipo</label>
                        <div class="col-md-6">
                            <input id="type" type="text" class="form-control" name="type" required>                                
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-2 control-label">Descrição</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" required>                                
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adress" class="col-md-2 control-label">Endereço</label>
                        <div class="col-md-6">
                            <input id="adress" type="text" class="form-control" name="adress" required>                                
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6 ">
                            <button type="submit" class="btn btn-success col-90"><i class="fa fa-check">&nbsp;&nbsp;SALVAR</i></button>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6 col-lg-6 ">                                 
                            <button  type="button" class="go-black btn btn-warning col-90"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;VOLTAR</button>
                        </div>                                
                    </div>                        
                </form>
            </div>            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>