@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-title">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-0">All Contacts</h2>
                
                    <div>
                        <button class="btn btn-success">
                            <span><i class="fa fa-plus-circle"></i></span>
                            Add New
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col">
                                <select name="company" id="company" class="custom-select">
                                    @foreach ($companies as $id => $name)
                                        <option {{ $id == request('company_id') ? 'selected' : '' }}  value="{{ $id }}">{{ $name }}</option>                            
                                    @endforeach
            
                                </select>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                                    <div class="input-group-append" id="button-addon4">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <span><i class="fa fa-refresh"></i></span>
                                        </button>
                                        
                                        <button class="btn btn-outline-secondary" type="button">
                                            <span><i class="fa fa-search"></i></span>
                                        </button>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- table --}}
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <td>{{ $contacts->firstItem() + $index }}</td>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->company->name }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary btn-circle">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="" class="btn btn-outline-success btn-circle">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-outline-danger btn-circle">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $contacts->links() }}
            </div>
        </div>
    </div>

    <script>
        document.getElementById('company').addEventListener('change', function(){
            let companyId = this.value || this.options[this.selectedIndex].value
            window.location.href = window.location.href.split('?')[0] + '?company_id='+companyId 
        })
    </script>
@endsection