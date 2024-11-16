@push('title')
Customers View
@endpush
@include('layouts/header')
<div class="container">
  <div>
    <a href="/customers" class="btn btn-info ">Add</a>
    <a href="{{route('customer.trash')}}" class="btn btn-danger ">Trash</a>
  </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">DOB</th>
      <th scope="col">Address</th>
      <th scope="col">State</th>
      <th scope="col">Country</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no=1
    @endphp
    @foreach ($customers as $customer)
        
    <tr>
      <th scope="row">{{$no}}</th>
      <td>{{ $customer->name}}</td>
      <td>{{ $customer->email}}</td>
      <td>  @if ($customer->gender=='M')
        Male
          @elseif($customer->gender=='F')
       Female
          @else
       Others
          @endif</td>
      {{-- <td>{{getFormatedDate( $customer->dob,'d-M-Y')}}</td> --}}
      <td>{{$customer->dob}}</td>
      <td>{! {{$customer->address}}!}</td>
      <td>{{ $customer->state}}</td>
      <td>{{ $customer->country}}</td>
      <td>
            @if ($customer->status=='1')
  <a class="btn btn-sm btn-success">Active</a>
          @else
  <a class="btn btn-sm btn-secondary">Inactive</a>
          @endif
              </td>
            <td>
      <a href="{{ route('customer.delete', ['id' => $customer->id]) }}" class="btn btn-sm btn-danger">Move to trash</a>

         <a href="{{ route('customer.edit', ['id' => $customer->id]) }}" class="btn btn-sm btn-primary">Edit</a>
            </td>
      </tr>
      @php
          $no++
      @endphp
    @endforeach
 
  </tbody>
</table>
<div class="container mb-5">
<div class="row">

  {{ $customers->links() }}
</div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>