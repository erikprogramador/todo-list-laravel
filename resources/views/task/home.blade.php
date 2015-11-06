@extends('layout')

@section('title', 'Tarefas')

@section('content')

	@include('partial.msg')
	
	{{-- Exibição de tarefa selecionada --}}
	@if(session('show'))
		<div class="well top-space" id="wellShow">
			<button type="button" class="close" id="closeWellShow"><span>&times;</span></button>
			<h3>{{ session('show')->title }}</h3>
			<p>{{ session('show')->description }}</p>
		</div>
	@endif

	<h1>Tarefas</h1>
	<a href="{{ route('note.index') }}">Voltar</a>

	{{-- Cadastro de tarefa --}}
	<h2>Nova Tarefa</h2>

	<form action="{{ route('task.store') }}" method="post">
		
		<div class="form-goup">
			<label for="title">Titulo da tarefa:</label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Digite o titulo da tarefa">
		</div>

		<div class="form-group">
			<label for="description">Descrição</label>
			<textarea name="description" id="description" class="form-control noresize-textarea" placeholder="Digite a descrição da tarefa"></textarea>
		</div>

		<input type="hidden" name="note_books_id" id="note_books_id" value="{{ $noteId }}">
		
		{!! csrf_field() !!}

		<button type="submit" class="btn btn-primary">Nova Tarefa</button>
	</form>

	<hr>

	{{-- Listagem de tarefas --}}
	<table class="table table-striped table-hover">
		<thead>
			<th class="col-md-8">Titulo da tarefa</th>
			<th class="col-md-4">Ações</th>
		</thead>
		<tbody>
			@foreach($tasks as $task)
				<tr>
					<td><a href="{{ route('task.show', $task->id) }}">{{ $task->title }}</a></td>
					<td class="text-right">
						@if(!$task->complete)
							<a href="{{ route('task.complete', $task->id) }}" class="btn btn-success">Completar</a>
						@else
							<a href="{{ route('task.complete', $task->id) }}" class="btn btn-info">Ativar</a>
						@endif
						<a href="" class="btn btn-warning" id="btnTaskUpdate" data-id="{{ $task->id }}" data-title="{{ $task->title }}" data-description="{{ $task->description }}" data-toggle="modal" data-target="#modalTaskUpdate" >Atualizar</a>
						<a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{-- Modal para atualização de tarefa --}}
	<form action="{{ route('task.update') }}" method="post" id="formModalTask" data-url="{{ route('task.update') }}">
		<div class="modal fade" id="modalTaskUpdate">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Atualizar Caderno</h4>
		      </div>
		      <div class="modal-body">
		        
		        <div class="form-goup">
					<label for="title">Titulo da tarefa:</label>
					<input type="text" name="title" class="form-control" id="titleUpdate" placeholder="Digite o titulo da tarefa">
				</div>

				<div class="form-group">
					<label for="description">Descrição</label>
					<textarea name="description" id="descriptionUpdate" class="form-control noresize-textarea" placeholder="Digite a descrição da tarefa"></textarea>
				</div>

				<input type="hidden" name="note_books_id" id="note_books_id" value="{{ $noteId }}">
				
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