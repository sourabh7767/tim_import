@extends('layouts.admin')

@section('title')Users @endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

/* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
} */

.container {
  /* height: 100vh; */
  width: 100%;
  align-items: center;
  display: flex;
  justify-content: center;
  background-color: #fcfcfc;
}

.card {
  border-radius: 10px;
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
  width: 600px;
  height: 260px;
  background-color: #ffffff;
  padding: 10px 30px 40px;
}

.card h3 {
  font-size: 22px;
  font-weight: 600;
  
}

.drop_box {
  margin: 10px 0;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border: 3px dotted #a3a3a3;
  border-radius: 5px;
}

.drop_box h4 {
  font-size: 16px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #a3a3a3;
}

.btn {
  text-decoration: none;
  background-color: #005af0;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  outline: none;
  transition: 0.3s;
}

.btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
.form input {
  margin: 10px 0;
  width: 100%;
  background-color: #e2e2e2;
  border: none;
  outline: none;
  padding: 12px 20px;
  border-radius: 4px;
}
.fileForm {
    width: 100%;
    width: 100%;
    max-width: 500px;
    margin: 50px auto;
    background: #fafafa;
    -webkit-box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 33%);
    -moz-box-shadow: 0px 0px 96px 0px rgba(0,0,0,0.75);
    /* box-shadow: 0px 0px 96px 0px rgba(0,0,0,0.75); */
    /* min-height: 250px; */
    padding: 20px;
    border-radius: 10px
}
.inputBox {
    width: 100%;
    padding: 10px;
    border: 1px solid #0000004f;
    border-radius: 5px;
    z-index: 9999;
    position: relative;
    background: transparent,
}
.submitBtn {
    padding: 10px;
    width: 100%;
    border: none;
    background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));
    box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);
    color: #fff;
    font-weight: 400;
    border-radius: 4px;
}
.inputBox::-webkit-file-upload-button {
  visibility: hidden;
}
.form-group{
  position: relative;
}
.attachIcon{
  position: absolute;
  top: 48px;
  right: 10px;
  z-index: 0;
  background: transparent
}
</style>
@section('content')
<div class="fileForm">
  <form action="{{route("import.store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="form-group mb-2">
          <label class="mb-1" for="">
            json:
          </label>
          <input class="inputBox {{ $errors->has('jsonFile') ? ' is-invalid' : '' }}" type="file" name="jsonFile" id="">
          <i class="fa-solid fa-paperclip fa-fw attachIcon"></i>
          @if ($errors->has('jsonFile'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('jsonFile') }}</strong>
              </span>
          @endif
        </div>
       
      </div>
      <div class="col-12">
        <div class="form-group mb-2">

          <label  class="mb-1" for="">xlsx:</label>
          <input class="inputBox {{ $errors->has('xlsxFile') ? ' is-invalid' : '' }}" type="file" name="xlsxFile" id="">
          <i class="fa-solid fa-paperclip fa-fw attachIcon"></i>
          @if ($errors->has('xlsxFile'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('xlsxFile') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="col-12">
        <button class="submitBtn" type="submit" id="submitImport">Submit</button>
      </div>
    </div>
   
   
   
  </form>
</div>

{{-- <form action="{{route("import.store")}}" method="post" enctype="multipart/form-data">
  <div class="container display-flex">
    <div class="card">
      <h3>Upload Json file</h3>
      <div class="drop_box">
        <header>
          <h4>Select File here</h4>
        </header>
        <p>Files Supported: JSON</p>
        <input type="file" hidden name="json" id="fileID">
        <button type="button" class="btn" id="jsonButton">Choose File</button>
      </div>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="card">
      <h3>Upload Xlsx File</h3>
      <div class="drop_box">
        <header>
          <h4>Select File here</h4>
        </header>
        <p>Files Supported: XLSX</p>
        <input type="file" hidden name="xlsx" id="fileID2">
        <button class="btn" id="xlsxButton">Choose File</button>
      </div>
    </div>
      <button class="btn" type="submit">submit</button>
  </div>
</form> --}}
  @push('page_script')

      @include('include.dataTableScripts')   

      <script src="{{ asset('js/pages/users/index.js') }}"></script>
  <script>
    
      $(document).on("click","#submitImport",function(){
        // alert()
        $(".loderGroup").removeClass("d-none");
        const spanTags = document.querySelectorAll('form span');
        spanTags.forEach(span => span.textContent = '');
      });
  </script>
  @endpush

	     
@endsection