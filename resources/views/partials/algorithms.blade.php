@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Algoritimos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
              </tfoot>
              <tbody>
                
                  @forelse ($algorithms as $algorithm)
                    <tr>
                        <td>{{ $algorithm->name }}</td>
                        <td>{{ $algorithm->description }}</td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="3"><b>Não existem algoritimos cadastradas no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $algorithms->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection