@extends('layout')

@section('title', 'Cadernos de tarefas')

@section('content')

	@include('partial.msg')

	<h1>Cadernos de Tarefas</h1>

	{{-- Cadastro de Caderno --}}
	<h2>Novo Caderno</h2>

	<form action="{{ route('note.store') }}" method="post" class="form-inline">
		
		<div class="form-goup">
			<div class="col-sm-12">

				<label for="name" class="control-label">Nome do Caderno:</label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Digite o titulo do novo caderno" maxlength="255">
				
				{!! csrf_field() !!}

				<button type="submit" class="btn btn-primary">Novo Caderno</button>
				
			</div>			    
		</div>

	</form>
		
	{{-- Listagem de Cadernos --}}
	<div class="row">
		<div class="col-sm-12">
			<h2>Lista de Caderno</h2>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class="col-md-8">Caderno</th>
						<th class="col-md-2">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($notes as $note)
						<tr>
							<td><a href="{{ route('note.show', $note->id) }}">{{ $note->name }}</a></td>
							<td>
								<a href="" class="btn btn-warning updateBtn" data-id="{{ $note->id }}" data-name="{{ $note->name }}" data-toggle="modal" data-target="#modalUpdate">Atualizar</a>
								<a href="{{ route('note.delete', $note->id) }}" class="btn btn-danger">Excluir</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	{{-- Modal para atualização de caderno --}}
	<form action="{{ route('note.update') }}" method="post" id="formModal" data-url="{{ route('note.update') }}">
		<div class="modal fade" id="modalUpdate">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Atualizar Caderno</h4>
		      </div>
		      <div class="modal-body">
		        
				<div class="form-goup">
					<label for="name">Nome do Caderno:</label>
					<input type="text" name="name" class="form-control updateInput" id="name" placeholder="Digite o novo titulo" maxlength="255">
				</div>
				{!! csrf_field() !!}
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Atualizar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</form>

@endsection