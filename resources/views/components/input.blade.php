    <div class="mb-3 m-2 form-check " style="width:45%">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input {{ $checked}}  value="{{$value==''? $name !== 'confirm_password' ? old($name) : '':$value }}"  type="{{$type}}" class="{{$class}}" name="{{$name}}" id="{{$name}}" aria-describedby="emailHelp">
    <div id="" class="form-text text-danger">
        @error($name)
    {{ $message }}
@enderror
</div>
  </div>