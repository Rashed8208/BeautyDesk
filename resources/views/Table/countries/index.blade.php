@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Countries
        </h4>


        <a href="{{ route('countries.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Add Country

        </a>

    </div>



    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif




    <div class="card shadow-sm">


        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-hover align-middle">


                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Flag</th>

                            <th>Country Name</th>

                            <th>Status</th>

                            <th width="180">
                                Action
                            </th>


                        </tr>


                    </thead>



                    <tbody>


                    @forelse($countries as $country)


                        <tr>


                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>


                                @if($country->flag)

                                <img src="{{ asset('storage/'.$country->flag) }}"
                                     width="45"
                                     height="30"
                                     class="rounded">


                                @else

                                <span class="text-muted">
                                    No Flag
                                </span>

                                @endif


                            </td>



                            <td>
                                {{ $country->name }}
                            </td>




                            <td>


                                @if($country->status)

                                <span class="badge bg-success">
                                    Active
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>


                                @endif


                            </td>




                            <td>


                                <a href="{{ route('countries.edit',$country->id) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil"></i>

                                </a>



                                <form action="{{ route('countries.destroy',$country->id) }}"
                                      method="POST"
                                      class="d-inline">


                                    @csrf

                                    @method('DELETE')


                                    <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this country?')">


                                        <i class="bi bi-trash"></i>


                                    </button>



                                </form>


                            </td>



                        </tr>


                    @empty


                    <tr>

                        <td colspan="5"
                            class="text-center">

                            No Country Found

                        </td>

                    </tr>


                    @endforelse



                    </tbody>



                </table>



            </div>



        </div>


    </div>



</div>


@endsection