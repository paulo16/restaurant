@extends('layouts.admin.default')

@section('head')
    <title>Valencienne | List</title>
@endsection

@section('content')
    <div class="tr-single-box">

        <div class="tr-single-header">
            <h4><i class="ti-share"></i>Commandes</h4>
        </div>

        <div class="tr-single-body">
            <div class="pr-switch-caption">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a id="add-commande" role="button" href="{{ route('commande.create') }}" id="add-categorie"
                            class="btn btn-info waves-effect waves-light"> AJOUTER <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <br>
                <table id="commandes" class="table">
                    <thead>
                        <tr class="table-info">
                            <th>ID</th>
                            <th>Utilisateur</th>
                            <th>Plat</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Date de création</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

    </div>
@stop

@section('js')

    <script>
        $(document).ready(function() {
            var table = $('#commandes')
                .DataTable({
                    "oLanguage": {
                        "sProcessing": "{{ Lang::get('datatable.sProcessing') }}",
                        "sSearch": "{{ Lang::get('datatable.sSearch') }}",
                        "sLengthMenu": "{{ Lang::get('datatable.sLengthMenu') }}",
                        "sInfo": "{{ Lang::get('datatable.sInfo') }}",
                        "sInfoEmpty": "{{ Lang::get('datatable.sInfoEmpty') }}",
                        "sInfoFiltered": "{{ Lang::get('datatable.sInfoFiltered') }}",
                        "sInfoPostFix": "{{ Lang::get('datatable.sInfoPostFix') }}",
                        "sLoadingRecords": "{{ Lang::get('datatable.sLoadingRecords') }}",
                        "sZeroRecords": "{{ Lang::get('datatable.sZeroRecords') }}",
                        "sEmptyTable": "{{ Lang::get('datatable.sEmptyTable') }}",
                        "oPaginate": {
                            "sFirst": "{{ Lang::get('datatable.sFirst') }}",
                            "sPrevious": "{{ Lang::get('datatable.sPrevious') }}",
                            "sNext": "{{ Lang::get('datatable.sNext') }}",
                            "sLast": "{{ Lang::get('datatable.sLast') }}"
                        },
                        "oAria": {
                            "sSortAscending": "{{ Lang::get('datatable.sSortAscending') }}",
                            "sSortDescending": "{{ Lang::get('datatable.sSortDescending') }}"
                        }
                    },
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('commande.data') }}',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    pagingType: 'full_numbers',
                    buttons: ['csv', 'excel', 'pdf'],
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'utilisateur',
                            name: 'utilisateur'
                        },
                        {
                            data: 'plat',
                            name: 'plat'
                        },
                        {
                            data: 'quantite',
                            name: 'quantite'
                        },
                        {
                            data: 'prix',
                            name: 'prix'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ],
                });

            //////////////////// Delete Commande ///////////////////////////////////

            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                var swal_ot = {
                    title: "{{ Lang::get('contenu.admin.sure') }}",
                    text: "{{ Lang::get('contenu.admin.subtext_sure') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{ Lang::get('contenu.admin.confirm_btn') }}",
                    cancelButtonText: "{{ Lang::get('contenu.admin.cancel_btn') }}",
                    closeOnConfirm: false
                };
                var url = '{{ route('commande.delete', ':id') }}';
                url = url.replace(':id', id);
                swal(swal_ot, function() {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                    }).done(function(result) {
                        if (result.reponse == "impossible") {
                            swal("{{ Lang::get('contenu.impossible') }}",
                                "{{ Lang::get('contenu.sub_impossible') }}", "warning");
                        } else {
                            swal("{{ Lang::get('contenu.admin.supprime') }}",
                                "{{ Lang::get('contenu.admin.sub_sup') }}", "success");
                        }
                        table.ajax.reload(null, false);
                    }).error(function() {
                        swal("{{ Lang::get('contenu.admin.oops') }}",
                            "{{ Lang::get('contenu.admin.problem_server') }}", "error");
                    });
                });
            });

        });
    </script>
@endsection
