@extends('layouts.app')

@section('contentHome')
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
                        @foreach($imobiliarias as $key => $value)
                        <option value="{{ $value['imobiliaria'] }}">{{ $value['imobiliaria'] }}</option>    
                        @endforeach
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
                @foreach($imoveis as $key => $value)
                    <tr>
                      <td scope="row" class="id_row">{{ $value['id'] }}</td>                  
                      <td>{{ $value['imobiliaria'] }}</td>
                      <td>{{ $value['type'] }}</td>
                      <td>{{ $value['description'] }}</td>
                      <td>{{ $value['adress'] }}</td>
                      <td><a href="/edit/{{ $value['id'] }}" class="btn btn-primary" role="button"><span class="fa fa-pencil-square-o btn"></span></a></td>
                      <td><a class="btn btn-danger delete" role="button"><span class="fa fa-times btn"></span></a></td>
                    </tr>
                @endforeach                
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
@endsection
