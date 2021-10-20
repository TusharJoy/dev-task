@extends('welcome')

@section('content')

    <div class="section mb-5">
        <div class="card">
            <div class="card-body pt-6">

                <form  id="search-form" class="form-inline" role="form">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-field col s12">
                                <label for="year">Birth year</label>
                                <input  class="form-control form-control-solid"
                                       placeholder="Birth Year"
                                       name="year" id="year">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-field col s12">
                                <label for="day">Birth Day</label>
                                <input  class="form-control form-control-solid"
                                       placeholder="Birth Day"
                                       name="day" id="day">
                            </div>
                        </div>
                        <div class="input-field col-4">
                            <button type="submit" class="btn btn-success"
                                    name="submit" value="search_data">Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="card card-flush shadow-sm">
            <h1 class="card-title text-center py-4 bg-dark bg-gradient text-white fs-2tx fw-light">USER DATABASE</h1>

            <div class="card-body pt-6">
                <div class="section-data-tables">
                    <table id="users-table" class="table table-striped table-row-bordered gy-5">
                        <thead class="text-center text-gray-700 fw-bolder fs-6 text-uppercase gs-0">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">BirthDay</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Ip</th>
                            <th scope="col">Country</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            initServerSideRendering("users-table");
        });

        function initServerSideRendering(id) {

            var oTable = $("#" + id).DataTable({
                processing: true,
                serverSide: true,
                pageLength: 20,
                lengthMenu: [20, 50, 100, 200, 500],
                "scrollX": true,
                "scrollXInner": "100%",
                "autoWidth": true,
                order: [[0, "desc"]],
                ajax: {
                    url: '{!! route('user.data') !!}',
                    data: function (d) {
                        d.day = $('#day').val();
                        d.year = $('#year').val();
                        d.submit = $('#submit').val();
                    },
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'birthday', name: 'birthday'},
                    {data: 'phone', name: 'phone'},
                    {data: 'ip', name: 'ip'},
                    {data: 'country', name: 'country'},

                ]
            });

            $('#search-form').on('submit', function (e) {
                oTable.draw();
                e.preventDefault();
            });
        }


    </script>


@endsection