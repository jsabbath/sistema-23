<?php if($total === 0 ):?>
<div class="col-sm-12 form-group-sm">
    <form method="post" action="<?= Router::url(array('Clientes', 'addReserva'))?>" id="ClienteAddForm">
    <table class="table table-condensed">
        
                <div class="col-md-3">
                    <div class="form-group ">
                        <small>Nome: <strong class="text text-danger">*</strong></small>
                        <input type="text" name="Cliente[nome]" class="form-control rounded" placeholder="Nome:">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <small>E-mail: <strong class="text text-danger"></strong></small>
                        <input type="text" name="Cliente[email]" class="form-control rounded" placeholder="E-mail:">
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="form-group ">
                        <small>RG: <strong class="text text-danger"></strong></small>
                        <input type="text" name="Cliente[rg]" class="form-control rounded" placeholder="RG:">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <small>Telefone: <strong class="text text-danger">*</strong></small>
                        <input type="text" name="Cliente[telefone]" class="form-control rounded telefone" placeholder="Telefone:">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <small>Data Nascimento: <strong class="text text-danger"></strong></small>
                        <input type="text" name="Cliente[dt_nascimento]" class="form-control rounded date2" placeholder="Data Nascimento:">
                    </div>
                </div>
                <div class="col-md-3">
                    <small>Sexo: <strong class="text text-danger">*</strong></small>
                    <select type="text" name="Cliente[sexo]" class="form-control rounded">
                        <option value="1"> MASCULINO </option>
                        <option value="0"> FEMININO </option>
                    </select>
                </div>
        
       
         <div class="col-md-3">
             <button class="btn btn-primary btn-sm " style="margin-top: 18px;" > Cadastrar e incluir na lista </button>
         </div>
        
    </form>
   
</div>

<?php elseif ( $total === 1 ):?>

<div class="col-sm-12 form-group-sm">
        <input type="hidden" name="Reserva[clientes_id]" class="form-control" value="<?= md5($cliente[0]['id'])?>">
</div>

<?php elseif ( $total > 1 ):?>
<div class="col-sm-12" style="overflow-y:auto; height:200px;" >
    <table class="table table-condensed table-striped table-responsive">
        <thead>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach ($cliente as $pessoa):?>
                <tr>
                    <td><?= $pessoa['nome']?></td>
                    <td><?= $pessoa['email']?></td>
                    <td><?= $pessoa['telefone']?></td>
                    <td>
                        <a class="btn btn-primary btn-xs" id="encontratId" data-id="<?= md5($pessoa['id'])?>"><i class="fa fa-sign-in"></i></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php endif; ?>
